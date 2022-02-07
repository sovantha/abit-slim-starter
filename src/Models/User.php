<?php namespace App\Models;

final class User extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
		'username',
        'password',
        'full_name',
        'email',
        'phone',
        'role',
		'super_admin',
        'avatar',
		'active'
	];

    static $validations = [
        'username' => 'Name is required',
        'password' => 'Password is required',
        'role' => 'Role is required'
    ];
}
