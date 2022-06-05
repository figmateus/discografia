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
            'album' => 'required',
            'track_name' => 'required|unique:tracks',
            'duration' => 'required' 
        ];
    }

    public function messages()
    {
        return [
            'position.required' => 'digite a posição da faixa',
            'position.numeric' => 'digite uma posição valido',
            'album.required' => 'Escolha um album para adicionar sua faixa',
            'track_name.required' => 'Digite o nome da faixa',
            'track_name.unique' => 'Faixa já cadastrada',
            'duration.required' => 'Digite a duração da faixa',
        ];
    }
}
