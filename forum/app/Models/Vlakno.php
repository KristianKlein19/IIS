<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vlakno extends Model
{
    use HasFactory;

    /**
     * Name of table
     *
     * @var string
     */
    protected $table = 'vlakno';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nazev',
        'popis',
        'stav',
        'pripnute_vlakno',
        'soucast',
        'zakladatel',
        'created_at',
        'updated_at',
    ];
}
