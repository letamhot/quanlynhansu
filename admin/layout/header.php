
<?php session_start(); 
$url = dirname(__FILE__);
?>
<?php 
	if(!isset($_SESSION['email']))
	{
		header("Location:login.php");
    exit;
	}
?>
<?php
    include ("../connection/connection.php");

    $email = $_SESSION['email'];
    $sql = "SELECT *  FROM nhanvien WHERE email = '".$email."' ";
    $result1 = mysqli_query($conn, $sql);
    // $value1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
    if(mysqli_num_rows($result1) > 0)
    {
      while($row = mysqli_fetch_assoc($result1))
      {
        $email=$row['email'];
        $id=$row['id'];
        $anh=$row['avatar'];
        $tenNV=$row['tenNV'];
        $role=$row['idRole'];
        $donvi=$row['donvi'];
        if ($role == 1)
        {
          $quyen='Toàn quyền';
        }
        else
        {
          $quyen='Nhân viên';
        }
      }
    }

  include("../connection/closedatabase.php");

	?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quản lý nhân sự | Quản trị hệ thống</title>
  <link rel="icon" href="images/favicon.ico" type="image/x-icon" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php $url ?>public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php $url ?>public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php $url ?>public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php $url ?>public/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php $url ?>public/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php $url ?>public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php $url ?>public/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php $url ?>public/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="<?php $url ?>public/vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?php $url ?>public/vendors/base/vendor.bundle.base.css">
	<link rel="stylesheet" href="<?php $url ?>public/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
	<!-- <link rel="stylesheet" href="<?php $url ?>public/css/style.css">
	<link rel="stylesheet" href="<?php $url ?>public/css/theme.css"> -->
	<link rel="stylesheet" href="<?php $url ?>public/css/responsive.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />\

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php $url ?>public/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>