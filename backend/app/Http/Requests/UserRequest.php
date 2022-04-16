<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserRequest
 * @package App\Http\Requests
 */
class UserRequest extends FormRequest
{

    const REQUIRED = "required";
    const MIN8 = "min:8";

    /**
     * Determine se o usuário está autorizado a fazer essa solicitação
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Obtenha as regras de validação que se aplicam à solicitação
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => self::MIN8,
        ];
    }

    /**
     * Mensagens
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'password' . self::REQUIRED => 'O campo Password é obrigatório!',
        ];
    }
}
