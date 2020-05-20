<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador Mercapronto </title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'sources/vendor/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url().'sources/vendor/metisMenu/metisMenu.min.css'?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url().'sources/dist/css/sb-admin-2.css'?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url().'sources/vendor/morrisjs/morris.css'?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url().'sources/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet'?>" type="text/css">

    <!-- DataTables CSS 
    <link href="<?php echo base_url().'sources/vendor/datatables-plugins/dataTables.bootstrap.css'?>" rel="stylesheet">
    -->

     <!-- DataTables CSS NEW-->
    <link href="<?php echo base_url().'sources/vendor/datatables/datatables.min.css'?>" rel="stylesheet" type="text/css">
     <!-- DataTables CSS NEW End -->

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url().'sources/vendor/datatables-responsive/dataTables.responsive.css'?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('secondStep');?>">Administrador Mercapronto</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo site_url('secondStep');?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('secondStep/products');?>"><i class="fa fa-pencil-square-o fa-fw"></i> Productos</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('secondStep/sales');?>"><i class="fa  fa-credit-card fa-fw"></i> Ventas</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('secondStep/contacts');?>"><i class="fa fa-users fa-fw"></i> Clientes</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('secondStep/surveys');?>"><i class="fa fa-pencil-square-o fa-fw"></i> Encuestas</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('secondStep/inventory');?>"><i class="fa fa-archive fa-fw"></i> Inventario</a>
                        </li>
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

            <!-- DataTables JavaScript NEW/ Includes jQuery -->
            <script src="<?php echo base_url().'sources/vendor/datatables/datatables.min.js'?>"></script>
            <script>var base_url = '<?php echo base_url() ?>';</script>
            <!-- DataTables JavaScript NEW-->

            <!-- jQuery 
            <script src="<?php echo base_url().'sources/vendor/jquery/jquery.min.js'?>"></script>
            -->

            <!-- Bootstrap Core JavaScript -->
            <script src="<?php echo base_url().'sources/vendor/bootstrap/js/bootstrap.min.js'?>"></script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="<?php echo base_url().'sources/vendor/metisMenu/metisMenu.min.js'?>"></script>

            <!-- Custom Theme JavaScript -->
            <script src="<?php echo base_url().'sources/dist/js/sb-admin-2.js'?>"></script>

            <!-- DataTables JavaScript OLD
            <script src="<?php echo base_url().'sources/vendor/datatables/js/jquery.dataTables.min.js'?>"></script>
            <script src="<?php echo base_url().'sources/vendor/datatables-plugins/dataTables.bootstrap.min.js'?>"></script>
            <script src="<?php echo base_url().'sources/vendor/datatables-responsive/dataTables.responsive.js'?>"></script>
            -->

            

     <div id="page-wrapper">
            <?=$view?>
    </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

</html>

<script>
$(document).ready(function(){
  
  $("#newGener").on("click", function(e) {
    var n = $( "#numberdoc" ).val();
      if(n==''){
        alert("No data input");
         e.preventDefault();
      }

      var yesTerms = $( "#termcond" ).prop('checked');
      if(yesTerms!=true){
        alert("Please Accept Terms and Conditions to proceed");
         e.preventDefault();
    
      }
      
    
  }); 

      
});
 </script>
