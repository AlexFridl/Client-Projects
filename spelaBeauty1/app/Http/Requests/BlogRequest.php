<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
                'tbNaslovBlog' => 'required|regex:/^[\p{L}\d\s\-\.\:\"\!\?\`\_\-\/\,\*\+\<\>\(\)]+(\s[\p{L}\d\s\-\.\:\"\!\?\`\s\_\-\/\,\*\+\<\>\(\)]+)*$/u',
                'tbPodnaslovBlog' => 'regex:/^[\s\S]*$/u',
                'tbTekstBlog' => 'required|regex:/^[\s\S]*$/u',
                'unosSlike' => 'required|mimes:jpeg,jpg,bmp,png,gif,JPEG,JPG,BMP,PNG|file',
                'description' => 'required',
                'keywords' => 'required',
            ];
        }
        elseif($this->isMethod('put')){
            return[
                'tbNaslovBlog' => 'required|regex:/^[\p{L}\d\s\-\.\:\"\!\?\`\_\-\/\,\*\+\<\>\(\)]+(\s[\p{L}\d\s\-\.\:\"\!\?\`\s\_\-\/\,\*\+\<\>\(\)]+)*$/u',
                'tbPodnaslovBlog' => 'regex:/^[\s\S]*$/u',
                'tbTekstBlog' => 'required|regex:/^[\s\S]*$/u',
                'unosSlike' => 'mimes:jpeg,jpg,bmp,png,gif,JPEG,JPG,BMP,PNG|file',
                'description' => 'required',
                'keywords' => 'required',

            ];
        }
    }

    public function messages()
    {
        if($this->isMethod('post')){
            return [
                'tbNaslovBlog.required' => 'Naslov je obavezan!',
                'tbNaslovBlog.regex' => 'Naslov nije dobrog formata!',
                'tbPodnaslovBlog.regex' => 'Podnaslov nije dobrog formata!',
                'tbTekstBlog.required' => 'Tekst je obavezan!',
                'tbTekstBlog.regex' => 'Tekst nije dobrog formata!',
                'unosSlike.required' => 'Slika je obavezna!',
                'unosSlike.mimes'=> 'Dozvoljeni tipovi slika su .jpeg, .jpg, .bmp, .png, .gif, .JPEG, .JPG, .BMP, .PNG',
                'description.required' => "Polje desccription je obavezno!",
                'keywords.required' => "Polje keywords je obavezno!",
            ];
        }
        elseif($this->isMethod('put')){
            return [
                'tbNaslovBlog.required' => 'Naslov je obavezan!',
                'tbNaslovBlog.regex' => 'Naslov nije dobrog formata!',
                'tbPodnaslovBlog.regex' => 'Podnaslov nije dobrog formata!',
                'tbTekstBlog.required' => 'Tekst je obavezan!',
                'tbTekstBlog.regex' => 'Tekst nije dobrog formata!',
                'unosSlike.mimes'=> 'Dozvoljeni tipovi slika su .jpeg, .jpg, .bmp, .png, .gif, .JPEG, .JPG, .BMP, .PNG',
                'description.required' => "Polje desccription je obavezno!",
                'keywords.required' => "Polje keywords je obavezno!",
            ];
        }
    }
}
