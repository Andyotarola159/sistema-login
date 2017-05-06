<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagens';

   	protected $fillable=['foto','user_id'];

   	public function user(){

   		return $this->belongsTo('User');
   	}

}
