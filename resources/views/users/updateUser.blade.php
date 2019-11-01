@extends('layouts.default')
@section('content')
<div class="card card-primary w-full">
    <div class="card-header">
        <h3 style="color: white">Update User</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @if($errors->any())
    <div class="alert alert-danger card-body" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form role="form" method="POST" action="">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" value="{{$user->password}}" name="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Fullname</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$user->fullname}}" name="Fullname">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Phone</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$user->phone}}" name="Phone">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Address</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$user->address}}" name="Address">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="Status" class="form-control">
                    <option value="1">Enable</option>
                    <option value="2">Disable</option>
                </select>
            </div>
            <div class="form-group">
                <label>Role</label>
                <select name="Role" class="form-control">
                    <option>administrators</option>
                    <option>warehouse_managers</option>
                    <option>warehouse_staffs</option>
                    <option>shipping_staffs</option>
                </select>
            </div>
            <div class="form-group">
                <label>Ware House</label>
                <select class="form-control" name="Warehouse">
                    @foreach($wareHouses as $warehouse)
                    <option
                        @if($warehouse->warehouse_id == $user->warehouse_id)
                            selected
                        @endif
                        value="{{$warehouse->warehouse_id}}">{{$warehouse->warehouse_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection
