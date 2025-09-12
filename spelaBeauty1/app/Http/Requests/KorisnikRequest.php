<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KorisnikRequest extends FormRequest
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

                'tbKorIme' => 'required|regex:/^([A-Z a-z0-9]{1,}){2,}$/|unique:korisniks,korisnicko_ime',
                'tbLozinka' => 'required|regex:/^[\S]{6,10}$/',
                'ddlUloga' => 'required|not_in:0',
            ];
        }
        elseif($this->isMethod('put')){
            return [

                'tbKorIme' => 'regex:/^([A-Z a-z0-9]{1,}){2,}$/',
                'tbLozinka' => 'required|regex:/^[\S]{6,10}$/',
                'ddlUloga' => 'not_in:0',
            ];
        }
    }
    public function messages()
    {
        if($this->isMethod('post')){
            return [
                'tbKorIme.required' => 'Korisničko ime je obavezno!',
                'tbKorIme.regex' => 'Korisničko ime nije dobrog formata, mora sadrzati najmanje tri slova bez slova sa kvačicama!',
                'tbKorIme.unique' => 'Ovo korisničko ime već postoji, mora biti jedinstveno!',
                'tbLozinka.required' => 'Lozinka je obavezna!',
                'tbLozinka.regex' => 'Lozinka mora imati od šest do deset karaktera!',
                'ddlUloga.not_in' => 'Morate odabrati ulogu!',
            ];
        }
        elseif($this->isMethod('put')){
            return [
                'tbKorIme.required' => 'Korisničko ime je obavezno!',
                'tbKorIme.regex' => 'Korisničko ime nije dobrog formata, mora sadrzati najmanje tri slova!',
                'tbLozinka.required' => 'Lozinka je obavezna!',
                'tbLozinka.regex' => 'Lozinka mora imati od šest do deset karaktera!',
                'ddlUloga.not_in' => 'Morate odabrati ulogu!',
            ];
        }
    }
}
