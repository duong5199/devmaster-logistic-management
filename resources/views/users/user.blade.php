@extends('layouts.default')
@section('content')
        <div class="row mb-3">
            <a target="_blank" href="/laravel-app(ex)/public/user/add" class="btn btn-primary">Add User</a>
        </div>
        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Full Name</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $us)
                    <tr>
                        <td>{{ $us->id }}</td>
                        <td>{{ $us->username }}</td>
                        <td>{{ $us->password }}</td>
                        <td>{{ $us->fullname }}</td>
                        <td>{{ $us->phone }}</td>
                        <td>
                            {{$us->role}}
                        </td>
                        <td>
                            <a href="/laravel-app(ex)/public/user/edit/{{$us->id}}">Edit </a>|
                            <a href="/laravel-app(ex)/public/user/delete/{{$us->id}}">Delete</a>
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
                            <a class="page-link" href="/user/{{ $i }}">{{ $i }}</a>
                        </li>
                    @endfor
                </ul>
            </nav>
        </div>

@endsection

