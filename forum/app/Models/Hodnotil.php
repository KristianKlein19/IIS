<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hodnotil extends Model
{
    use HasFactory;

    /**
     * Name of table
     *
     * @var string
     */
    protected $table = 'hodnotil';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_users',
        'id_prispevek',
        'hodnotil',
        'created_at',
        'updated_at',
    ];
}
