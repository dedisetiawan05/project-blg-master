@extends('layouts.templetesingle')
<!-- @section('style-css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/bootstrap/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
@endsection -->
@section('content')
<!-- Post Content Column -->

  <!-- Title -->
  <h1 class="mt-4">{{$data->title}}</h1>

  <!-- Author -->
  <p class="lead">
    by
    <a href="#">Admin</a>
  </p>

  <hr>

  <!-- Date/Time -->
  <p>Posted on {{$data->created_at}}</p>

  <hr>

  <!-- Preview Image -->
  <img class="img-fluid rounded" src="{{URL::to('images/'.$data->image)}}" style="height: 200px; width:200px;" alt="No Gambar">

  <hr>

  <!-- Post Content -->
  <p class="lead">{{$data->desc}}</p>

  <hr>

  <!-- Comments Form -->
  <div class="card my-4" style="border:0px;">
    <h5 class="card-header">Leave a Comment:</h5>
    <div class="card-body">
      <form action="/comment" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label>
            Name
          </label>
          <input type="text" class="form-control" name="name" placeholder="Enter Your Name Here!">
        </div>
        <div class="form-group">
          <label>
            Comment
          </label>
          <textarea class="form-control" name="comment" rows="3" placeholder="Place Your Comment Here"></textarea>
        </div>
        <input type="hidden" name="post_id" value="{{$data->id}}">
        <button type="button" class="btn btn-danger" onclick="self.history.back();">Back</button>
        <input type="Submit" class="btn btn-primary" value="Submit">
      </form>
    </div>
  </div>
  <hr>
  @foreach ($data->comments()->get() as $comment)
        <div class="card mb-4" style="border: 0px;">
            <div class="card-body">
              <div class="card-title">
                <h4 class="mt-0">{{ $comment->nama }}</h4>
                <hr>
              </div>
              <p class="card-text">
                {{ $comment->comment }}
              </p>
            </div>
            <div class="card-footer text-muted">
          <!-- untuk admin bisa hapus visitor tidak bisa masuk -->
              @if (Route::has('login'))
                @auth
                  <a href="{{ url('admin/deleteone/'.$comment->id)}}">
                    <button type="button" class="btn pull-right"><li class="fa fa-trash"></li></button>
                  </a>
              @else
                  tidak bisa menghapus
              @endauth
              @endif
        </div>
  @endforeach
@endsection