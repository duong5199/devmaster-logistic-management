@extends('layouts.default')
@section('content')
    <h1> Moi ban thêm WareHouse</h1>
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section class="container">
        <div class="row">
            <form class="w-75" method="POST" action="{{route('store')}}">
                <a href="{{route('dwh')}}" class="btn-primary" >Tro lai</a>
                @csrf

                <div class="form-group d-flex">
                    <label>Name</label>
                    <input type="text" class="form-control ml-5" name="name" placeholder="Enter Name">
                </div>
                <div class="form-group d-flex">
                    <label>Adress</label>
                    <input type="text" class="form-control ml-5" name="address"  placeholder="Enter Dia chi">
                </div>
                <div class="form-group d-flex">
                    <label>Branch</label>
                    <input type="text" class="form-control ml-5" name="branch"  placeholder="Enter brach">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </section>
    @endsection


