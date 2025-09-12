<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipTretmanaRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        if($this->isMethod('post')){
            return [
                'tbNazivTipTretmana' => 'unique:tip_tretmanas,tt_naziv|required|regex:/^[A-Z][a-zA-Z0-9]*(\s[a-zA-Z0-9]*)*$/',
                'description'   => 'required',
            ];
        }
        elseif($this->isMethod('put')){
            return [
                'tbNazivTipTretmana' => 'regex:/^[A-Z][a-zA-Z0-9]*(\s[a-zA-Z0-9]*)*$/',
                'description'   => 'required',
            ];
        }

    }
    public function messages()
    {
        if($this->isMethod('post')){
            return [
                'tbNazivTipTretmana.required' => 'Unesite naziv tipa tretmana!',
                'tbNazivTipTretmana.regex' => 'Tip tretmana nije dobrog formata, mora početi velikim slovom!',
                'tbNazivTipTretmana.unique' => 'Tip tretmana sa ovim nazivom već postoji!',
                'description.required'   => 'Podatak description je obavezno polje!',
                'keywords.required' => 'Podatak keywords je obavezno polje!',
            ];
        }

        elseif($this->isMethod('put')){
            // dd('put je ovde');
            return [
                'tbNazivTipTretmana.regex' => 'Tip tretmana nije dobrog formata, mora početi velikim slovom!',
                'description.required' => "Polje desccription je obavezno polje!",
                'keywords.required' => "Polje keywords je obavezno polje!",
            ];
        }
    }
}
