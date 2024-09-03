<?php

namespace App\Http\Requests;

use App\Enum\UserType;
use App\Models\Category;
use App\Rules\CouponValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class DelegateRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $split_name = explode(' ', $this->input('name'));
        $this->merge([
            'first_name' => $split_name[0],
            'last_name' => $split_name[1] ?? '',
        ]);



    }
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email:rfc', 'max:255', 'unique:users'],
            'mobile' => ['nullable', 'unique:users'],
            'salutation' => ["required"],
            'country_id' => ['required', 'exists:countries,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'county_id' => "nullable",
            'organization' => ['required', 'max:255'],
            'gender' => ['nullable'],
            'event_id' => ['required', 'exists:events,id'],
            'coupon' => ['sometimes', new CouponValidator]
        ];
    }
}
