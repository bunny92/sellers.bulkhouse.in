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
                <a href="<?php echo base_url() ?>bank" class="brand-logo center">Your Bank Credentials</a>
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
                <div class="col l8 offset-l2 m10 offset-m1">
                    <div class="row">
                        <div class="col l6 m12 s12">
                            <span class="main-heading">
                                Your Bank Credentials
                            </span><br/>
                            <span class="page-sub-title">
                                These are the bank credentials added by you. To these credentials we will process business transactions
                            </span>
                            <br/>
                            <br/>
                            <center>
                                <img src="<?php echo base_url() ?>images/bank.png" class="responsive-img" style="width:50%"/>
                            </center>
                            <br/>
                            <span class="page-sub-title">
                                Amount Transactions will be generated based on the credentials given
                            </span>

                            <br/>
                        </div>

                        <div class="col l6 m12 s12">

                            <?php
                            if ($bank_profile[0]->bank_status === "Deposit") {
                                ?>
                                <div class="card-panel">
                                    <div class="row">
                                        <?php
                                        $count = (3 - $bank_profile[0]->click_count);
                                        if ($count > 0) {
                                            ?>
                                            <div id="bank_display">
                                                <form method="post" action="<?php echo base_url(); ?>bank/check_details" onsubmit="return validate_form()">
                                                    <span  style="color:red; font-size: .8em;">Please specify the amount deposited in <span style="font-weight:bold" id="amount_data"><?php echo (3 - $bank_profile[0]->click_count) ?></span> chances</span><br/>
                                                    <table style="width:100%">
                                                        <tr>
                                                            <td>Please enter the amount deposited in your account mentioned</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" id="amount" name="amount" placeholder="Amount" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><button  class="btn waves-effect waves-light red"  style="font-size:.8em; text-transform: capitalize" type="submit" >Submit Amount</button></td>
                                                        </tr>
                                                    </table>
                                                    <br/>
                                                </form>
                                            </div>
                                            <span id="message_details"  style="color:red; font-size: .8em;"><?php
                                                if ($this->session->flashdata("message") !== NULL) {
                                                    echo $this->session->flashdata("message");
                                                }
                                                ?></span>

                                            <?php
                                        } else {
                                            ?>
                                            <span id="message_details"  style="color:red; font-size: .8em;">Please contact Administrator for your bank account verification</span>
                                            <?php
                                        }
                                        ?>

                                    </div>

                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if ($bank_profile[0]->bank_status === "Verification In Process") {
                                ?>

                                <div class="row">
                                    <div class="pull-right">
                                        <a href="<?php echo base_url() ?>bank/edit_bank_credentials" class="btn waves-effect waves-light red"  style="font-size:.8em; text-transform: capitalize">Click to Edit Credentials</a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <br/>
                            <div class="card-panel">
                                <span class="indigo-text text-darken-4">
                                    <?php
                                    if ($this->session->flashdata("message") !== NULL) {
                                        echo $this->session->flashdata("message");
                                    }
                                    ?>
                                </span>
                                <br/>

                                <form method="post" >
                                    <table style="width:100%; font-size: .9em; color: grey; font-weight: normal">
                                        <tr>
                                            <td>Bank Account Name</td>
                                            <td><?= $bank_profile[0]->account_name ?></td>
                                        </tr>
                                        <tr>
                                            <td>Bank Account Number</td>
                                            <td><?= $bank_profile[0]->account_number ?></td>
                                        </tr>
                                        <tr>
                                            <td>Bank Name</td>
                                            <td><?= $bank_profile[0]->bank_name ?></td>
                                        </tr>
                                        <tr>
                                            <td>Branch Name</td>
                                            <td><?= $bank_profile[0]->branch_name ?></td>
                                        </tr>
                                        <tr>
                                            <td>IFSC</td>
                                            <td><?= $bank_profile[0]->ifsc ?></td>
                                        </tr>
                                        <?php
                                        if ($bank_profile[0]->bank_status !== "Deposit") {
                                            ?>

                                            <tr>
                                                <td>Verification Status</td>
                                                <td><?= $bank_profile[0]->bank_status ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>


                                    </table>

<br/>
                                </form>
                            </div>
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
        <script type="text/javascript" src="<?php echo base_url(); ?>js/bank.js"></script>
        <script>
                                                    function validate_form() {
                                                        var amount = $("#amount").val();
                                                        var flag = true;
                                                        $("#message_details").html("");
                                                        if (isNaN(amount)) {
                                                            flag = false;
                                                            $("#message_details").html("Please enter valid number");
                                                        } else if (amount.trim().length === 0) {
                                                            flag = false;
                                                            $("#message_details").html("Please enter valid number");
                                                        }

                                                        return flag;
                                                    }
        </script>
    </body>
</html>
