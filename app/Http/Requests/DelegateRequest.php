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
        $category = $this->input('category_id');
        $category = Category::find($category);
        if ($category) {
            if (Str::contains($category->title, 'delegate')) {
                $user_type = UserType::DELEGATE->value;
            } elseif (Str::contains($category->title, 'exhibitor')) {
                $user_type = UserType::EXHIBITOR->value;
            } else {
                $user_type = $category->title;
            }
            $split_name = explode(' ', $this->input('name'));
            $this->merge([
                'first_name' => $split_name[0],
                'last_name' => $split_name[1] ?? '',
                'password' => bcrypt(generate_random_password()),
                'user_type' => $user_type,
            ]);
        }


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
            'user_type' => ['required', 'string'],
            'password' => ['required', 'string'],
            'email' => ['required', 'email:rfc,dns', 'max:255', 'unique:users'],
            'mobile' => ['nullable', 'unique:users'],
            'salutation' => ["required"],
            'id_number' => ['nullable', 'string', 'unique:users'],
            'country_id' => ['required', 'exists:countries,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'county_id' => "required_if:country_id,==,112",
            'institution' => ['required', 'max:255'],
            'gender' => ['required'],
            'coupon' => ['sometimes', new CouponValidator]
        ];
    }
}
