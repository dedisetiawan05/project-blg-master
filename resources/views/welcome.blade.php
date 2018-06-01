@extends('layouts.visitor-layout')
@section('content')
<!-- Blog Entries Column -->
<div style="height: 600px;"></div>
<div class="col-md-12" style="float:right; text-align: left;">
  <h1>News</h1>
  <!-- Blog Post -->
  @foreach($post as $data)
  <div class="card mb-12">
    <div class="card-body">
      <h2 class="card-title"><a href="{{ url('post/'.$data->id)}}">{{$data->title}}</a></h2>
        <img src="{{ URL::asset('images/'.$data->image)}}" style="width: 200px; height: 200px;"  alt="No Gambar">
      <p class="card-text">{{str_limit($data->desc, $limit = 500, $end = '...')}}</p>
      <a href="{{ url('/'.$data->id)}}" class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
     {{$data->created_at}}
     <a href="#">Admin</a>
   </div>
  </div>
 @endforeach
 <!-- Pagination -->
    {{ $post->links() }} 
</div>
@stop

