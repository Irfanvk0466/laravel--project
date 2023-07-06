<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Order extends Model
{
    use HasFactory;
    use Cachable;
    public function getStatusTextAttribute(){
        if($this->status == 1) return "placed"; 
        else return "Delivered";
    }
     
    protected $appends = ['status_text'];
}
