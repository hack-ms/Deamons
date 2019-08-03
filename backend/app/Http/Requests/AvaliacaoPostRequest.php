<?php

namespace App\Http\Requests;


use App\Ubs;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class AvaliacaoPostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ubs_id'                      => ['required', Rule::exists('ubs', 'gid')],
            'observacao'                  => 'sometimes|string',
            'tempo_atendimento'           => 'required|boolean',
            'foi_atendido'                => 'required|boolean',
            'houve_superlotacao'          => 'required|boolean',
            'faltou_cuidado_profissional' => 'required|boolean',
            'dificuldade_acesso'          => 'required|boolean',
            'avaliacao_atendimento'       => 'required|boolean',

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response['mensagem'] = $validator->errors()->all()[0];

        throw new HttpResponseException(response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
