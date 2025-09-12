<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlajderRequest extends FormRequest
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
                'tbNaslov' => 'required', // dodati za prvo slovo pocetno da bude veliko
                'fSlika' => 'required|mimes:jpeg,jpg,bmp,png,gif,JPEG,JPG,BMP,PNG|file',
            ];
        }
        elseif($this->isMethod('put')){
            return [
                'tbNaslov' => 'required', // dodati za prvo slovo pocetno da bude veliko
                'fSlika' => 'mimes:jpeg,jpg,bmp,png,gif,JPEG,JPG,BMP,PNG|file',
            ];
        }

    }

    public function messages()
    {
        if($this->isMethod('post')){
            return [
                'tbNaslov.required' => 'Polje naziv podkategorije je obavezno!',
                'fSlika.required' => 'Slika je obavezna!',
                'fSlika.mimes' => 'Dozvoljeni tipovi slika su .jpeg, .jpg, .bmp, .png, .gif, .JPEG, .JPG, .BMP, .PNG',
            ];
        }
        elseif($this->isMethod('put')){
            return [
                'tbNaslov.required' => 'Polje naziv podkategorije je obavezno!',
                'fSlika.mimes' => 'Dozvoljeni tipovi slika su .jpeg, .jpg, .bmp, .png, .gif, .JPEG, .JPG, .BMP, .PNG',
            ];
        }
    }
}
