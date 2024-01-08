@extends('layouts.main')

@section('title')
Result Vote
@endsection

@section('content')
<div class="container px-4">
    <div class="row gx-5">
        <div class="col">
            <div class="card">
                <div class="card-header">{{$post->title}}</div>
                <div class="card-body">
                    {{$post->content}}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Hasil Pemilihan Suara Terbanyak Saat Ini
                </div>
                <ol class="list-group list-group-numbered">
                    @foreach($post->votes->sortByDesc('value') as $vote)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">{{$vote->name}}</div>
                        </div>
                        <span class="badge bg-primary rounded-pill">{{$vote->value}}</span>
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection