<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
   use HasApiTokens, HasFactory, Notifiable;


   protected $table = "usuarios";
   protected $fillable = [
         'nome',
         'email',
         'password',
         'confirmpassword',
         'titulacao',
         'institucao',
         'telefone',
         'nartigos',
         'enderecopostal',
   ];

   public $timestamps = true;


   public function getAuthIdentifierName()
   {
      return $this->getKey();
   }

   public function getAuthIdentifier()
   {
      return $this->email;
   }


   public function getAuthPassword()
   {
      return $this->password;
   }

   public function getRememberToken()
   {

   }

   public function setRememberToken($value){

   }

   public function getRememberTokenName()
   {

   }

   public function hasNrevista()
   {
      return $this->hasMany(Nrevista::class,'autor_id');
   }



}
