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
                <a href="<?php echo base_url()?>dashboard/change_password" class="brand-logo center">Change Password</a>
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
                <div class="col m6 offset-m3">
                    <div class="row">
                        <span class="page-sub-title">Choose a strong Password. Make sure that password length should be at least 7 characters. If you cannot change the password then please email us at <i>vsupport@bulkhouse.in </i> </span>
                    </div>
                    <div class="row">
                        <div class="card-panel">
                            <form method="post" action="<?php echo base_url() ?>dashboard/update_password" onsubmit="return change_password()">

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="current_password" name="current_password" type="password" required="true" class="validate"/>
                                        <label for="current_password">Current Password:</label>
                                        <span style="color:red; font-size: .7em" id="current_error"></span>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="new_password" name="new_password" type="password" required="true" class="validate"/>
                                        <label for="new_password">New Password:</label>
                                        <span style="color:red; font-size: .7em" id="new_error"></span>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col s12">
                                        <button type="submit" class="waves-effect waves-light btn red" style="text-transform: capitalize; letter-spacing: 0px; font-size: .8em;">Change Password</button>
                                        &nbsp;&nbsp;<br/><br/>
                                        <?php
                                        if (isset($response)) {
                                            if ($response === "yes") {
                                                ?>
                                        <span class="response-success">Password Changed Successfully..!</span>
                                             <?php
                                            } else if ($repsonse === "no") {
                                                ?>
                                                    <span class="response-error">We are unable to change your password..!</span>

                                                    <?php
                                            }
                                        }
                                        ?>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <br/>
        <br/>
        <br/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/materialize.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/custom.js"></script>
        <script>
                                function change_password() {
                                    var flag = true;
                                    var current = $("#current_password").val();
                                    var new_password = $("#new_password").val();
                                    $("#current_error").html("");
                                    $("#new_error").html("");
                                    if (current.trim().length < 7) {
                                        $("#current_error").html("Current Password length should be at least 7 characters");
                                        flag = false;
                                    } else if (new_password.trim().length < 7) {
                                        $("#new_error").html("New Password length should be at least 7 characters");
                                        flag = false;
                                    }

                                    return flag;
                                }
        </script>
    </body>
</html>