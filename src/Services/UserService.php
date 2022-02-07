<?php namespace App\Services;

use App\Models\User;

final class UserService extends AbstractService
{
    public $model = User::class;

	public function user()
	{
		if($this->check()) {
			return $_SESSION['user'];
		}
		return null;
	}

	public function check()
	{
		return isset($_SESSION['user']);
	}

	public function attempt($username, $password)
	{
		$user = User::where('username', $username)->where('active', true)->first();
		if(!$user) {
			return false;
		}

		if(password_verify($password, $user->password)) {
			$_SESSION['user'] = (object) [
                'id' => $user->id,
                'name' => $user->full_name,
                'role' => $user->role,
                'avatar' => $user->avatar
            ];
			return true;
		}

		return false;
	}

	public function reset($userId, $old_password, $new_password, $newUsername = null)
    {
		$user = User::find($userId);
		if(password_verify($old_password, $user->password)) {
			$user->password = password_hash($new_password, PASSWORD_DEFAULT);
			if($newUsername) $user->username = $newUsername;
			$user->save();
			return true;
		}
		return false;
	}

	public function isAdmin()
	{
		$usr = $this->user();
		if($usr === null) {
			return false;
		}

		return $usr->role === 'admin';
	}

	public function logout()
	{
		unset($_SESSION['user']);
	}
}
