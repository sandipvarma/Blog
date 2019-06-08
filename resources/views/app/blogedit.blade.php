@extends('layouts.app')

@section('content')
<div class="uper">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Blog update') }}</div>

                <div class="card-body">
					  <form method="post" action="{{ route('blog.update',$blog->id) }}">
						  <div class="form-group">
							  @method('PATCH')
							  @csrf
							  <label for="name">Title:</label>
							  <input type="text" class="form-control" name="title" value="{{$blog->title}}"/>
						  </div>
						  <div class="form-group">
							  <label for="price">Description :</label>
							  <input type="text" class="form-control" name="description" value="{{$blog->description}}"/>
							   <textarea rows="4" cols="50" class="form-control" name="description" >{{$blog->description}}</textarea>
						  </div>
						<button type="submit" class="btn btn-primary">update</button>
				  </form>
			
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
