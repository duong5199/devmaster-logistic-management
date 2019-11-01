<?php


namespace App\Http\Controllers;

use App\User;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class WareHouseController extends BaseController
{
    public function indexAction(Request $req) {
        $limit = 5;
        $page            = $req->query('page');
        $numberOfRecords = Warehouse::query()->count();
        $numberOfPage    = $numberOfRecords > 0 ? ceil($numberOfRecords / $limit) : 1;
        $warehouses         = Warehouse::query()
            ->skip(($page - 1) * $limit)
            ->take($limit)
            ->get();
        return view('warehouse/warehouse', [
            'warehouses' => $warehouses,
            'page'         => $page,
            'numberOfPage' => $numberOfPage,
        ]);
    }

    public function add(Request $req) {
        $errors = new MessageBag();
        if (!empty($req->post())) {
            $validator = Validator::make($req->post(), [
                'WareHouseName'        => 'required|unique:tb_warehouse,warehouse_name|min:5',
                'WareHouseAddress'        => 'required|min:5',
                'Branch' => 'required',
            ]);

            if (!$validator->fails()) {
                $newWarehouse = new Warehouse();
                $newWarehouse->warehouse_name = $req->post('WareHouseName');
                $newWarehouse->warehouse_address = $req->post('WareHouseAddress');
                $newWarehouse->branch = $req->post('Branch');
                $newWarehouse->save();
//                var_dump($newUser);exit;
                return redirect('/warehouse');
            }

            $errors = $validator->errors();
        }
        return view('warehouse/addWarehouse', [
            'errors' => $errors,
        ]);

    }

    public function edit(Request $req,$id) {
        $errors = new MessageBag();
        $wareHouse = Warehouse::where('warehouse_id',$id)->get();
        if (!empty($req->post())) {
            $validator = Validator::make($req->post(), [
                'WareHouseName'        => 'required|unique:tb_warehouse,warehouse_name|min:5',
                'WareHouseAddress'        => 'required|min:5',
                'Branch' => 'required',
            ]);

            if (!$validator->fails()) {
                $editwarehouse = Warehouse::find($id);
                $editwarehouse->warehouse_name = $req->post('WareHouseName');
                $editwarehouse->warehouse_address = $req->post('WareHouseAddress');
                $editwarehouse->branch = $req->post('Branch');
                $editwarehouse->save();
                return redirect('/warehouse');
            }
            $errors = $validator->errors();
        }

        return view('warehouse/editWarehouse',[
            'errors' => $errors,
            'wareHouse' => $wareHouse[0]
        ]);
    }


    public function delete($id) {
        Warehouse::destroy($id);
        return redirect('/warehouse');
    }
}
