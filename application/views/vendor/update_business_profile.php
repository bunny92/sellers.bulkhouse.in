<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/materialdesignicons.min.css">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans" />
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!--Let browser know website is optimized for mobile-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/custom.css">
    </head>

    <body>
        <div class="headbar">
            <img src="<?php echo base_url(); ?>images/logo.png" class="left-align">
            <span class="settings"><a class='dropdown-button' href='#' data-activates='dropdown1'><i class="topmenu mdi mdi-view-module"></i></a></span>
            <span class="content-right" style="text-transform: lowercase">
                <?php echo $this->session->userdata("first_name") ?>&nbsp; &nbsp;
            </span>
        </div>
        <ul id='dropdown1' class='dropdown-content'>
            <li><a href="<?php echo base_url() ?>dashboard/change_password">Change Password</a></li>
            <li><a href="<?php echo base_url() ?>dashboard/logout">Logout</a></li>
        </ul>
        <!-- Navbar -->
        <div  id="nav_bar">

            <nav class="red" >
                <a href="<?php echo base_url()?>businessprofile" class="brand-logo center">Your Business Profile</a>
                <ul class="left">
                    <li><a href="<?php echo base_url() ?>dashboard" id="left_logo"><i class="mdi mdi-arrow-left"></i></a></li>

                </ul>
                <ul class="right">
                    <!-- <li><a href="#!">Help</a></li> -->
                </ul>
            </nav>
        </div>
        <!-- End of  Nav bar -->
        <main>
           <br/>
           <div class="row">
               <div class="container">
                   <center>
               <span class="main-heading indigo-text text-darken-4">
                    <?php
                        if($this->session->flashdata("message") !== NULL) {
                            echo $this->session->flashdata("message");
                        }
                    ?>
               </span>
                   </center>
               </div>
           </div>

           <div class="row">
               <div class="col m9 offset-m1">
                   <div class="row">
                       <div  class="col l5 m12">
                       <span class="main-heading">
                           Your Business Profile
                       </span>
                           <br/>
                       <span class="main-sub-title">
                           Thanks for letting us know your business profile information and dispatch address
                       </span>
                           <br/>
                           <br/>
                           <center>
                               <img src="<?php echo base_url() ?>images/location.png" class="responsive-img">
                           </center>
                          <span class="main-sub-title">
                           Orders will be processed to the registered dispatch address
                       </span>
                       </div>
                       <div class="col l7 m12 s12">
                         <div class="row">
                             <div class="right-align">
                                 <a href="<?php echo base_url() ?>businessprofile/update_business_profile" class="btn waves-effect waves-light red" style="text-transform: capitalize; letter-spacing: 0px; font-size: 0.8em">Edit Business Profile</a>
                             </div>
                         </div>
                           <?php
                            $details = $profile[0];
                           ?>
                           <div class="card-panel" style="width:100%;color:grey; font-size: .9em; font-weight: normal">
                               <table style="width:100%">
                                   <tr>
                                       <td style="width:50%">You are</td>
                                       <td style="width:50%"><?= $details->registration_category?></td>
                                   </tr>
                               </table>
                               <br/>
                               <b style="color:black">Business Contact Address</b>
                               <table style="width:100%">
                                    <tr>
                                       <td>Office Landline</td>
                                       <td><?= $details->contact_office_landline?></td>
                                   </tr>
                                   <tr>
                                       <td>Address</td>
                                       <td><?= $details->contact_address?></td>
                                   </tr>
                                   <tr>
                                       <td>Area</td>
                                       <td><?= $details->contact_area?></td>
                                   </tr>
                                   <tr>
                                       <td>City</td>
                                       <td><?= $details->contact_city?></td>
                                   </tr>
                                   <tr>
                                       <td>State</td>
                                       <td><?= $details->contact_state?></td>
                                   </tr>
                                   <tr>
                                       <td>District</td>
                                       <td><?= $details->contact_district?></td>
                                   </tr>
                                   <tr>
                                       <td>Pincode</td>
                                       <td><?= $details->contact_pincode?></td>
                                   </tr>

                               </table>
                               <br/>
                               <b style="color:black">Dispatch Location Address</b>
                               <table style="width:100%">
                                    <tr>
                                       <td>Office Landline</td>
                                       <td><?= $details->disp_office_landline?></td>
                                   </tr>
                                   <tr>
                                       <td>Address</td>
                                       <td><?= $details->disp_office_address?></td>
                                   </tr>
                                   <tr>
                                       <td>Area</td>
                                       <td><?= $details->disp_area?></td>
                                   </tr>
                                   <tr>
                                       <td>City</td>
                                       <td><?= $details->disp_city?></td>
                                   </tr>
                                   <tr>
                                       <td>State</td>
                                       <td><?= $details->disp_state?></td>
                                   </tr>
                                   <tr>
                                       <td>District</td>
                                       <td><?= $details->disp_district?></td>
                                   </tr>
                                   <tr>
                                       <td>Pincode</td>
                                       <td><?= $details->disp_pincode?></td>
                                   </tr>

                               </table>
                           </div>

                       </div>
                   </div>
               </div>
           </div>

        </main>
        <br/>
        <br/>
        <br/>
        <!--[if lt IE 9]>
<script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
<![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/materialize.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/custom.js"></script>

    </body>
</html>