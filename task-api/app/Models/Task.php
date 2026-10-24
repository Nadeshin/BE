<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Field yang boleh diisi massal lewat create()/update().
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'is_completed',
    ];

    /**
     * Casting tipe data atribut.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_completed' => 'boolean',
        ];
    }
}
