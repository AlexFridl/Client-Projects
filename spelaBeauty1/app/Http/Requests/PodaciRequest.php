<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PodaciRequest extends FormRequest
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
        return [
            'text' => 'required|regex:/^[\s\S]*$/u', //regex dozvoljavasve znakove, ukljucujuci i tagove
            'ulica' => 'required',
            'mesto' => 'required',
            'slika' => 'required|mimes:jpeg,jpg,bmp,png,gif,JPEG,JPG,BMP,PNG|file',
            'profilna_slika' => 'required',
            'description' => 'required',
            'keywords' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'text.required' => 'Tekst je obavezan!',
            'text.regex' => 'Tekst nije dobrog formata!',
            'ulica.required' => 'Ulica je obavezna!',
            'mesto.required' => 'Mesto je obavezno!',
            'slika.required' => 'Slika je obavezna!',
            'slika.mimes' => 'Dozvoljeni tipovi slika su .jpeg, .jpg, .bmp, .png, .gif, .JPEG, .JPG, .BMP, .PNG',
            'profilna_slika.required' => 'Profilna slika je obavezna!',
            'description.required' => 'Polje description je obavezno!',
            'keywords.required' => "Polje keywords je obavezno!",
        ];
    }
}
