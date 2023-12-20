@extends('layouts.main')

@section('title')
VotePost
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">{{$data->title}}</h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted by {{$data->user->username}}</div>
                </header>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4">{{$data->content}}</p>
                </section>
            </article>
            <!-- Vote section-->
            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                    <form method="post" action="{{ route('vote.send') }}">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $data->id }}">

                            <div class="form-group">
                                <label for="vote_id">Pilih Kandidat:</label>
                                <select name="vote_id" id="vote_id" class="form-control">
                                    @foreach($data->votes as $candidate)
                                        <option value="{{ $candidate->id }}">{{ $candidate->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if(auth()->user()->hasVoted($data->id))
                                <h3>Udah Vote Cuy</h3>
                            @endif

                            <button type="submit" class="btn btn-primary">Vote</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">Qoutes of The Day</div>
                <div class="card-body">“Maka sesungguhnya bersama kesulitan ada kemudahan,” &ndash;  Q.S Al-insyirah (94:5).</div>
            </div>
        </div>
    </div>
</div>
@endsection