<!DOCTYPE html>
<html>
<head>
	<title>LTS</title>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">WebSiteName</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="#">Home</a></li>
	      <li><a href="{{route('types.create')}}">Register New Loan</a></li>
	      <li><a href="{{route('clients.create')}}">Register New Client</a></li>
	      <li><a href="{{route('loans.create')}}">Issue Loan</a></li>
	      <li><a href="{{route('payments.create')}}">Payment</a></li>
	    </ul>
	  </div>
	</nav>
	<div class="container">		
		@yield('content')
	</div>
</body>
</html>