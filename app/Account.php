<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Accounttype;

class Account extends Model
{
    public function accounttype() {
        return  Accounttype::where('ACTYPEID',$this->ACTYPEID)->first() ;
    }

    public function __toString() {
        return "Number: ".$this->ACCNUMBER ."        Amount: ".$this->AMOUNT."        Type: ".$this->accounttype()->TYPE;
    }
}
