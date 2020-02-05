<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\User;

class UserRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'number' => 'required|celular|unique:users,number',
            'birth' =>  'required|data',
            'password' => 'required',
            'CPF' => 'required|cpf',
            'photo' => 'file|image|mimes:jpeg,png,gif,webp|max:4048'
        ];
    }
        if($this->isMethod('put')){
        return[  
            'name' => 'string',
            'email' => 'required|email|unique:users,email',
            'number' => 'required|celular|unique:users,number',
            'birth' =>  'data',
            'password' => 'required',
            'CPF' => 'cpf'
        ];
        }
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json($validator->errors(),422));
    }

    public function messages(){
        return[
            'name.string' => 'O nome só pode conter string',
            'email.email' => 'Insira um email valido',
            'email.unique' => 'Este email já existe',
            'number.numeric' => 'O número de telefone não pode conter letras',
            'number.unique' => 'O Telefone já existe',
            'birth.date' => 'Insira uma data valida',
            'password.required' => 'Campo de senha necessario',
            'email.required' => 'Campo de email necessario',
            'name.required' => 'Campo de nome necessario',
            'birth.required' => 'Campo de Data de nascimento necessario',
            'number.required' => 'Campo de Telefone necessario'
        ];
    }
}
