<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratoire extends Model
{
    use HasFactory;

    protected $table='laboratoire';

    protected $primary='id_laboratoire';

    public $timestamps=false;
    public int $id_laboratoire;
}
