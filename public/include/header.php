<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Off Canvas Template for Bootstrap</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/offcanvas.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
        <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Driver Tasks</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="dashboard">Dashboard</a>
                        </li>
                        <li>
                            <a href="addTask">New Task</a>
                        </li>
                        <li>
                            <a href="addDriver">New Driver</a>
                        </li>
                        <?php

                        if(Session::has('admin_id')){
                            if(Session::get('admin_type')=='SUPER'){
                                ?>
                                <li>
                            <a href="adminSection">Manage Users</a>
                        </li>
                        <?
                            }

                            ?>
                             <li>
                            <a href="logout">Log out</a>
                        </li>
                        <?php
                        
                        }

                        ?>
                    </ul>

                </div>
                <!-- /.nav-collapse -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.navbar -->
