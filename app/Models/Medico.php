<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = ['crm','nome', 'email', 'senha'];

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}
