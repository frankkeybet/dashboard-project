@extends('layouts.front')


@section('content')

 @if($posts->count())

@foreach($posts as $post) 

<div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
              {{ $post->title }}
            </h2>
            <h3 class="post-subtitle">
              {{\Illuminate\Support\Str::words($post->title, 2, '...')}}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">{{$post->user->name}}</a>
            {{$post->created_at->format('m-y')}}</p>
        </div>
        <hr>
        @endforeach
        @endif
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>

        @endsection