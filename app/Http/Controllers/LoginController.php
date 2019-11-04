<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class LoginController extends BaseController
{
//http://localhost:8080/dev-logistic-management/public/login
    public function Login(Request $req)
    {
        $errors = new MessageBag();
        if (!empty($req->post())){
            $validator = Validator::make($req->post(), [
                'username' => 'required|min:5',
                'password' => 'required|min:5'
            ]);
            if (!$validator->fails()) {
                $username = $req->post('username');
                $password = $req->post('password');

                $user = User::query()->where('username', $username)->get();
                if (!empty($user)){
                    $user = $user[0];
                    if ($password === $user->password){

                        if ($user->status == 1){
                            $req->session()->put('isLoggedIn', true);
                            $req->session()->put('role',$user->role);
                            $req->session()->put('username', $username);
                            return redirect('/user');
                        }else{
                            $errors->add("", "This user has been locked");
                        }
                    }else{
                        $errors->add("", "The credentials are incorrect");
                    }
                }else{
                    $errors->add("", "The credentials are incorrect");
                }
            }else{
                $errors = $validator->errors();
            }

        }
        return view("login", [
            'errors' => $errors
        ]);
    }

    public function Logout(Request $req){
        $req->session()->flush();
        return redirect('/login');
    }

}
