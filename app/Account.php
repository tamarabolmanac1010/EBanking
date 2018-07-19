<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Accounttype;

class Account extends Model
{
    public function accounttype() {
        return  Accounttype::where('ACTYPEID',$this->ACTYPEID)->first() ;
    }
}
