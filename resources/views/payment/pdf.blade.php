<html>
<head>
	<style>
		table {
			border-collapse: collapse;
		}

		.table-sm th,
		.table-sm td {
			padding: 0.3rem;
		}


		.table-bordered {
			border: 1px solid #dee2e6;
			width: 100%;
		}

		.table .thead-dark th {
			color: #fff;
			background-color: #212529;
			border-color: #32383e;
		}


	</style>
</head>
	<body>
		{{--loan and client detail--}}
		@include('payment.partials.loanDetail')

		{{--Payment Table--}}
		@include('payment.partials.paymentTable')
	</body>
</html>



