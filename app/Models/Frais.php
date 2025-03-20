<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Frais extends Model
{
    protected $table='frais';

    protected $primary='id_frais';

    public $timestamps=false;

    public int $id_frais;

}
