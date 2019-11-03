<?php

namespace App\Http\Controllers;


use App\User;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;

class WarehouseController extends BaseController

{
    public function showDwh(Request $req)
    {
        $limit           = 3;
        $page            = $req->get('page');
        $numberOfRecords = Warehouse::query()->count();
        $numberOfPage    = $numberOfRecords > 0 ? floor($numberOfRecords / $limit) : 1;
        $dwhs         = Warehouse::query()
            ->skip(($page - 1) * $limit)
            ->take($limit)
            ->get();

        return view('dwhs.dwhs', [
            'dwhs' => $dwhs,
            'numberOfPage' => $numberOfPage,
            'page' => $page
        ]);
    }
    public function add()
    {
        return view('dwhs/ed_dwhs');
    }

    public function store(Request $request)
    {
        $errors = new MessageBag();
        if (!empty($request->post())) {
            $validator = Validator::make($request->post(), [
                'name' => 'required|unique:tb_warehouse,warehouse_name|min:5',
                'address' => 'required|min:5',
                'branch' => 'required|min:5',
            ]);
            if (!$validator->fails()) {
                $warehouse = new Warehouse();
                $warehouse->warehouse_name = $request->input('name');
                $warehouse->warehouse_address = $request->input('address');
                $warehouse->branch = $request->input('branch');
                $warehouse->save();
                return redirect('dwh');
            }
            $errors = $validator->errors();
        }
        return view('dwhs.ed_dwhs',[
            'errors' => $errors
        ]);
    }

    public function test()
    {
        return view('test');
    }

    public function edit($id) {

        $dwhs = Warehouse::find($id);
//        print_r($dwhs);exit;
        return view('dwhs.edit_wh', [
            'dwhs' => $dwhs,
        ]);

    }
    public function update(Request $request,$id){
        $dwhs = Warehouse::find($id);
        $name = $request->input('name');
        $address = $request->input('address');
        $branch = $request->input('branch');

        $dwhs->warehouse_name = $name;
        $dwhs->warehouse_address = $address;
        $dwhs->branch = $branch;

        $dwhs->save();
        return redirect('dwh');
    }
}


