@extends('layouts.main')
@php
$user = auth()->user()
@endphp
@section('title')
Dashboard
@endsection
@section('content')

<div class="row justify-content-center mt-4">
    <div class="col-md-11">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
                @else
                <div class="alert alert-success">
                    You are logged in!
                </div>
                @endif
                @if($user->role == "admin")
                <div class="card">
                    <div class="card-header">
                        Welcome Role Sepuh :D
                    </div>
                    <div class="body">
                        <p>Detail: {{$user}} </p>
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <h5>Daftar List Postingan</h5>
                                <tr>
                                    <th scope="col">No ID</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Owner</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $value)
                                    <tr>
                                        <th scope="row">{{$value->id}}</th>
                                        <td>{{$value->title}}</td>
                                        <td>{{$value->content}}</td>
                                        <td>{{$value->user->username}}</td>
                                        <td>
                                            <a href="{{route('vote.show', $value->id)}}" class="btn btn-block btn-dark">View</a>
                                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                @else
                <div>
                    <h3>Selamat Datang {{$user->username}}</h3>
                    <p>Salam sahabat yang terhormat,
                        Kami mengucapkan terima kasih atas partisipasi Anda dalam sesi pemilihan ini. <br> Sebagai bagian dari proses demokrasi, Anda memiliki kesempatan untuk memberikan suara pada berbagai postingan yang telah disediakan di bawah ini.
                    </p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection