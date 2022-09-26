@extends('layouts.app')

@section('main')
	<div class="container mt-5">
	  <h2>Edit Categories</h2>
	  <div class="row">
	  	<div class="col-sm-4">
	  		<form method="POST" action="/category-update/{{$category->id}}">
	  			@csrf
	  			@method('put')
	  			<!-- we can also write patch on the place of put then in wen.php we also use the patch function -->
	  			<label>Title</label>
	  			<input type="text" name="title" class="form-control" value="{{$category->title}}"><!-- in value attribute accept the $category variable as a parameter and fetch the title that is exist in this parameter this parameter pass in controller when this function is is called -->
	  			@if($errors->has('title')) <!-- Check error occur or not -->
	  				<p class="text-danger">{{ $errors->first('title') }}</p><!-- If any kind of error occur then show the error -->
	  			@endif
	  			<button class="btn btn-info mt-4" type="submit">Update</button>
	  		</form>
	  	</div>
	  </div>
	</div>
@endsection
