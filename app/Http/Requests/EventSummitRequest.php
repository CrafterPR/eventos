<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventSummitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', Rule::unique('event_summits', 'title')->ignore($this->event?->id)],
            'lead_organization' => ['required'],
            'longtitle' => ['sometimes', 'nullable'],
            'leader' => ['required'],
            'leader_contact' => ['required'],
            'profile_photo_url' => [Rule::requiredIf(fn() => $this->event?->profile_photo_url == null), 'image', 'mimes:jpeg,png,jpg', 'max:4096'],
            'leader_bio' => ['required', 'max:5000'],
            'description' => ['required', 'max:5000'],
            'targets' => ['required'],
        ];
    }
}
