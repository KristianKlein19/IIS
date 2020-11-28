<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clen extends Model
{
    use HasFactory;

    /**
     * Name of table
     *
     * @var string
     */
    protected $table = 'clen';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_users',
        'id_skupina',
        'created_at',
        'updated_at',
    ];
}
