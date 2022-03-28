<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
 
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    protected $fillable = [
        'username', 
        'email', 
        'password', 
        'phone_no'
    ];
    
    protected $hidden = [
        'password',
    ];
    public function up(){
        Schema::create('users', function (Blueprint $table){
            $table->bigIncrement('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_no');
        });
    }

    public function down(){
        Schema::dropIfExists('users');
    }
}
