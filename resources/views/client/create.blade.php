@extends('layout.base')
@section('content')
	<h1>REGISTER NEW CLIENT</h1>
	<a href="{{route('clients.index')}}">VIEW ALL ACTIVE CLIENTS</a>
	<hr>
	{!! Form::open(['method'=>'POST','action'=>'ClientsController@store']) !!}

		{!! Form::label('name','Client Name: ')!!}
		{!! Form::text('name',null,['placeholder'=>'Client Name'])!!}{{$errors->first('type')}}<br>

		{!! Form::label('address','Address: ')!!}
		{!! Form::text('address',null,['placeholder'=>'Client\'s Address'])!!}{{$errors->first('type')}}<br>


		{!! Form::label('contact','Contact: ')!!}
		{!! Form::text('contact',null,['placeholder'=>'Contact'])!!}{{$errors->first('rate')}}<br>

		{!! Form::submit('Save New Loan Type')!!}
		{!! Form::reset('Reset')!!}
	{!! Form::close()!!}

	<div class="card card-register mx-auto mt-5">
		<div class="card-header">Register an Account</div>
		<div class="card-body">
			<form>
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-6">
							<label for="exampleInputName">First name</label>
							<input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter first name">
						</div>
						<div class="col-md-6">
							<label for="exampleInputLastName">Last name</label>
							<input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Enter last name">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email">
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-6">
							<label for="exampleInputPassword1">Password</label>
							<input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
						</div>
						<div class="col-md-6">
							<label for="exampleConfirmPassword">Confirm password</label>
							<input class="form-control" id="exampleConfirmPassword" type="password" placeholder="Confirm password">
						</div>
					</div>
				</div>
				<a class="btn btn-primary btn-block" href="login.html">Register</a>
			</form>
			<div class="text-center">
				<a class="d-block small mt-3" href="login.html">Login Page</a>
				<a class="d-block small" href="forgot-password.html">Forgot Password?</a>
			</div>
		</div>
	</div>
@endsection('content')