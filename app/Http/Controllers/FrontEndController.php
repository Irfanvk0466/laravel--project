<?php

namespace App\Http\Controllers;

use App\Events\NewUserCreatedEvent;
use App\Models\User;
use App\Models\userAddress;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use illuminate\Support\Str;

use PgSql\Lob;
use Rap2hpoutre\FastExcel\FastExcel;

class FrontEndController extends Controller
{
public function index(){
   
    //$users = User::all();//select * from user (this query is run by this simplified code in laravel)
    //$users = User::where('user_id','=',90)->get();//GET method
    //$users = User::find([100]);//select * from user_id 77;
    //$users = User::where('user_id',90)->first();//first method
   //to get active and inactive
    //session()->put('user_name','irfan');
    //session()->put('user_id',10);
    if(cache()->has('users')){
        $users = cache()->get('users');
    
    }else{
        $users = User::withCount('orders')->withTrashed()->active()->latest()->paginate(5);
   
        cache()->put('orders',$users); // put this orders and users into cache
    }
  
   
    
    return view('welcome',compact('users'));
   
    
}

/*public function About(){

    return view('about');
}
public function Contact(){
    $val1 = "arjun <br>";
    $val2 = 9567618022;
    $val3 = "arjun@gmail.com <br>";
    $result =" $val1"."$val2 <br>"."$val3 <br>";

    $name = "anshad";
    $newName = strtoupper($name);

    return view('contact',compact('result','newName'));
}
public function Email(){
    return view('email');
}
public function Home(){
  ;
    $age = 24;
    $record =['ms dhoni have 3 major icc trophies!!!'];
    $status = 5;
    $games = ['cricket','tennis','football','hockey','rugby'];
    $weeks = ['sunday','monday','tuesday','wednesday','thursday','friday','saturday'];
    $months =['january','february','march','april','may','june','july','august','september','october','november','december'];
    return view('home',compact('age','record','status','games','weeks','months',));
}*/
public function New(){
    //Artisan::call('delete:inactive_users');
    //return session()->get('user_name');
    //return session()->increment('user_id');
    return view('users.new');//new form page when clicking new button
}
public function Saveform(){
    request()->validate(['myName' => 'required|min:10|max:15','DOB'=>'required','email'=> 'required','phone'=>'required|numeric|digits:10']);
    //$user=User::withoutEvents(function(){//this is to restrict welcome mail from observer and listener
    $user = User::create([
        'myName' => request('myName')?? 'Default myName', // Replace 'Default Name' with an appropriate default value,
        'DOB' =>  request('DOB'),
        'email' => request('email'),
        'phone' => request('phone'),
        'status' => request('status'),
    
    ]);
//});
    NewUserCreatedEvent::dispatch($user);


    


    cache()->forget('users');





 
    //return $user." <br> 1 row inserted successfully to DB ";
    // this is the method to check and if its then takes exitsting email or anything
    //cheking is there an email similar to the email or anything i'm inserting if it is there then takes that existing email or anything
    /*$user = User::firstOrCreate([
        'myName' => request('myName')],
        ['email' => request('email'),
        'DOB' =>  request('DOB'),
        'status' => request('status'),
        
        ]);
       /* $user = User::updateOrCreate([
            'myName' => request('myName')],
            ['email' => request('email'),
            'DOB' =>  request('DOB'),
            'status' => request('status'),
            
            ]);*/
    
    return redirect()->route('indexpage')->with('data created succesfully!!');
           
    return view('users.saveform');

}
    public function Editform($userId){
 
    $user = User::find(decrypt($userId));


    return view('users.Edit',compact('user'));
    }
    public function Viewform($userId){

    $user = User::find(decrypt($userId));
    $user->load('address', 'orders');

    
    return view('users.View',compact('user'));
    }

    public function Updateform(){
        $userId = decrypt(request('user_id'));
        $user = User::find($userId);
         $user->update([
            'myName' => request('myName'),
            'DOB' =>  request('DOB'),
            'email' => request('email'),
            'phone' => request('phone'),
            'status' => request('status'),

         ]);
        // session()->forget('user_id');
        session()->flash('date',date('d-M-Y'));
         return redirect()->route('indexpage')->with('data created succesfully!!');;
        }
    public function Deleteform($userId){
        $user = user::destroy(decrypt($userId));
        return redirect()->route('indexpage')->with('data created succesfully!!');;

    
    }
    public function Activate($userId){
        $user = user::withTrashed()->find(decrypt($userId));
        $user->restore();
        return redirect()->route('indexpage')->with('data created succesfully!!');;



    }
    public function Force($userId){
        $user = User::find(decrypt($userId))->forceDelete();
        return redirect()->route('indexpage')->with('data created succesfully!!');;

    }

    public function Admin(){
        return view('Admin');
    }

    public function Export(){
        $user =User::all();
        return (new FastExcel(($user)))->download('export-user.xslx',function($user){
            return[
                'Name'=> $user->myName,
                'Email'=> $user->email,
                'Phone'=> $user->phone,
                'Date of birth' => $user->DOB_formatted,
                'Status' => $user->status_text,
            ];
        });
    }
     
    public function PDF(){
        $user = User::all();
        $pdf = Pdf::loadView('pdf.invoice', ['users'=>$user]);
        return $pdf->stream('invoice.pdf');

    }


}



