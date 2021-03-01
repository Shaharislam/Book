<?php

namespace Book\Contact\Models;

use Illuminate\Database\Eloquent\Model;
use Book\Contact\Contracts\Contact as ContactContract;

class Contact extends Model implements ContactContract
{
	protected $table = 'contact';
    protected $fillable = ['name','email','phone','message_title','message_body']; 
}