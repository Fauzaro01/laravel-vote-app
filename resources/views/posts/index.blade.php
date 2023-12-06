@extends('layouts.main')

@section('title')
Create VotePost
@endsection

@section('content')
<div class="header">
    <div class="card text-dark bg-light mb-3">
        <div class="card-header"></div>
        <div class="card-body">
            <h5 class="card-title">Vote Title</h5>
            <p class="card-text">Bla bla bla (Opsional)</p>
        </div>
        <div class="card-footer"></div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4 m-auto">
        <div class="card">
            <div class="card-body m-auto">
                <h5 class="card-title">Lorem ipsum dolor sit amet consectetur adipisicing elit. </h5>

                <a href="#" class="btn btn-primary disabled">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4  m-auto">
        <div class="card">
            <div class="card-body m-auto">
                <h5 class="card-title">Special title treatment</h5>

                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>
@endsection