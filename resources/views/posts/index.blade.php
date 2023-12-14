@extends('layouts.main')

@section('title')
Create VotePost
@endsection

@section('content')
<div class="container overflow-auto">
    <div class="row gy-5">
        @foreach($votePosts as $value)
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$value->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Creator: {{$value->user->username}}</h6>
                    <p class="card-text">
                        @if(strlen($value->content) > 100)
                            {{strlen($value->content, 0, 85). "..."}}
                        @else
                            {{$value->content}}
                        @endif
                    </p>
                    <a href="#" class="btn  btn-sm btn-outline-dark">View</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection