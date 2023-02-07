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
            'name.required' => 'È richiesto un nome di minimo 5 lettere',
            'name.unique:restaurants' => 'Il nome deve essere unico',
            'name.max' => 'Il nome può avere una lunghezza massima di :max lettere',
            'name.min' => 'Il nome deve avere una lunghezza minima di :min lettere',
            'address.required' => 'È richiesto un indirizzo',
            'address.unique:restaurants' => 'Indirizzo già utilizzato',
            'vat.required' => 'La P.IVA è richiesta',
            'vat.unique' => 'P.IVA già registrata',
            'vat.max' => 'La P.IVA deve avere una lunghezza di 11 caratteri',
            'email.required' => 'Il campo Email è richiesto',
            'email.unique:restaurants' => 'Email già registrata',
            'email.max' => 'La lunghezza dell\'email non può eccedere i 50 caratteri',
           
            'image.max' => 'L\immagine non può superare i 2MB di peso',
            'phone.max' => 'Il numero di telefono non può eccedere i :max caratteri',
            'phone.min' => 'Il numero di telefono deve essere lungo almeno :min caratteri',


        ];
    }
}