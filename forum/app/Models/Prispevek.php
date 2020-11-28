<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prispevek extends Model
{
    use HasFactory;

    /**
     * Name of table
     *
     * @var string
     */
    protected $table = 'prispevek';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'karma',
        'text',
        'soucast',
        'odpoved',
        'prispevatel',
        'created_at',
        'updated_at',
    ];
}
