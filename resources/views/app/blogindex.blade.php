@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('blog.create')}}" class="btn btn-primary">Create blog</a> <br>
    <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Title</td>
              <td>Description</td>
              <td>Action</td>
			  <td>preview</td>
            </tr>
        </thead>
        <tbody>
            @foreach($blogsdata as $blogs)
            <tr>
                <td>{{$blogs->id}}</td>
                <td>{{$blogs->title}}</td>
                <td>{{$blogs->description}}</td>
				@if($blogs->user_id == $user_id && $user_role == 2)
					<td><a href="{{ route('blog.edit',$blogs->id)}}" class="btn btn-primary">Edit</a></td>
				@elseif($user_role == 1)
					<td><a href="{{ route('blog.edit',$blogs->id)}}" class="btn btn-primary">Edit</a></td>
				@else
					<td></td>
			   @endif
				<td><a href="{{ route('blog.show',$blogs->id)}}" class="btn btn-primary">Show</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection