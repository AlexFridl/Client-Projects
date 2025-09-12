<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategorijaRequest extends FormRequest
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
                'tbNaziv' => 'required|regex:/^[\p{L}\d\s\-\.\:\"\!\?\`\_\-\/\,\*\+\<\>\(\)]+(\s[\p{L}\d\s\-\.\:\"\!\?\`\s\_\-\/\,\*\+\<\>\(\)]+)*$/u',
                'fSlika' => 'mimes:jpeg,jpg,bmp,png,gif,JPEG,JPG,BMP,PNG|file',
                'ddlTretmana' => 'not_in:0',
                'description' => 'required',
                'keywords' => 'required',
            ];
        }
        elseif($this->isMethod('put')){
            return [
                'tbNaziv' => 'required|regex:/^[\p{L}\d\s\-\.\:\"\!\?\`\_\-\/\,\*\+\<\>\(\)]+(\s[\p{L}\d\s\-\.\:\"\!\?\`\s\_\-\/\,\*\+\<\>\(\)]+)*$/u',
                'fSlika' => 'mimes:jpeg,jpg,bmp,png,gif,JPEG,JPG,BMP,PNG|file',
                'ddlTretmana' => 'not_in:0',
                'description' => 'required',
                'keywords' => 'required',
            ];
        }
    }

    public function messages()
    {
        if($this->isMethod('post')){
            return [
                'tbNaziv.required' => 'Polje naziv kategorije je obavezno!',
                'tbNaziv.regex' => 'Polje naziv kategorije nije dobrog formata!',
                'fSlika.mimes' => 'Dozvoljeni tipovi slika su .jpeg, .jpg, .bmp, .png, .gif, .JPEG, .JPG, .BMP, .PNG',
                'ddlTretmana.not_in' => 'Morate odabrati tretman!',
                'description' => 'Polje description je obavezno!',
                'keywords.required' => "Polje keywords je obavezno!",
            ];
        }
        elseif($this->isMethod('put')){
            return [
                'tbNaziv.required' => 'Polje naziv kategorije je obavezno!',
                'tbNaziv.regex' => 'Polje naziv kategorije nije dobrog formata!',
                'fSlika.mimes' => 'Dozvoljeni tipovi slika su .jpeg, .jpg, .bmp, .png, .gif, .JPEG, .JPG, .BMP, .PNG',
                'ddlTretmana.not_in' => 'Morate odabrati tretman!',
                'description' => 'Polje description je obavezno!',
                'keywords.required' => "Polje keywords je obavezno!",
            ];
        }
    }
}
