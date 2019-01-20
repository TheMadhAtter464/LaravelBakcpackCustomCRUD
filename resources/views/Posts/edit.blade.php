@extends('backpack::layout')

@section('after_styles')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="pull-left">
        <h3>Edit Post</h3>
      </div>
    </div>
  </div>

  @if(count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whooops!! </strong> There were some problems with your input.<br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {!! Form::model($posts, ['method'=>'PATCH','route'=>['posts.update', $posts->id]])!!}
    @include('posts.form')
  {!! Form::close() !!}

@endsection

@section('after_scripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
    $('.select2-multi').select2().val({!! json_encode($posts->tags()->pluck('tags.id')->toArray()) !!}).trigger('change');
	</script>

@endsection
