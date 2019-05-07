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
                <a href="<?php echo base_url() ?>profile/update_primary_view" class="brand-logo center">Update Primary Credentials</a>
                <ul class="left">
                    <li><a href="<?php echo base_url() ?>profile" id="left_logo"><i class="mdi mdi-arrow-left"></i></a></li>

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
                <div class="col m8 offset-m2">
                    <div class="row">

                        <span class="main-heading">
                            Update Your Primary Credentials
                        </span><br/>
                        <span class="page-sub-title">
                            <br/>
                            You can change your profile credentials entered during the time of registration. The Details which are entered here will be taken into account and will  be displayed on the home page of our e-commerce website. Your Email-Id cannot be modified
                        </span>
                        <form method="post" action="<?php echo base_url();?>profile/update_primary" onsubmit="return updatePrimary()">
                            <?php $value = $profile[0]; ?>
                            <div class="card-panel" style="color:grey; font-size: .9em; font-weight: normal">
                                <table style="width:100%" colspan="2">
                                    <tbody>
                                        <tr>
                                            <td style="width:50%">Phone Number</td>
                                            <td style="width:50%"><input style="font-size:.9em; color: #1a237e" type="text" id="phone" name="phone" value="<?php echo $value->phone ?>" id="phone"/><span style="color:red; font-size: .8em" id="phone_error"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Market Trade</td>
                                            <td>
                                                <select id="market" name="market" class="browser-default">
                                                    <option value="no">--Select Market--</option>
                                                    <option value="Export" <?php echo $value->market === "Export" ? "selected" : "" ?>>Export</option>
                                                    <option value="Domestic" <?php echo $value->market === "Domestic" ? "selected" : "" ?>>Domestic</option>
                                                    <option value="Both" <?php echo $value->market === "Both" ? "selected" : "" ?>>Both</option>
                                                </select>
                                                <span style="color:red; font-size: .8em" id="market_error"></span>
                                            </td>
                                        </tr>
                                        
                                    <tbody>
                                </table>

                                <div class="row right-align">
                                    <button class="waves-effect waves-light red btn" type="submit" style="text-transform: capitalize; letter-spacing: 0px; font-size: 0.8em">
                                        Update Credentials
                                    </button>
                                </div>
                            </div>
                        </form>
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
        <script>
                                function updatePrimary() {
                                    var phone = $("#phone").val();
                                    var market = $("#market").val();
                                    var phone_regex = /^\d{10}$/;
                                    var flag = true;
                                    $("#market_error").html("");
                                    $("#phone_error").html("");
                                    if(!phone_regex.test(phone)) {
                                        flag = false;
                                        $("#phone_error").html("Phone number should have 10 digits");
                                    }
                                    
                                    if(market.trim() === "no") {
                                        flag = false;
                                        $("#market_error").html("Phone Chooser your market");
                                    }
                                    
                                    return flag;
                                    
                                }
        </script>
    </body>
</html>

