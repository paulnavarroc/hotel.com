<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return $user!= null && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if ($method == 'PUT'){
            return [
                'typeDoc' => 'required|exists:tipo_documentos,id',
                'numDoc' => 'required|min:8',
                'name' => 'required',
                'age' => 'required|integer',
                'address' => 'required',
                'phone' => 'required|min:9',
                'ocupacion' => 'required',
            ];
        }else{
            return [
                'typeDoc' => 'sometimes|required|exists:tipo_documentos,id',
                'numDoc' => 'sometimes|required|min:8',
                'name' => 'sometimes|required',
                'age' => 'sometimes|required|integer',
                'address' => 'sometimes|required',
                'phone' => 'sometimes|required|min:9',
                'ocupacion' => 'sometimes|required',
            ];
        }

    }

    public function messages()
    {
        return [
            'typeDoc.exists' => 'El tipo de documento seleccionado no es válido.',
            'age.integer' => 'La edad debe ser un numero entero.',
            'numDoc.min' => 'El numero de documento debe tener un minimo de 8 caracteres',
            'phone.min' => 'El numero de telefono debe tener un minimo de 9 caracteres'
        ];
    }

    protected function prepareForValidation(){
        if($this->typeDoc){
            $this->merge([
                'numero_documento' => $this->numDoc
            ]);
        }

        if($this->numDoc){
            $this->merge([
                'numero_documento' => $this->numDoc
            ]);
        }
    }
}
