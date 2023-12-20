@extends('layouts/main')

@section('title')
Halaman Utama
@endsection

@section('content')
<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4 rounded" src="https://i.pinimg.com/236x/24/f0/97/24f09794f87fa2bd169de869b572eb57.jpg" alt="" width="140" height="140">
    <h1 class="display-5 fw-bold">Stellar Vote</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">
      Kami adalah platform inovatif yang dirancang untuk memberikan suara kepada masyarakat dalam berbagai keputusan dan pemilihan. <br>Di Stellar Vote, kami memahami pentingnya pendapat setiap individu, dan itulah mengapa kami menghadirkan sistem voting online yang mudah digunakan dan dapat diakses oleh semua.
    </p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="{{route('login')}}" class="btn btn-dark btn-lg px-4 gap-3">Bergabung</a>
      </div>
    </div>
  </div>
@endsection