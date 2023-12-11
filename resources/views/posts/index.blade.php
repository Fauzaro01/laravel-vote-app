@extends('layouts.main')

@section('title')
Create VotePost
@endsection

@section('content')
<div class="container">
        <h2>Daftar Vote Sedang Berlangsung</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($votePosts as $votePost)
                    <tr>
                        <td>{{ $votePost->title }}</td>
                        <td>{{ $votePost->content }}</td>
                        <td>
                            <a href="#" class="btn btn-outline-dark">Details</a>
                            <a href="#" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection