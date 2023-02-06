<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreRestaurantRequest extends FormRequest
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
            'name' => 'required|unique:restaurants|max:100|min:5',
            'address' => 'required|unique:restaurants',
            'email' => 'required|unique:restaurants|max:50',
            'vat' => 'required|unique:restaurants|max:11',
            'phone' => 'nullable|max:20|min:10',
            'opening_hours' => 'required',
            'closing_hours' => 'required',
            'opening_days' => 'required',
             'website' => 'nullable',
            'description' => 'nullable',
            // 'rating' => 'nullable',
            'image' => 'nullable|image|max:2048',
           
        ];




    }

    /**
     * Get the error messages for the defined validation rules.
     *
     */
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'name.unique:restaurants' => 'Name must be unique',
            'name.max' => 'Name must have a max lenght of :max characters',
            'name.min' => 'Name must have a min lenght of :min characters',
            'address.required' => 'Address is required',
            'address.unique:restaurants' => 'Address must be unique',
            'vat.required' => 'Vat is required',
            'vat.unique' => 'Vat must be unique',
            'vat.max' => 'Vat must have a max of :max characters',
            'email.required' => 'Email is required',
            'email.unique:restaurants' => 'Email must be unique',
            'email.max' => 'Email must have a max of :max characters',
            'image.mimes' => 'Image should be in either jpeg, png, jpg, or gif format',
            'image.max' => 'Image size should not exceed 2MB',
            'phone.max' => 'Phone must be of max :max number',
            'phone.min' => 'Phone must be of max :min number',


        ];
    }
}