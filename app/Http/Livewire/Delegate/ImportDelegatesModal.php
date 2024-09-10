<?php

namespace App\Http\Livewire\Delegate;

use App\Jobs\ImportDelegatesJob;
use App\Models\Event;
use Illuminate\Bus\Batch;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use  Livewire\WithFileUploads;
use Throwable;

class ImportDelegatesModal extends Component
{
  use WithFileUploads;

    public string $batchId = '';

    public mixed $importFile = null;

    public string $event_id = '';

    public $uploadErrors;

    public string $importFilePath;

    public Collection $events;

    public int $fileIteration = 1;

    public bool $isImporting = false;

    public bool $importFinished = false;

    public bool $importCancelled = false;

    protected array $rules = [
        'importFile' => 'required|file|mimes:xlsx,xls,csv|max:10240',
        'event_id' => 'required|exists:events,id',
    ];

    public function mount()
    {
        $this->events = Event::all();
    }
    public function render()
    {
        $this->uploadErrors = Cache::remember('uploadError.'.$this->batchId, 300, fn () => 'No error.');
        Cache::forget('uploadError.'.$this->batchId);

        return view('livewire.delegate.import-delegates');
    }

    public function updated($importFile): void
    {
        if (! empty($importFile)) {
            $this->resetValidation($importFile);
        }
    }

    /**
     * @throws Throwable
     */
    public function uploadDelegates(): void
    {

         $this->importFinished = false;
        $this->importCancelled = false;

        $this->importFilePath = $this->importFile->store('delegates-import');

        $this->isImporting = true;
        $eventId = $this->event_id;

        $batch = Bus::batch([
            new ImportDelegatesJob($this->importFilePath, $eventId),
        ])
            ->catch(function (Batch $batch, Throwable $e) {
                Cache::remember('uploadError.'.$batch->id, 300, fn () => $e->getMessage());
            })
            ->name('import-excel-delegates')
            ->dispatch();

        $this->batchId = $batch->id;

        $this->dispatch('info', 'Importing...please wait');
    }

    public function getImportBatchProperty(): ?Batch
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
            $this->dispatch('success', 'imported delegates successfully!');
            $this->dispatch('closeModal');
        } elseif ($this->importCancelled) {
            $this->dispatch('error', 'Import failed!');
        }

        $this->dispatch('scrollToStatusMsg', ['element' => 'email_only']);
    }
}
