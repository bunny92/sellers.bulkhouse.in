<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bulkhouse Seller Portal</title>
    <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link href="<?= base_url("css/custom.css")?>" rel="stylesheet"/>
    <link rel="stylesheet" href="<?= base_url("css/font-awesome.min.css")?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css"/>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>                          
                    <a class="navbar-brand" href="#">
                        <img src="<?php echo base_url() ?>images/logo.png" class="img-responsive  hidden-xs" style="width:70%;line-height: 30px; height: 30px; margin-top: -7px;">
                        <img src="<?php echo base_url() ?>images/logo.png" class="img-responsive hidden-sm hidden-md hidden-lg" style="width:85%; margin-top: -10px;">
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?= base_url("dashboard")?>"><span class="fa fa-users"></span>&nbsp;&nbsp;Vendors</a></li>
                        <li class="active"><a href="<?= base_url("agents")?>"><span class="fa fa-user"></span>&nbsp;&nbsp;Agents</a></li>
<!--                        <li><a href="<?= base_url("statistics")?>"><span class="fa fa-line-chart"></span>&nbsp;&nbsp;Statistics</a></li>-->
                        <li><a href="<?= base_url("quicklook")?>"><span class="fa fa-desktop"></span>&nbsp;&nbsp;Quick Look</a></li>
                        <li><a href="<?= base_url("completelook") ?>"><span class="fa fa-desktop"></span>&nbsp;&nbsp;Complete Look</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-cogs"></span>&nbsp;&nbsp; Profile<span class="caret"></span></a>
          <ul class="dropdown-menu">
<!--            <li><a href="#">Change Password</a></li>
            <li role="separator" class="divider"></li>-->
           <li><a href="<?= base_url("admin/logout")?>">Logout</a></li>
          </ul>
        </li>
                    </ul> 
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
      <main>
          <br/>
          <div class="row">
              <div class="col-sm-4 col-md-3 col-lg-3">
                  <div class="li-content">
                      <span class="menu-title">
                          Allocations and Registrations
                      </span>
                      <br/>
                      <ul class="side-menu">
                          <li><a href="<?= base_url('agents')?>" id="agent_registrations"><span class="fa fa-arrow-circle-o-right"></span>&nbsp;&nbsp;Register Agents</a></li>
                          <li><a href="<?= base_url('agents/assign_agents')?>" id="todays_registrations"><span class="fa fa-arrow-circle-o-right"></span>&nbsp;&nbsp;Assign Agents</a></li>
                          <li><a href="<?= base_url('agents/modify_assigns')?>" id="overall_leads"><span class="fa fa-arrow-circle-o-right"></span>&nbsp;&nbsp;Edit Assigned Agents</a></li>
                          <li><a href="<?= base_url('agents/delete_assigns')?>" id="overall_registrations"><span class="fa fa-arrow-circle-o-right"></span>&nbsp;&nbsp; Delete Assigned Agents</a></li>
                      </ul>
                      <br/>

                  </div>
              </div>
<div class="col-sm-8 col-md-9 cl-lg-9">