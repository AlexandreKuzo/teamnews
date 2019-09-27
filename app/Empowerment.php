<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empowerment extends Model {
	protected $fillable = ['author', 'article', 'email'];
}
