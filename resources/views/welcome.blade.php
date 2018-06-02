@extends('layouts.templete')
@section('content')
<!-- Blog Entries Column -->
  <!-- Blog Post -->
  @foreach($post as $data)
  <div class="card mb-12" style="border:0px;">
    <div class="card-body">
      <h2 class="card-title"><a href="{{ url('post/'.$data->id)}}">{{$data->title}}</a></h2>
        <img src="{{ URL::asset('images/'.$data->image)}}" style="width: 200px; height: 200px;"  alt="No Gambar">
      <p class="card-text">{{str_limit($data->desc, $limit = 500, $end = '...')}}</p>
    </div>
    <div class="card-footer text-muted">
     {{$data->created_at}}
     <a href="#">Admin</a>
   </div>
   <h6>
    <a href="{{ url('post/'.$data->id)}}">Comment</a>
    <a href="/like">Like</a>
    <a href="/share">Share</a>
    <a href="{{ url('post/'.$data->id)}}">Details</a>
   </h6>
  </div>
 @endforeach
 <!-- Pagination -->
    {{ $post->links() }} 
</div>
@endsection