<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'typeDoc' => $this->tipoDocumento->name,
            'numDoc' => $this->numero_documento,
            'name' => $this->name,
            'age' => $this->age,
            'address' => $this->address,
            'phone' => $this->phone,
            'ocupacion' => $this->ocupacion,
            'state' => $this->state,
            'createdOn' => $this->created_at,
            'updatedOn' => $this->updated_at
        ];
    }
}
