<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skupina extends Model
{
    use HasFactory;

    /**
     * Name of table
     *
     * @var string
     */
    protected $table = 'skupina';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nazev',
        'popis',
        'ikona',
        'zabezpeceni_profilu',
        'zabezpeceni_obsahu',
        'spravce',
    ];
}
