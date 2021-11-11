<?php

namespace App\Models;

use App\Contract;
use App\Models\Tag;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model

{
    use SoftDeletes;

    protected $fillable = ['customer_id','title', 'description', 'cost'];
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function contract()
    {
        return $this->hasMany(Contract::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
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
