<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>LTS</title>
  <!-- Bootstrap core CSS-->
  <link href="/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="#">LTS</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="#">
          <i class="fa fa-fw fa-dashboard"></i>
          <span class="nav-link-text">Dashboard</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{route('loans.index')}}">
          <i class="fa fa-fw fa-dashboard"></i>
          <span class="nav-link-text">Home</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
        <a class="nav-link" href="{{route('clients.index')}}">
          <i class="fa fa-fw fa-area-chart"></i>
          <span class="nav-link-text">All Clients</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
        <a class="nav-link" href="{{route('types.index')}}">
          <i class="fa fa-fw fa-table"></i>
          <span class="nav-link-text">All Loan Types</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
        <a class="nav-link" href="{{route('payments.create')}}">
          <i class="fa fa-fw fa-table"></i>
          <span class="nav-link-text">Payment</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
        <a class="nav-link" href="{{route('loans.create')}}">
          <i class="fa fa-fw fa-table"></i>
          <span class="nav-link-text">Issue Loan</span>
        </a>
      </li>
      {{--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">--}}
        {{--<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">--}}
          {{--<i class="fa fa-fw fa-wrench"></i>--}}
          {{--<span class="nav-link-text">Components</span>--}}
        {{--</a>--}}
        {{--<ul class="sidenav-second-level collapse" id="collapseComponents">--}}
          {{--<li>--}}
            {{--<a href="navbar.html">Navbar</a>--}}
          {{--</li>--}}
          {{--<li>--}}
            {{--<a href="cards.html">Cards</a>--}}
          {{--</li>--}}
        {{--</ul>--}}
      {{--</li>--}}
      {{--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">--}}
        {{--<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">--}}
          {{--<i class="fa fa-fw fa-file"></i>--}}
          {{--<span class="nav-link-text">Example Pages</span>--}}
        {{--</a>--}}
        {{--<ul class="sidenav-second-level collapse" id="collapseExamplePages">--}}
          {{--<li>--}}
            {{--<a href="login.html">Login Page</a>--}}
          {{--</li>--}}
          {{--<li>--}}
            {{--<a href="register.html">Registration Page</a>--}}
          {{--</li>--}}
          {{--<li>--}}
            {{--<a href="forgot-password.html">Forgot Password Page</a>--}}
          {{--</li>--}}
          {{--<li>--}}
            {{--<a href="blank.html">Blank Page</a>--}}
          {{--</li>--}}
        {{--</ul>--}}
      {{--</li>--}}
      {{--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">--}}
        {{--<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">--}}
          {{--<i class="fa fa-fw fa-sitemap"></i>--}}
          {{--<span class="nav-link-text">Menu Levels</span>--}}
        {{--</a>--}}
        {{--<ul class="sidenav-second-level collapse" id="collapseMulti">--}}
          {{--<li>--}}
            {{--<a href="#">Second Level Item</a>--}}
          {{--</li>--}}
          {{--<li>--}}
            {{--<a href="#">Second Level Item</a>--}}
          {{--</li>--}}
          {{--<li>--}}
            {{--<a href="#">Second Level Item</a>--}}
          {{--</li>--}}
          {{--<li>--}}
            {{--<a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>--}}
            {{--<ul class="sidenav-third-level collapse" id="collapseMulti2">--}}
              {{--<li>--}}
                {{--<a href="#">Third Level Item</a>--}}
              {{--</li>--}}
              {{--<li>--}}
                {{--<a href="#">Third Level Item</a>--}}
              {{--</li>--}}
              {{--<li>--}}
                {{--<a href="#">Third Level Item</a>--}}
              {{--</li>--}}
            {{--</ul>--}}
          {{--</li>--}}
        {{--</ul>--}}
      {{--</li>--}}
      {{--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">--}}
        {{--<a class="nav-link" href="#">--}}
          {{--<i class="fa fa-fw fa-link"></i>--}}
          {{--<span class="nav-link-text">Link</span>--}}
        {{--</a>--}}
      {{--</li>--}}
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-fw fa-sign-out"></i>Logout</a>
      </li>
    </ul>
  </div>
</nav>
<div class="content-wrapper">
  <div class="container-fluid">
    @yield('content')
  </div>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->
  <footer class="sticky-footer">
    <div class="container">
      <div class="text-center">
        <small>Copyright © Ashishakya under supervision of Subham Dhakal  & Guided by Akita Nakarmi~ 2018</small>
      </div>
    </div>
  </footer>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  <!-- Custom scripts for this page-->
  <script src="js/sb-admin-datatables.min.js"></script>
  <script src="js/sb-admin-charts.min.js"></script>
</div>
</body>

</html>
