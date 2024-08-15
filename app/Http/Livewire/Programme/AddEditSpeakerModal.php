<?php

namespace App\Http\Livewire\Programme;

use App\Models\Speaker;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Throwable;

class AddEditSpeakerModal extends Component
{
    use WithFileUploads;

    public Speaker $speaker;

    public $avatar;

    public string $title;

    public $saved_avatar;

    protected $messages = [
        'speaker.order.unique' => 'The item order is already allocated',
        'speaker.data_src.unique' => 'The item data source is already allocated'
    ];

    protected $listeners = [
        'delete_speaker' => 'deleteSpeaker',
        'add_speaker' => 'addSpeaker',
        'update_speaker' => 'updateSpeaker',
    ];


    public function render()
    {
        return view('livewire.programme.edit-speaker-modal');
    }

    public function submit(): void
    {
        // Validate the form input data
        $this->validate();
        try {
            DB::transaction(function () {
                if ($this->avatar) {
                    //$this->speaker->image_path = $this->avatar->getClientOriginalName();
                    $this->speaker->image_path = $this->avatar->store('speakers', 'public');
                } else {
                    $this->speaker->image_path = $this->saved_avatar;
                }
                $this->speaker->modified_by = auth()->id();
                $this->speaker->save();
                // Emit a success event with a message
                $this->dispatch('success', __('New speaker has been created'));
            });
        } catch (Throwable $e) {
            $this->dispatch('error', 'Could not update:'. $e->getMessage());
        }

         // Reset the form fields after successful submission
         //$this->reset();
    }

    public function deleteSpeaker($id)
    {
        // Delete the user record with the specified ID
        Speaker::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Speaker successfully deleted');
    }

    public function addSpeaker()
    {
        $this->title = 'Add Speaker';
        $this->speaker = new Speaker;
        $this->avatar = null;
        $this->saved_avatar = null;
    }
    public function updateSpeaker($id)
    {
        $this->title = 'Edit Speaker';
        $this->speaker = Speaker::findOrFail($id);
        $this->saved_avatar = $this->speaker->image_path;
        $this->avatar = null;
    }

    public function hydrate(): void
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    protected function rules()
    {
        return ['speaker.name' => 'required|string',
        'speaker.title' => 'required',
        'speaker.description' => 'string|nullable|max:5000',
        'speaker.data_src' => ['required', 'max:20', Rule::unique('speakers', 'data_src')->ignore($this->speaker->id)],
        'speaker.order' => ['required', 'integer', Rule::unique('speakers', 'order')->ignore($this->speaker->id)],
         'avatar' => 'nullable|sometimes|image|max:1024',
            ];
    }
}
