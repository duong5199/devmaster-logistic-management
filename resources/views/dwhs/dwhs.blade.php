
@extends('layouts.default')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>DataTables Warehouse</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">DataTables</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="container-fluid">
    <div class="row ">
        <div class="card-header w-100">
            <a href="{{route('add_dwh')}}">Them moi DWH</a>
                    {{-- Nut them mowi --}}
        </div>
    </div>
    <div >
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">DWH_id</th>
                <th scope="col">DWH_name</th>
                <th scope="col">DWH_address</th>
                <th scope="col">branch</th>
                <th scope="col">Edit/ Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dwhs as $dw)
            <tr>
                <th scope="row">{{ $dw-> warehouse_id }}</th>
                <td>{{ $dw->warehouse_name }}</td>
                <td>{{ $dw->warehouse_address }}</td>
                <td>{{ $dw->branch }}</td>
                <td>
                    <a href="{{route('edit',$dw-> warehouse_id)}}">Edit | </a>
                    <a href="#">Delete</a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item @if($page == 1)
                    disabled
                    @endif
                ">
                    <a class="page-link" href="/dwh?page={{$page - 1}}" tabindex="-1" >Previous</a>
                </li>
                @for($i = 1; $i<=$numberOfPage ; $i++)
                    <li class="page-item"><a class="page-link" href="/dwh?page={{$i}}">{{$i}}</a></li>
                @endfor
                <li class="page-item @if($page == $numberOfPage)
                    disabled
                    @endif
                    ">
                    <a class="page-link " href="/dwh?page={{$page + 1}}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</section>

    @endsection
