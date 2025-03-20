<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inviter extends Model
{
    use HasFactory;

    protected $table='inviter';

    protected $primary=['id_activite_compl','id_praticien'];

    public $timestamps=false;
    public int $id_HorsForfait;

    protected $keyType = 'int';

    /**
     * Surcharge de la méthode getKeyName pour gérer la clé primaire composée
     */
    public function getKeyName()
    {
        return $this->primaryKey;
    }

    public $incrementing = false;

    /**
     * Surcharge de la méthode getKey pour retourner la clé composée
     */
    public function getKey()
    {
        $keys = [];
        foreach ($this->primaryKey as $key) {
            $keys[] = $this->getAttribute($key);
        }
        return implode('-', $keys); // Concatène les clés avec un tiret (modifiable)
    }




}
