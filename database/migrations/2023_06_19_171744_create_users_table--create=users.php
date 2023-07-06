<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users',function(Blueprint $table){
            $table->bigIncrements('user_id'); //id of user table or bigincrements() 
            $table->string('myName',50);//name and namelength
            $table->date('DOB');
            $table->boolean('status')->default(1)->comment('1:Active,0:Inactive'); //to get the status of the table by identifying 1 and 0
            $table->timestamps();//created_at & updated_at
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        //
    }
};
