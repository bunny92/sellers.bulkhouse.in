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
                <a href="<?php echo base_url()?>bank/edit_bank_credentials" class="brand-logo center">Edit Your Bank Credentials</a>
                <ul class="left">
                    <li><a href="<?php echo base_url() ?>dashboard" id="left_logo"><i class="mdi mdi-arrow-left"></i></a></li>

                </ul>
                <ul class="right">
                     <!--<li><a href="#!">Help</a></li>-->
                </ul>
            </nav>
        </div>
        <!-- End of  Nav bar -->
        <main>
            <br/>
            <div class="row">
                <div class="col l6 offset-l3 m10 offset-m1 s12">
                    <div class="row">
                         <span class="main-heading">
                                Edit Bank Credentials
                            </span><br/>
                            <span class="page-sub-title">
                                Please update the valid bank account credentials.
                            </span>
                            <br/>
                            <br/>

                            <br/>
                            <center>
                                <span style="color:red">
                                <?php
                                   if($this->session->flashdata("no_message") !== NULL) {
                                       echo $this->session->flashdata("no_message") == "no" ? "Cannot Save.. Please try again..!" : "";
                                   }
                                ?>
                                </span>
                            </center>
                    </div>
                    <div class="row">
                        <div class="card-panel">
                            <form method="post" action="<?php echo base_url() ?>bank/update_bank_credentials" onsubmit="return validate_bank_credentials()">
                                <table style="width:100%; font-size: .9em; color: grey; font-weight: normal">


                                    <tr>
                                        <td>Bank Account Name</td>
                                        <td><input type="text" id="account_name" name="account_name" value="<?= $bank_profile[0]->account_name?>"  /><span style="font-size: .8em; color: red" id="account_name_error"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Bank Account Number</td>
                                        <td><input type="text" id="account_number" name="account_number" value="<?= $bank_profile[0]->account_number?>" /><span style="font-size:.8em; color:red" id="account_number_error" ></span></td>
                                    </tr>
                                    <tr>
                                        <td>Bank Name</td>
                                        <td><input type="text" id="bank_name" name="bank_name" value="<?= $bank_profile[0]->bank_name?>"/><span style="font-size:.8em; color:red" id="bank_name_error"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Branch Name</td>
                                        <td><input type="text" id="branch_name" name="branch_name" value="<?= $bank_profile[0]->branch_name?>" /><span style="font-size:.8em; color:red" id="branch_name_error"></span></td>
                                    </tr>
                                    <tr>
                                        <td>IFSC</td>
                                        <td><input type="text" id="ifsc" name="ifsc" value="<?= $bank_profile[0]->ifsc?>"/><span style="font-size:.8em; color:red" id="ifsc_error"></span></td>
                                    </tr>


                                </table>
                                <div class="row">
                                    <div class="pull-right">
                                        <button class="btn waves-effect waves-light red" type="submit" style="font-size:.8em; text-transform: capitalize">Click to Update Credentials</button>
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
        <script type="text/javascript" src="<?php echo base_url();?>js/bank.js"></script>
    </body>
</html>