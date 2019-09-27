<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Envol extends Model {
	protected $fillable = ['author', 'article', 'email'];
}
