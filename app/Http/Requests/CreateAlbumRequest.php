<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreateAlbumRequest extends FormRequest
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
            'name' => 'required|unique:albums|regex:/(^[A-Za-z ]+$)+/',
            'release_date' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Digite o nome do album',
            'name.regex' => 'Digite um nome valido',
            'name.unique' => 'Album já cadastrado',
            'release_date.required' => 'Digite o ano de lançamento do album',
            'release_date.date' => 'Data invalida'
        ];
    }
}
