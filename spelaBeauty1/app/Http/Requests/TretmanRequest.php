<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TretmanRequest extends FormRequest
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
                'tbNaziv' => 'unique:tretmans,t_naziv|required|regex:/^[\p{L}\d\s\-\.\:\"\!\?\`\_\-\/\,\*\+\<\>\(\)]+(\s[\p{L}\d\s\-\.\:\"\!\?\`\s\_\-\/\,\*\+\<\>\(\)]+)*$/u',
                'taTekst'=>'required|regex:/^[\s\S]*$/u', //regex dozvoljavasve znakove, ukljucujuci i tagove
                'ddlTipTretmana' => 'required|not_in:0',
                'fSlika' => 'mimes:jpeg,jpg,bmp,png,gif,JPEG,JPG,BMP,PNG|file',
                'description' => 'required',
                'keywords' => 'required'
            ];
        }
        elseif($this->isMethod('put')){
            return [
                'tbNaziv' => 'required|regex:/^[\p{L}\d\s\-\.\:\"\!\?\`\_\-\/\,\*\+\<\>\(\)]+(\s[\p{L}\d\s\-\.\:\"\!\?\`\s\_\-\/\,\*\+\<\>\(\)]+)*$/u',
                'taTekst'=>'required|regex:/^[\s\S]*$/u', //regex dozvoljavasve znakove, ukljucujuci i tagove
                'fSlika' => 'mimes:jpeg,jpg,bmp,png,gif,JPEG,JPG,BMP,PNG|file',
                'ddlTipTretmana' => 'required|not_in:0',
                'description' => 'required',
                'keywords' => 'required'
            ];
        }
    }
    public function messages()
    {
        if($this->isMethod('post')){
            return [
                'tbNaziv.unique' => 'Tretman već postoji u bazi!',
                'tbNaziv.required' => 'Unesite naziv tretmana!',
                'tbNaziv.regex' => 'Naziv nije dobrog formata!',
                'taTekst.required' => 'Tekst je obavezan!',
                'taTekst.regex'=>'Tekst nije dobrog format!',
                'ddlTipTretmana.not_in' => 'Morate odabrati tip tretmana!',
                'description.required' => "Polje desccription je obavezno polje!",
                'keywords.required' => "Polje keywords je obavezno polje!",
            ];
        }
        elseif($this->isMethod('put')){
            return [
                'tbNaziv.regex' => 'Naziv tretmana nije dobrog formata!',
                'taTekst.regex' => 'Tekst nije dobrog formata!',
                'fSlika.mimes' => 'Slika nije dobrog formata!',
                'description.required' => "Polje desccription je obavezno polje!",
                'keywords.required' => "Polje keywords je obavezno polje!",
            ];
        }
    }
}
