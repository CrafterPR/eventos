<?php

namespace App\Http\Requests;

use App\Enum\UserType;
use App\Rules\CouponValidator;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'country_id.required' => 'Your country is required',
            'county_id.required' => 'Your county is required',
            'disability.required' => 'Select the disability status option',
            'user_type.required' => 'Select who you are registering as option',
            'coupon.prohibited' => 'Only delegates can register with coupons',
            'terms.required' => 'You must agree to the terms and conditions',
            'email.unique' => 'A delegate with this email exists'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'salutation' => "required",
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email:rfc,dns', 'max:255', Rule::unique('users', 'email')],
            'mobile' => 'sometimes',
            'nullable',
            'string',
            'max:255',
            Rule::unique('users', 'mobile')->where(function ($query) {
                // You can customize this query if needed, e.g., excluding soft-deleted records
                return $query->whereNotNull('mobile');
            }),
            'id_number' => ['nullable', 'string', 'unique:users'],
            'country_id' => ['required', 'exists:countries,id'],
            'county_id' => Rule::requiredIf(fn () => $this->country_id == 112),
            'other_affiliation' => Rule::requiredIf(fn () => $this->affiliation_id == 11),
            'institution' => ['required', 'max:255'],
            'position' => ['required', 'max:255'],
            'gender' => ['required'],
            'affiliation_id' => ['required', 'exists:affiliations,id'],
            'disability' => ['required', 'max:255'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'password_confirmation' => ['required'],
            'area_of_interest' => ['array', 'required', 'min:1'],
            'user_type' => ['required', "in:exhibitor,delegate"],
            'terms' => ['required'],
            'coupon' => ['sometimes', new CouponValidator, Rule::prohibitedIf(fn () => $this->user_type != UserType::DELEGATE->value)],
        ];
    }
}
