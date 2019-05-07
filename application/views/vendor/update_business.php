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
                <a href="<?php echo base_url()?>businessprofile/update_business_profile" class="brand-logo center">Update Your Business Profile</a>
                <ul class="left">
                    <li><a href="<?php echo base_url() ?>businessprofile" id="left_logo"><i class="mdi mdi-arrow-left"></i></a></li>

                </ul>
                <ul class="right">
                   <!-- <li><a href="#!">Help</a></li> -->
                </ul>
            </nav>
        </div>
        <!-- End of  Nav bar -->
        <main>
            <br/>
            <form method="post" action="<?php echo base_url()?>businessprofile/edit_business_profile" onsubmit="return validateBusinessProfile()">
                <div class="row">
                <span class="main-heading">
                    <div class="container">
                        <?php 
                        if($this->session->flashdata("message") !== NULL) {
                            echo $this->session->flashdata("message");
                        }
                        ?>
                    </div>
                </span>
                </div>
            <div class="row">
                <div class="col m8 offset-m2">
                    <div class="row">
                    <?php 
                        $details = $profile[0];
                    ?>
                             <span class="main-heading">
                               Update Who You Are
                            </span><br/>
                            <span class="page-sub-title">
                                <br/>
                                This page helps us to know what kind of business you are dealing with and your contact information. Here the contact information has 2 kinds. The first one is Business Address and the other one is Contact Address
                            </span>
                        
                    
                            <div class="card-panel">
                                <table style="width:100%; color: #757575; font-size: .9em; font-weight: normal">
                                    <tr>
                                        <td>You are</td>
                                        <td><select class="browser-default" id="register_category" name="registration_category">
                                                <option value="no">---Select Your Category--</option>
                                                <option value="Stockist/Super Stockist" <?php echo $details->registration_category === "Stockist/Super Stockist" ? "selected" : ""?>>Stockist/Super Stockist</option>
                                                <option value="MSME/SSI" <?php echo $details->registration_category === "MSME/SSI" ? "selected" : ""?>>MSME/SSI</option>
                                                <option value="Exporter" <?php echo $details->registration_category === "Exporter" ? "selected" : ""?>>Exporter</option>
                                                <option value="Original Manufacturer" <?php echo $details->registration_category === "Original Manufacturer" ? "selected" : ""?>>Original Manufacturer</option>
                                                <option value="Distributor/Agency" <?php echo $details->registration_category === "Distributor/Agency" ? "selected" : ""?>>Distributor/Agency</option>
                                                <option value="Others" <?php echo $details->registration_category === "Others" ? "selected" : ""?>>Others</option>
                                            </select><span id="reg_cat_error"  style="color:red; font-size: .8em"></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                   
                    <br/>
                    <br/>
                    <div class="row">
                      
                             <span class="main-heading">
                                Update Business Contact Information
                            </span><br/>
                            <span class="page-sub-title">
                                <br/>
                                This is about your business location address. Please fill valid details as this is very important in order processing
                            </span>
                        
                            <div class="card-panel">
                                <table style="width:100%; color: #757575; font-size: .9em; font-weight: normal">
                                    <tr>
                                        <td>Office Landline</td>
                                        <td><input type="text" id="cont_off_land" name="cont_off_land" value="<?=$details->contact_office_landline?>"/><span id="cont_off_land_error"  style="color:red; font-size: .8em"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><input type="text" id="cont_address" name="cont_address" value="<?= $details->contact_address?>"/><span id="cont_address_error"  style="color:red; font-size: .8em"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Area</td>
                                        <td><input type="text" id="cont_area" name="cont_area" value="<?= $details->contact_area?>"/><span id="cont_area_error"  style="color:red; font-size: .8em"></span></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td><input type="text" id="cont_city" name="cont_city" value="<?= $details->contact_city?>"/><span id="cont_city_error"  style="color:red; font-size: .8em"></span></td>
                                    </tr>
                                    <tr>
                                        <td>State</td>
                                        <td>
                                            <select id="cont_state" name="cont_state" class="browser-default state" >
                                                
                                            </select>  <span id="cont_state_error"  style="color:red; font-size: .8em"></span>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>District</td>
                                        <td><select id="cont_district" name="cont_district" class="browser-default secondlist"><option value="no">Select District</option></select>
                                            <span id="cont_district_error" style="color:red; font-size: .8em"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pincode</td>
                                        <td>
                                            <input type="text" id="cont_pincode"  name="cont_pincode"  value="<?= $details->contact_pincode?>"/> <span id="cont_pincode_error" style="color:red;font-size: .8em"></span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <br/>
                    <br/>
                         <div class="row">
                      
                             <span class="main-heading">
                                Update Dispatch Contact Information
                            </span><br/>
                            <span class="page-sub-title">
                                <br/>
                                This is about your business location address. Please fill valid details as this is very important in order processing
                            </span>
                        
                            <div class="card-panel">
                                <p>
                                    <input type="checkbox" id="test5" onclick="pasteDetails()" />
      <label for="test5">Same as above</label>
    </p>
                                <table style="width:100%; color: #757575; font-size: .9em; font-weight: normal">
                                    <tr>
                                        <td>Office Landline</td>
                                        <td><input type="text" id="disp_off_land" name="disp_off_land"  value="<?= $details->disp_office_landline?>"/><span id="disp_off_land_error"  style="color:red; font-size: .8em"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><input type="text" id="disp_address" name="disp_address"  value="<?= $details->disp_office_address?>"/><span id="disp_address_error"  style="color:red; font-size: .8em"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Area</td>
                                        <td><input type="text" id="disp_area" name="disp_area" value="<?= $details->disp_area?>"/><span id="disp_area_error"  style="color:red; font-size: .8em"></span></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td><input type="text" id="disp_city" name="disp_city" value="<?= $details->disp_city?>"/><span id="disp_city_error"  style="color:red; font-size: .8em"></span></td>
                                    </tr>
                                    <tr>
                                        <td>State</td>
                                        <td>
                                            <select id="disp_state" name="disp_state" class="browser-default states" >
                                                
                                            </select>  <span id="disp_state_error"  style="color:red; font-size: .8em"></span>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>District</td>
                                        <td><select id="disp_district" name="disp_district" class="browser-default secondlists secondlist"><option value="no">Select District</option></select>
                                            <span id="disp_district_error" style="color:red; font-size: .8em"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pincode</td>
                                        <td>
                                            <input type="text" id="disp_pincode"  name="disp_pincode"  value="<?= $details->disp_pincode?>"/><span id="disp_pincode_error" style="color:red;font-size: .8em"></span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    
                    <div class="row">
                        <div class="right-align">
                            <button class="btn waves-effect waves-light red" type="submit" style="text-transform: capitalize; letter-spacing: 0px; font-size: 0.8em">Click To Update Details</button>
                        </div>
                    </div>
               
                </div>
                
                </div>
            </div>
            <br/>
            </form>
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
        <script type="text/javascript" src="<?php echo base_url(); ?>js/states.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/newstates.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/businessprofile.js"></script>
    </body>
</html>

