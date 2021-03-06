<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    //protected $table = "wallet";

    public function type(){
        return $this->hasOne('App\Type', 'id', 'id_type');
    }

    public function method(){
        return $this->hasOne('App\Method', 'id', 'id_method');
    }
}
