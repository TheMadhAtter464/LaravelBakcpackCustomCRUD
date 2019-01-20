@extends('backpack::layout')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="pull-left">
        <h3>Show Post </h3> <a class="btn btn-xs btn-primary" href="{{ route('posts.index') }}">Back</a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <div class="form-group">
        <strong>Title : </strong>
        {{ $posts->title }}
      </div>
    </div>
    <div class="col-xs-12">
      <div class="form-group">
        <strong>Body : </strong>
        {{ $posts->body }}
      </div>
    </div>
    <div class="col-xs-12">
      <div class="form-group">
        <strong>Image : </strong>
        <td><img src="{{$posts->image}}" width="40" height="40" /></td>
      </div>
    </div>
    <div class="col-xs-12">
      <div class="form-group">
        <strong>Category : </strong>
        @foreach($posts->tags as $tag)
          <td>{{ $tag->name }}</td>
        @endforeach

      </div>
    </div>
  </div>

@endsection
