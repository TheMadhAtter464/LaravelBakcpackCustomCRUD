@extends('backpack::layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="" method="post">
                    <div class="card-body">
                        @csrf
                        <label>Create category :</label>
                        <input type="text" class="form-control" name="name" />
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
