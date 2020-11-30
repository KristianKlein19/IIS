<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zadost extends Model
{
    use HasFactory;

    /**
     * Name of table
     *
     * @var string
     */
    protected $table = 'zadost';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'typ',
        'text',
        'stav',
        'od',
        'do',
        'created_at',
        'updated_at',
    ];

    public function getUser()
    {
        return User::find($this->od);
    }

    public function getGroup()
    {
        return Skupina::find($this->do);
    }
}
