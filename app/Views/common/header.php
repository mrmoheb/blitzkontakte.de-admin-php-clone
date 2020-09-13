<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>BlitzKontakte.de| Admin Panel</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url('plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('dist/css/adminlte.min.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('plugins/ekko-lightbox/ekko-lightbox.css')?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url('users')?>" class="nav-link  <?=$file === "users"?" active ":""; ?>">Users</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url('ads')?>" class="nav-link  <?=$file === "ads"?" active ":""; ?>">Ads</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url('logout')?>" class="nav-link">Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->