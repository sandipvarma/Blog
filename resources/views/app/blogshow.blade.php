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
                <div class="card-header">{{ __('Blog') }}</div>

                <div class="card-body">
					
							<label for="name" class="col-md-3 col-form-label">id: {{ $blog->id }}</label> <br>
                            <label for="name" class="col-md-3 col-form-label">Title: {{ $blog->title }}</label> <br>
							
                           
                               <label class="col-md-6 col-form-label">Description: {{$blog->description}}</label>
                           
                      
			
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
