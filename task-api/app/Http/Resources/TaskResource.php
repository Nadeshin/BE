<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Ubah resource menjadi array.
     *
     * Field ditulis eksplisit supaya bentuk & urutannya jadi kontrak:
     * kolom baru di tabel tidak otomatis bocor ke client.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'is_completed' => (bool) $this->is_completed,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
