@extends('layouts.app')

@section('main')
	<div class="container mt-5">
	  <h2>New Categories</h2>
	  <div class="row">
	  	<div class="col-sm-4">
	  		<form method="POST" action="/category-store">
	  			@csrf
	  			<label>Title</label>
	  			<input type="text" name="title" class="form-control" value="{{old('title')}}"><!-- value="{{old('title')}} its mean the previous value does not remove of any kind of error occur -->
	  			@if($errors->has('title')) <!-- Check error occur or not -->
	  				<p class="text-danger">{{ $errors->first('title') }}</p><!-- If any kind of error occur then show the error -->
	  			@endif
	  			<button class="btn btn-info mt-4" type="submit">Create</button>
	  		</form>
	  	</div>
	  </div>
	</div>
@endsection