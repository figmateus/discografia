<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTrackRequest extends FormRequest
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
            'position' => 'required|numeric',
            'album_id' => 'required',
            'name' => 'required|unique:tracks,name',
            'duration' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'position.required' => 'digite a posição da faixa',
            'position.numeric' => 'digite uma posição valido',
            'position.unique' => 'Posição já cadastrada!',
            'album_id.required' => 'Escolha um album para adicionar sua faixa',
            'name.required' => 'Digite o nome da faixa',
            'name.unique' => 'Faixa já cadastrada',
            'duration.required' => 'Digite a duração da faixa',
        ];
    }
}
