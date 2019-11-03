@extends('layouts.default')
@section('content')
    <h1> Moi ban thay đổi thông tin WareHouse</h1>
    <section class="container">
        <div class="row">
            <form class="w-75" method="POST" action="{{route('put', ['id' => $dwhs->warehouse_id])}}">
                <a href="{{route('dwh')}}" class="btn-primary" >Tro lai</a>
                @csrf

                <div class="form-group d-flex">
                    <label>Name curent : {{$dwhs->warehouse_name}}</label>
                    <label>Name</label>
                    <input type="text" class="form-control ml-5" name="name" required placeholder="Enter Name">
                </div>
                <div class="form-group d-flex">
                    <label>Adress current : {{$dwhs->warehouse_address}}</label>
                    <input type="text" class="form-control ml-5" name="address" required placeholder="Enter Dia chi">
                </div>
                <div class="form-group d-flex">
                    <label>Branch current : {{$dwhs->branch}}</label>
                    <input type="text" class="form-control ml-5" name="branch" required placeholder="Enter brach">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </section>
    @endsection


