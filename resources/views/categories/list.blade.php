@extends('layouts.app')

@section('main')

  <div class="container mt-5">
    <h2>Categories <a href='/category-create' class="btn btn-success">New Category</a></h2>
    <!-- Flash message notify -->
    @if(session()->has('success'))
      <div class="alert alert-success">
        <strong>{{ session()->get('success')}}</strong>
      </div>
    @endif
    <table class="table table-striped">
      <thead>
        <tr>
          <th>S.No.</th>
          <th>Title</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($category_data as $category)
          <tr>
            <td>{{$loop->index +1 }}</td>
            <td>{{$category->title}}</td>
            <td>
              <a href="/category-edit/{{$category->id}}" class="btn btn-sm btn-info">Edit</a>
            	<a href="/category-delete/{{$category->id}}" class="btn btn-sm btn-danger">Delete</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $category_data->links() }}
  </div>
@endsection