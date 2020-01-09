@extends('layouts.default')
@section('content')
<div class="card card-primary w-full">
    <div class="card-header">
        <h3 style="color: white">New User</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
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
                <label for="exampleInputEmail1">WareHouse Name</label>
                <input type="text" class="form-control" value="{{$wareHouse->warehouse_name}}" name="WareHouseName">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">WareHouse Address</label>
                <input type="text" class="form-control" value="{{$wareHouse->warehouse_address}}" name="WareHouseAddress">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Branch</label>
                <input type="text" class="form-control" value="{{$wareHouse->branch}}" name="Branch">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection
