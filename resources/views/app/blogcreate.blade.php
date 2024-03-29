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
                <div class="card-header">{{ __('Blog Create') }}</div>

                <div class="card-body">
					  <form method="post" action="{{ route('blog.store') }}">
						  <div class="form-group">
							  @csrf
							  <label for="name">Title:</label>
							  <input type="text" class="form-control" name="title"/>
						  </div>
						  <div class="form-group">
							  <label for="price">Description :</label>
							  <textarea rows="4" cols="50" class="form-control" name="description"> </textarea>
						  </div>
						<button type="submit" class="btn btn-primary">Add</button>
				  </form>
			
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
