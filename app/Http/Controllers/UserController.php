<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
    public function indexAction(Request $req)
    {
        $limit           = 2;
        $page            = $req->route()->parameter('page', 1);
        $numberOfRecords = User::query()->count();
        $numberOfPage    = $numberOfRecords > 0 ? round($numberOfRecords / $limit) : 1;
        $users         = User::query()
            ->skip(($page - 1) * $limit)
            ->take($limit)
            ->get();
        return view('users/user', [
            'users' => $users,
            'page'         => $page,
            'numberOfPage' => $numberOfPage,
            'username' => $req->session()->get('username')
        ]);
    }
}
