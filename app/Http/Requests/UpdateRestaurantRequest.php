<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;



class UpdateRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'unique', 'max:100', Rule::unique('restaurant')->ignore($this->restaurant)],
            'address' => 'required|max:255',
            'vat' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|max:255',
            'opening_hours' => 'required|max:20',
            'closing_hours' => 'required|max:20',
            'opening_days' => 'required|max:100',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'website' => 'nullable',
            'description' => 'nullable',
            'type_id' =>'required|exists:types,id'

        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'name.unique' => 'Name must be unique',
            'name.max' => 'Name must have a max lenght of :max characters',
            'name.min' => 'Name must have a min lenght of :min characters',
            'address.required' => 'A address is required',
            'vat.required' => 'A VAT is required',
            'email.required' => 'An email is required',
            'phone.required' => 'A phone number is required',
            'opening_hours.required' => 'A opening hours is required',
            'closing_hours.required' => 'A closing hours is required',
            'opening_days.required' => 'A opening days is required',
            'image.mimes' => 'Image should be in either jpeg, png, jpg, or gif format',
            'image.max' => 'Image size should not exceed 2MB',

        ];
    }
}