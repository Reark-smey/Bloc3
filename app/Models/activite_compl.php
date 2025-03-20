<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activite_compl extends Model
{
    use HasFactory;

    protected $table='activite_compl';

    protected $primary='id_activite';

    public $timestamps=false;
    public int $id_activite_compl;
}
