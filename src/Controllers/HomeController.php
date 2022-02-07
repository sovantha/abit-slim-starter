<?php namespace App\Controllers;

final class HomeController extends AbstractController
{
    public function getIndex($req, $res)
    {
        $data = [];
        return view($res, 'home.php', $data);
    }
    
    public function getLogin($req, $res)
    {
		if($this->auth->check()) {
            return $req->isXhr() ? 
                status_code($res, 400, BAD_REQUEST_SMS) :
                redirect($res, path_for('home'));
        }

		$nameKey = $this->csrf->getTokenNameKey();
        $valueKey = $this->csrf->getTokenValueKey();

		$tokenArray = [
			$nameKey => $req->getAttribute($nameKey),
			$valueKey => $req->getAttribute($valueKey)
		];

        return $req->isXhr() ? 
            json($res, $tokenArray) :
            view($res, 'login.php', compact('tokenArray'), false);
    }
}
