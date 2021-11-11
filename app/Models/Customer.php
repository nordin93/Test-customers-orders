<?php

namespace App\Models;

use App\Contract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    
    use SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'company'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function contract()
    {
        return $this->hasMany(Contract::class);
    }

         //delete
         public function idDelete()
         {
             return $this->delete;
         }
     
         public function elimination(){
             
             if($this->idDelete()){
                    $this->delete = false;
                    $this->save();
                } else {
                    $this->delete = true;
                    $this->save();
                }
        }
}
