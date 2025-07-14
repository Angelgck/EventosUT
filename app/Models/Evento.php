<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
     use HasFactory;

    /**
     * Los atributos que se pueden asignar de forma masiva.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'max_participantes',
        'horas_asignadas',
    ];
    
    // Nueva relación: un evento tiene muchos participantes (usuarios)
    public function participantes()
    {
        return $this->belongsToMany(\App\Models\User::class, 'evento_user');
    }

}
