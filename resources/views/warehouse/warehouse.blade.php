@extends('layouts.default')
@section('content')

<div class="row">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Stt</th>
            <th>WareHouse Name</th>
            <th>WareHouse Address</th>
            <th>Branch</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($warehouses as $key => $warehouse)
        <tr>
            <td>{{ $key }}</td>
            <td>{{ $warehouse->warehouse_name }}</td>
            <td>{{ $warehouse->warehouse_address }}</td>
            <td>{{ $warehouse->branch }}</td>
            <td>
                <a href="/warehouse/edit/{{$warehouse->warehouse_id}}">Edit</a>|
                <a href="/warehouse/delete/{{$warehouse->warehouse_id}}">Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="row justify-content-center">
    <nav>
        <ul class="pagination">
            @for($i = 1; $i <= $numberOfPage; $i++)
            <li class="page-item {{ ($page == $i) ? 'active' : '' }}">
                <a class="page-link" href="/warehouse?page={{ $i }}">{{ $i }}</a>
            </li>
            @endfor
        </ul>
    </nav>
</div>
@endsection

