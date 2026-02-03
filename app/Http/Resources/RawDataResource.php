<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RawDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        'id' => (string )$this->_id,
        'Bundesland' => $this->Bundesland,
        'Landkreis' => $this->Landkreis,
        'Altersgruppe' => $this->Altersgruppe
        ];
    }
}
