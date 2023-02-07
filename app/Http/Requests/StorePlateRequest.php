<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlateRequest extends FormRequest
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
            'name' => 'required|min:2|max:100',
            'price' => 'required|numeric|min:0|max:9999,99',
            'available' => 'required',
            'image' => 'nullable|image|max:5000',
            'ingredients' => 'required',
            'allergens' => 'nullable',
            'size' => 'nullable|max:30',
            'category_id' =>'required|exists:categories,id',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Il nome del piatto è obbligatorio',
            'name.min' => 'Il nome del piatto non può essere inferiore a :min caratteri',
            'name.max' => 'Il nome del piatto non può superare i :max caratteri',
            'price.required' => 'Il prezzo del piatto è obbligatorio',
            'price.max' => 'Il prezzo non deve superare :max',
            'available.required' => 'Indicare la disponibilità è obbligatorio.',
            'ingredients.required' => 'Gli ingredienti sono obbligatori',
            'size.max' => 'La dimensione non deve superare i :max caratteri',
            'category_id.required' => 'Il campo è richiesto',
        ];
    }
}
