<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfil';

    protected $primaryKey = 'id_perfil';

    public $timestamps = false;

    protected $fialleble = [
        'nombre_perfil',
        'estatus'
    ];

    public function perfiles()
    {
        return $this->hasOne('prueba1\usuario', 'id_perfil');
    }
}
