<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Accounttype;

class Account extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'ACCNUMBER', 'ACTYPEID', 'AMOUNT', 'USER_ID',
    ];

    public function accounttype() {
        return  Accounttype::where('ACTYPEID',$this->ACTYPEID)->first() ;
    }

    public function __toString() {
        return "Number: ".$this->ACCNUMBER ."        Amount: ".$this->AMOUNT."        Type: ".$this->accounttype()->TYPE;
    }
}
