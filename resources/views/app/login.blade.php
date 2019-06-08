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
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
					  <form method="post" action="{{action('UsersController@logincheck')}}">
						 	  @csrf
						  <div class="form-group">
							  <label for="price">email :</label>
							  <input type="text" class="form-control" name="email_id"/>
						  </div>
						  <div class="form-group">
							  <label for="quantity">Password:</label>
							  <input type="password" class="form-control" name="password"/>
						  </div>
					<button type="submit" class="btn btn-primary">Login</button>
				  </form>
			
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
