<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url('adminlte/'); ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('adminlte/'); ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="<?=base_url('adminlte/'); ?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?=base_url('adminlte/'); ?>plugins/morris/morris.css"/>
  <link rel="stylesheet" href="<?=base_url('adminlte/'); ?>plugins/daterangepicker/daterangepicker.css"/>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-red fixed">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>Media</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SOCIAL MEDIA</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?=base_url('adminlte/'); ?>dist/img/avatar5.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?=base_url('adminlte/'); ?>dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar layout-top-nav ">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('adminlte/'); ?>dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="<?=site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> <span>DASHBOARD</span></a></li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-gears"></i> <span>Manage</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=site_url('group'); ?>">Add group</a></li>
            <li><a href="<?=site_url('pages'); ?>">Add page</a></li>
          </ul>
        </li>
        <?php $j=$this->transactions->getGroups();  ?>
        <li class="treeview">
          <a href="#"><i class="fa fa-book"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <?php
                  foreach($j as $val)
                    {
                      echo '<li><a href="'.site_url("reports/".$val->grp).'">'.$val->grp.'</a></li>';
                    }
             ?>
            
            
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <?php @$this->view('modules/'.@$view); ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Standard Digital
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="https://www.standardmedia.co.ke" target="_blank">Standard Group Ltd</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="<?=base_url('adminlte/'); ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url('adminlte/'); ?>bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('adminlte/'); ?>dist/js/app.min.js"></script>

<script src="<?=base_url('adminlte/'); ?>plugins/daterangepicker/daterangepicker.js"></script>

<script src="<?=base_url('adminlte/'); ?>plugins/daterangepicker/moment.min.js"></script>

<script src="<?=base_url('adminlte/'); ?>plugins/morris/morris.js"></script>
<script src="<?=base_url('adminlte/'); ?>plugins/morris/raphael.min.js"></script>


<?php
if(isset($records))
  {
    $num=$num2=$t=$t1=0;
    foreach($date as $y)
      {
        
        $d=$this->transactions->getstats3($this->uri->segment(2),$y->date);
      //var_dump($d);
        foreach($d as $x)
          {
             if($x->account_type=='facebook')
                {
                    $data[$num]['y']=$y->date;
                    $data[$num][$x->name.'fans']=$x->fans;             
                    $fans[$num2]=$x->name.'fans';
                    $labels[$num2]=$x->name;
                    $num2++;
                }
              else
                {

                    $data1[$t]['y']=$y->date;
                    $data1[$t][$x->name.'fans']=$x->fans;             
                    $fans1[$t1]=$x->name.'fans';
                    $labels1[$t1]=$x->name;
                    $t1++;

                }   
             
          }
          $t=$num+=1;
          ///echo $num;
      }
  }
  $labels=array_unique($labels);
  $labels=array_values($labels);
  $fans=array_unique($fans);
  $fans=array_values($fans);

  $labels1=array_unique($labels1);
  $labels1=array_values($labels1);
  $fans1=array_unique($fans1);
  $fans1=array_values($fans1);
  
?>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->

<script>

Morris.Line({
  element: 'facebookchart',
  data:<?=json_encode($data); ?>,
  xkey: 'y',
  ykeys: <?=json_encode($fans); ?>,
  labels: <?=json_encode($labels); ?>
});

Morris.Line({
  element: 'twitterchart',
  data:<?=json_encode($data1); ?>,
  xkey: 'y',
  ykeys: <?=json_encode($fans1); ?>,
  labels: <?=json_encode($labels1); ?>
});
</script>    

</body>
</html>
