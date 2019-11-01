<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class ThongKeController extends BaseController
{
    public function Index(){
        return view('thongke/show');
    }
}
