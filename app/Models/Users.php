<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    protected $connection = 'mysql';
	protected $table = 'users';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $fillable = [
		'username',
		'email',
		'password',
	];
}
