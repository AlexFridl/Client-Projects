<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\True_;

class PodkategorijaRequest extends FormRequest
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
                'taTekst' => 'required|regex:/^[\s\S]*$/u', //regex dozvoljavasve znakove, ukljucujuci i tagove',
                'fSlika' => 'mimes:jpeg,jpg,bmp,png,gif,JPEG,JPG,BMP,PNG|file',
                'ddlKategorija' => 'not_in:0',
                'description' => 'required',
                'keywords' => 'required',
            ];
        }
        elseif($this->isMethod('put')){
            return [
                'tbNaziv' => 'required|regex:/^[\p{L}\d\s\-\.\:\"\!\?\`\_\-\/\,\*\+\<\>\(\)]+(\s[\p{L}\d\s\-\.\:\"\!\?\`\s\_\-\/\,\*\+\<\>\(\)]+)*$/u',
                'taTekst' => 'required|regex:/^[\s\S]*$/u', //regex dozvoljavasve znakove, ukljucujuci i tagove',
                'fSlika' => 'mimes:jpeg,jpg,bmp,png,gif,JPEG,JPG,BMP,PNG|file',
                'ddlKategorija' => 'not_in:0',
                'description' => 'required',
                'keywords' => 'required',
            ];
        }
    }
    public function messages()
    {
        if($this->isMethod('post')){
            return [
                'tbNaziv.required' => 'Polje naziv podkategorije je obavezno!',
                'tbNaziv.regex' => 'Naziv podkategorije nije dobrog formata!',
                'taTekst.required' => 'Polje tekst podkategorije je obavezno!',
                'taTekst.regex' => 'Tekst podkategorije nije dobrog formata!',
                'fSlika.mimes' => 'Dozvoljeni tipovi slika su .jpeg, .jpg, .bmp, .png, .gif, .JPEG, .JPG, .BMP, .PNG',
                'ddlKategorija.not_in' => 'Morate odabrati kategoriju!',
                'description' => 'Polje description je obavezno!',
                'keywords.required' => "Polje keywords je obavezno!",
            ];
        }
        elseif($this->isMethod('put')){
            return [
                'tbNaziv.required' => 'Polje naziv podkategorije je obavezno!',
                'tbNaziv.regex' => 'Naziv podkategorije nije dobrog formata!',
                'taTekst.required' => 'Polje tekst podkategorije je obavezno!',
                'taTekst.regex' => 'Tekst podkategorije nije dobrog formata!',
                'fSlika.mimes' => 'Dozvoljeni tipovi slika su .jpeg, .jpg, .bmp, .png, .gif, .JPEG, .JPG, .BMP, .PNG',
                'ddlKategorija.not_in' => 'Morate odabrati kategoriju!',
                'description' => 'Polje description je obavezno!',
                'keywords.required' => "Polje keywords je obavezno!",
            ];
        }
    }
}
