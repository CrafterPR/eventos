<?php

namespace App\Http\Requests;

use App\Rules\DelegateWasScanned;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;


class CheckinRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge(['event_id' => $this->route('event'),
                'checkpoint_id' => auth()->user()->checkpoint->id ?? '01j6pmzwfvcdfapmr145bv983s',
                'scanned_by' => auth()->id(),
                'checkin_date' => Carbon::now()->format('Y-m-d')
            ]);
    }

    public function messages()
    {
       return [
         'delegate_id.required' => 'Please scan the delegate QR Code on the pass!',
         'delegate_id.exists' => 'The Delegate QR Code does not exist in our registrations!',
         'event_id.required' => 'Please select the event before scanning the QR code!',
       ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
           'delegate_id' => ['required', 'string', 'exists:delegates,id', new DelegateWasScanned],
           'event_id' => ['required', 'string', 'exists:events,id'],
            'checkpoint_id' => ['required', 'string', 'exists:checkpoints,id'],
            'scanned_by' => ['required', 'string', 'exists:users,id'],
            'checkin_date' => ['required', 'date', 'date_format:Y-m-d'],
        ];
    }
}
