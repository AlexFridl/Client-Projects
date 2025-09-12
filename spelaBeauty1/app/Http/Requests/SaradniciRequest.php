<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaradniciRequest extends FormRequest
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
                'unosSlike'     => 'mimes:jpeg,jpg,bmp,png,gif,JPEG,JPG,BMP,PNG',
                'tbSaradnik'    => 'required',
            ];
        }
        elseif($this->isMethod('put')){
            return [
                'unosSlike'     => 'mimes:jpeg,jpg,bmp,png,gif,JPEG,JPG,BMP,PNG|file',
                'tbSaradnik'    => 'required',
            ];
        }
    }

    public function messages()
    {
        if($this->isMethod('post')){
            return [
                'unosSlike.mimes'       => 'Dozvoljeni tipovi slika su .jpeg, .jpg, .bmp, .png, .gif, .JPEG, .JPG, .BMP, .PNG',
                'tbSaradnik.required'   => "Ime saradnika je obavezno!",
            ];
        }
        elseif($this->isMethod('put')){
            return [
                'unosSlike.mimes'       => 'Dozvoljeni tipovi slika su .jpeg, .jpg, .bmp, .png, .gif, .JPEG, .JPG, .BMP, .PNG',
                'tbSaradnik.required'   => "Ime saradnika je obavezno!",
            ];
        }
    }
}
