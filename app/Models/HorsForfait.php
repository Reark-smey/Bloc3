<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class HorsForfait Extends Model
{
    protected $table='fraishorsforfait';

    protected $primary='id_fraisforfait';

    public $timestamps=false;
    public int $id_HorsForfait;
}
