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
        'zabezpeceni_profilu',
        'zabezpeceni_obsahu',
        'spravce',
        'created_at',
        'updated_at',
    ];

    public function getAdmin() {
        return User::find($this->spravce);
    }

    public function getMods() {
        return Moderator::all()->where('id_skupina', $this->id);
    }
}
