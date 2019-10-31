@extends('layouts.default')
@section('content')
        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Full Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Role</th>
                    <th>Status</th>
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
                        <td>{{ $us->address }}</td>
                        <td>
                            {{$us->role}}
                        </td>
                        <td>
                            <a href="/user/edit/{{$us->user_id}}">Edit</a>|
                            <a href="/user/delete/{{$us->user_id}}">Delete</a>
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
                            <a class="page-link" href="/user?page={{ $i }}">{{ $i }}</a>
                        </li>
                    @endfor
                </ul>
            </nav>
        </div>
@endsection

