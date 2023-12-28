@extends('layouts.main')

@section('title')
Daftar Postingan Vote
@endsection

@section('content')
<div class="container mt-2 overflow-auto">
    <div class="row gy-5">
        @foreach($votePosts as $value)
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$value->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Author {{$value->user->username}}, created at {{$value->created_at->format('d-m-Y')}}</h6>
                    <p class="card-text">
                        @if(strlen($value->content) > 100)
                            {{substr($value->content, 0, 85). "..."}}
                        @else
                            {{$value->content}}
                        @endif
                    </p>
                    <a href="{{route('vote.show', $value->id)}}" class="btn btn-outline-dark">View</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection