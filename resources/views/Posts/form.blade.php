<div class="row">
  <div class="col-xs-12">
    <div class="form-group">
      <strong>Title : </strong>
      {!! Form::text('title', null, ['placeholder'=>'Title','class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-xs-12">
    <div class="form-group">
      <strong>Body : </strong>
      {!! Form::textarea('body', null, ['placeholder'=>'Body','class'=>'form-control','style'=>'height:150px']) !!}
    </div>
  </div>
  <div class="col-xs-12">
    <div class="form-group">
      {!! Form::label('Image :') !!}
      {!! Form::textarea('image', null, ['placeholder'=>'Image', 'class'=>'form-control','style'=>'height:35px']) !!}
    </div>
  </div>
<!--dropdown table -->


  <div class="col-xs-12">
    <div class="form-group">
      {{ Form::label('tags', 'Tags:') }}
				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
						<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
					@endforeach
				</select>
    </div>
  </div>

  <div class="col-xs-12">
    <a class="btn btn-xs btn-success" href="">Back</a>
    <button type="submit" class="btn btn-xs btn-primary" name="button">Submit</button>
  </div>
</div>
