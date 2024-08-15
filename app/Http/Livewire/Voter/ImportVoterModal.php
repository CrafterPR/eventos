<?php

namespace App\Http\Livewire\Voter;

use App\Jobs\ImportVotersJob;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Throwable;

class ImportVoterModal extends Component
{
    use WithFileUploads;

    public $batchId;


    public $importFilePath;

    public $b2cUploadErrors;

    public int $fileIteration = 1;

    public bool $isImporting = false;

    public bool $importFinished = false;

    public bool $importCancelled = false;

    #[Validate('required', message: "File is required")]
    #[Validate('file', message: "Upload must a file")]
    #[Validate('max:102400', message: "File bust be less than 10MB")]
    #[Validate('mimes:xlsx,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/octet-stream,xls,csv', message: "File should be of type: xlsx,xls,csv")]
    public  $importFile;

    public function render(): View
    {
        $this->b2cUploadErrors = Cache::remember('VoterUploadError.'.$this->batchId, 200, fn () => 'No error.');
        Cache::forget('VoterUploadError.'.$this->batchId);

        return view('livewire.voter.import-voter');
    }

    /**
     * @throws ValidationException
     */
    public function updated($importFile): void
    {
        $this->validateOnly($importFile);
        if (! empty($importFile)) {
            $this->resetValidation($importFile);
        }
    }

    /**
     * @throws Throwable
     */public function uploadVoters(): void
    {
        $this->resetValidation();
        $this->importFinished = false;
        $this->importCancelled = false;

        $this->validate();

        $this->isImporting = true;
        $this->importFilePath = $this->importFile->store('voters-import');

        $batch = Bus::batch([
            new ImportVotersJob($this->importFilePath),
        ])
            ->catch(function (Batch $batch, Throwable $e) {
                Cache::remember('VoterUploadError.'.$batch->id, 200, fn () => $e->getMessage());
            })
            ->name('voters-import')
            ->dispatch();

        $this->batchId = $batch->id;

        $this->dispatch('info','..importing voters data...please wait');
    }

    public function getImportBatchProperty()
    {
        return Bus::findBatch($this->batchId ?? null);
    }

    public function updateImportProgress(): void
    {
        $this->importFinished = $this->importBatch->finished();
        $this->importCancelled = $this->importBatch->cancelled();

        if ($this->importFinished || $this->importCancelled) {
            Storage::delete($this->importFilePath);
            $this->isImporting = false;

            //clean up the old file input field
            $this->importFile = null;
            $this->fileIteration++;
        }

        if ($this->importFinished && ! $this->importCancelled) {
            $this->dispatch('success', 'Voters uploaded successfully!');

        } elseif ($this->importCancelled) {
            $this->dispatch('error', 'Import failed!');
        }
    }
}
