<?php


namespace App\Http\Controllers;

use App\User;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;

class UserController extends BaseController
{
    public function indexAction(Request $req) {
        $limit = 5;
        $page            = $req->query('page');
        $numberOfRecords = User::query()->count();
        $numberOfPage    = $numberOfRecords > 0 ? ceil($numberOfRecords / $limit) : 1;
        $users         = DB::table('tb_employees')
            ->join('tb_warehouse', 'tb_employees.warehouse_id', '=', 'tb_warehouse.warehouse_id')
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

    public function createUser(Request $req) {
        $errors = new MessageBag();
        $wareHouse = Warehouse::all();
        if (!empty($req->post())) {
            $validator = Validator::make($req->post(), [
                'Username'        => 'required|unique:tb_employees,username|min:5',
                'Password'        => 'required|min:5',
                'Fullname' => 'required|min:5',
                'Phone' => 'required|max:11',
                'Address' => 'required|min:5',
                'Status' => 'required|',
                'Role' => 'required|',
                'Warehouse' => 'required|',
            ]);

            if (!$validator->fails()) {
                $newUser = new User();
                $newUser->username = $req->post('Username');
                $newUser->password = $req->post('Password');
                $newUser->fullname = $req->post('Fullname');
                $newUser->phone = $req->post('Phone');
                $newUser->address = $req->post('Address');
                $newUser->status = $req->post('Status');
                $newUser->role = $req->post('Role');
                $newUser->warehouse_id = $req->post('Warehouse');
                $newUser->save();
//                var_dump($newUser);exit;
                return redirect('/user');
            }

            $errors = $validator->errors();
        }
        return view('users/createuser', [
            'errors' => $errors,
            'wareHouses' => $wareHouse
        ]);

    }

    public function edit(Request $req,$id) {
        $errors = new MessageBag();
        $wareHouse = Warehouse::all();
        $user = User::where('user_id',$id)->get();
        if (!empty($req->post())) {
            $validator = Validator::make($req->post(), [
                'Username'        => 'required|min:5',
                'Password'        => 'required|min:5',
                'Fullname' => 'required|min:5',
                'Phone' => 'required|max:11',
                'Address' => 'required|min:5',
                'Status' => 'required|',
                'Role' => 'required|',
                'Warehouse' => 'required|',
            ]);

            if ($validator->fails()) {
                $userUpdate = User::find($id);
                $userUpdate->password = $req->post('Password');
                $userUpdate->fullname = $req->post('Fullname');
                $userUpdate->phone = $req->post('Phone');
                $userUpdate->address = $req->post('Address');
                $userUpdate->status = $req->post('Status');
                $userUpdate->role = $req->post('Role');
                $userUpdate->warehouse_id = $req->post('Warehouse');
                $userUpdate->save();
                return redirect('/user');
            }
            $errors = $validator->errors();
        }
        return view('users/updateUser',[
            'errors' => $errors,
            'user'   => $user[0],
            'wareHouses' => $wareHouse
        ]);
    }


    public function delete($id) {
        User::destroy($id);
        return redirect('/user');
    }
}
