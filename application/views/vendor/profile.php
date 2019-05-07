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
                <a href="<?php echo base_url()?>profile" class="brand-logo center">Your Profile</a>
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
                <div class="col m10 offset-m1">
                    <div class="row">
                        <div class="col m12 l5">
                            <span class="main-heading">
                                Your Profile
                            </span><br/>
                            <span class="page-sub-title">
                                <br/>
These credentials refer to the person who is representing the company/office.
                            </span>
                        </div>
                        <div class="col s12 m12 l7">
                            <span class="indigo-text text-darken-4" style="font-size:1rem">
                                    <?php 
                                        if($this->session->flashdata("message") !== NULL) {
                                            $message = $this->session->flashdata("message");
                                         
                                            if($message === "yes") {
                                                echo "Profile Updated Successfully..!";
                                            } else {
                                                echo "Profile Not Updated.. Please try again..!";
                                            }
                                        }
                                    ?>
                                </span>
                            <?php $value = $profile[0];?>
                            <div class="card-panel" style="color:grey; font-size: .9em; font-weight: normal">
                               
                                 
                                <table style="width:100%" colspan="2">
                                    <tbody>
                                        <tr>
                                            <td style="width:50%">Company Name</td>
                                            <td style="width:50%"><?php echo $value->company ?></td>
                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td><?php echo $value->first_name ." ". $value->last_name?></td>
                                        </tr>
                                        <tr>
                                            <td>Firm Type</td>
                                            <td><?php echo $value->firm_name?></td>
                                        </tr>
                                        <tr>
                                            <td>Registered Date</td>
                                            <td><?php echo date("d-M-Y", strtotime($value->regdate)) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pincode</td>
                                            <td><?php echo $value->pincode ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Agent Id</td>
                                            <td><?php echo $value->agent_id ?></td>
                                        </tr>
                                    <tbody>
                                </table>
                               
<!--                                <div class="row right-align">
                                    <a href="<?php echo base_url() ?>profile/update_profile_view" class="waves-effect waves-light red btn" style="text-transform: capitalize; letter-spacing: 0px; font-size: 0.8em">
                                        Update Profile
                                    </a>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
             <div class="row">
                <div class="col m10 offset-m1">
                    <div class="row">
                        <div class="col m12 s12 l5">
                            <span class="main-heading">
                                Contact Information
                            </span><br/>
                            <span class="page-sub-title">
                                <br/>
                                This is the contact information which was provided during the time of registration in order to communicate anything related to your business transactions. 
                            </span>
                        </div>
                        <div class="col m12 s12 l7">
                             <span class="indigo-text text-darken-4" style="font-size:1rem">
                                    <?php 
                                        if($this->session->flashdata("primary_resp") !== NULL) {
                                            $message = $this->session->flashdata("primary_resp");
                                         
                                            if($message === "yes") {
                                                echo "Primary Credentials Updated Successfully..!";
                                            } else {
                                                echo "Primary Credentials Not Updated.. Please try again..!";
                                            }
                                        }
                                    ?>
                                </span>
                            <?php $details = $primary[0]?>
                            
                            <div class="card-panel" style="color:grey; font-size: .9em; font-weight: normal">
                                <table style="width:100%" colspan="2">
                                    <tbody>
                                        <tr>
                                            <td style="width:50%">Email Address</td>
                                            <td style="width:50%"><?php echo $details->email ?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td><?php echo $details->phone?></td>
                                        </tr>
                                        <tr>
                                            <td>Your Market Trade</td>
                                            <td><?php echo $details->market?></td>
                                        </tr>
                                       
                                    <tbody>
                                </table>
                                
<!--                                <div class="row right-align">
                                    <a class="waves-effect waves-light red btn"  href="<?php echo base_url() ?>profile/update_primary_view" style="text-transform: capitalize; letter-spacing: 0px; font-size: 0.8em">
                                        Update Credentials
                                    </a>
                                </div>-->
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

