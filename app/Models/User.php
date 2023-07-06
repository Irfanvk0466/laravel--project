<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\userAddress;
use App\Models\Order;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'user_id';
    protected $table = 'users';
    protected $guarded = [];
    protected $hidden = ['user_id','password'];
 
   
    public function getDOBFormattedAttribute(){
        return date('d-M-Y',strtotime($this->DOB));
    }

    /*this is a function for mutator
        public function setDOBAttribute($value){
        $this->attributes['DOB'] = date('Y-M-d',strtotime($value)); 

    }*/
 
    
    public function scopeActive($query){
        return $query->where('status',1);
    }
    protected $dates = ['DOB'];


    public function address(){
        return $this->hasOne(userAddress::class,'user_id','user_id');//one to one relation and singular
    }

    public function orders(){
        return $this->hasMany(Order::class,'user_id','user_id');
    }
   
    //writing a function to get DOB coloumn
 
    public function getStatusTextAttribute(){
        if($this->status == 1) return "Active"; 
        else return "Inactive";
    }
    protected $appends = ['DOB_formatted','status_text'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = $value ?: 'N/A';
    }
    
}
