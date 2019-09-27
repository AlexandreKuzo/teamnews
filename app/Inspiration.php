<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspiration extends Model {
	protected $fillable = ['author', 'article', 'email'];

}
