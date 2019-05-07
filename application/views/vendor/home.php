<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="theme-color" content="#b22222"/>
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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/card.css">
        <style>
            body {
                font-family: 'Open Sans';
                background-color: white;
            }
            .content::-webkit-scrollbar {
                display: none;
            }
        </style>
        <script type="text/javascript">(function(d,n){var s,a,p;s=document.createElement("script");s.type="text/javascript";s.async=true;s.src=(document.location.protocol==="https:"?"https:":"http:")+"//cdn.nudgespot.com"+"/nudgespot.js";a=document.getElementsByTagName("script");p=a[a.length-1];p.parentNode.insertBefore(s,p.nextSibling);window.nudgespot=n;n.init=function(t){function f(n,m){var a=m.split('.');2==a.length&&(n=n[a[0]],m=a[1]);n[m]=function(){n.push([m].concat(Array.prototype.slice.call(arguments,0)))}}n._version=0.1;n._globals=[t];n.people=n.people||[];n.params=n.params||[];m="track register unregister identify set_config people.delete people.create people.update people.create_property people.tag people.remove_Tag".split(" ");for(var i=0;i<m.length;i++)f(n,m[i])}})(document,window.nudgespot||[]);nudgespot.init("a3b2a04cb8a634716c8f7a599784a8c8");</script>
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
                <ul class="left">
                    <li><a href="#!" id="left_logo">Bulkhouse Seller Account</a></li>
                </ul>
                <ul class="right">
                    <li><a href="<?php echo base_url() ?>profile">Profile</a></li>
<!-- <li><a href="#!">Help</a></li> -->
                </ul>
            </nav>
        </div>
        <!-- End of  Nav bar -->
        <main>
            <div class="row" style="background-color:#EEE">
                <div class="row" style="margin-bottom:0px; padding-bottom:0px;">
                    <br/>
                    <div class="col s12 m12 l6 grey-text text-darken-2" style="font-size:1.1em;padding:11px;">Take first step towards connecting your business globally by completing the profile details.
                    </div>
                    <br/>
                    <div class="col s12 m12 l5 offset-l1 grey-text text-darken-2 right-align" style="font-size:.8em;padding:10px;">Account Status : <?= $percentage ?>%
                    </div>
                </div>
                <div class="row right-align" style="margin-top:0px; padding-top:0px;">
                    <div class="progress grey col s6  offset-s6 m4 offset-m8 l2 offset-l10 right-align">
                        <div class="determinate amber" style="width: <?php echo $percentage ?>%"></div>
                    </div>

                </div>


                <div class="row">
                    <div class="col s12 m6 l3">
                        <div class="card-panel">
                            <div class="box">
                                <?php
                                $view = "";
                                if (isset($business)) {
                                    $view = "View";
                                    ?>
                                    <div class="ribbon2"><span>completed</span></div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="ribbon1"><span>pending</span></div>
                                    <?php
                                    $view = "Add";
                                }
                                ?>

                                <div class="row center-align grey-text text-darken-1" style="">
                                    Business Details
                                </div>
                                <div class="row center-align">
                                    <img src="<?= base_url() ?>images/002.jpg" class="responsive-img" style="width:70%"/>
                                </div>
                                <div class="row center-align">
                                    <span class="grey-text text-darken-2" style="font-size:.8em;"> Business and Dispatch Contact Information</span>
                                </div>

                                <hr/>

                                <div class="row center-align">
                                    <a href="<?php echo base_url() ?>businessprofile" style="font-size:.85em; text-transform: uppercase"><?= $view ?> Details</a>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card-panel">
                            <div class="box">
                                <?php
                                if (isset($info)) {
                                    $view = "View";
                                    ?>
                                    <div class="ribbon2"><span>completed</span></div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="ribbon1"><span>pending</span></div>
                                    <?php
                                    $view = "Add";
                                }
                                ?>
                                <div class="row center-align grey-text text-darken-1" style="">
                                    Trade and Business Information
                                </div>
                                <div class="row center-align">
                                    <img src="<?= base_url() ?>images/001.jpg" class="responsive-img" style="width:70%"/>
                                </div>
                                <div class="row center-align">
                                    <span class="grey-text text-darken-2" style="font-size:.8em;">&nbsp;Product Categories & Business Information</span>
                                </div>

                                <hr/>

                                <div class="row center-align">
                                    <a href="<?php echo base_url() ?>businessinfo" style="font-size:.85em; text-transform: uppercase"><?php echo $view ?> Information</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card-panel">
                            <div class="box">
                                <?php
                                if (isset($bank)) {

                                    if ($bank_deposit === "yes") {
                                        $view = "Verify";
                                        ?> <div class="ribbon2"><span>Verification</span></div><?php
                                    } else if ($bank_deposit === "no") {

                                        if ($bank_verification === "reject") {
                                            $view = "Edit";
                                            ?>
                                            <div class="ribbon1"><span>rejected</span></div>
                                            <?php
                                        } else if($bank_verification === "yes") {
                                            $view = "View";
                                            ?> <div class="ribbon2"><span>completed</span></div><?php
                                        } else if($bank_verification === "no") {
                                             $view = "View";
                                            ?> <div class="ribbon2"><span>completed</span></div><?php
                                        }
                                    }
                                } else {
                                    ?>
                                    <div class="ribbon1"><span>pending</span></div>
                                    <?php
                                    $view = "Add";
                                }
                                ?>
                                <div class="row center-align grey-text text-darken-1" style="">
                                    Bank Details
                                </div>
                                <div class="row center-align">
                                    <img src="<?= base_url() ?>images/04.jpg" class="responsive-img" style="width:70%"/>
                                </div>
                                <div class="row center-align">
                                    <span class="grey-text text-darken-2" style="font-size:.8em;"><?= $view ?> Your Bank Account Credentials </span>
                                </div>

                                <hr/>

                                <div class="row center-align">
                                    <?php
                                        $url = $view === "Edit" ? base_url()."bank/edit_bank_credentials" : base_url()."bank";
                                    ?>
                                    <a href="<?php echo $url ?>" style="font-size:.85em; text-transform: uppercase"><?= $view ?> Credentials</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card-panel">
                            <div class="box">
<?php
$disp = "Pending";
$stat = "Upload";
if (isset($document)) {
    $view = "View";
    if ($document_verification === "reject") {
        $disp = "Rejected";
        $stat = "Edit";
        ?>
                                        <div class="ribbon1"><span><?= $disp ?></span></div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="ribbon2"><span>completed</span></div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <div class="ribbon1"><span>pending</span></div>
                                    <?php
                                    $view = "Upload";
                                }
                                ?>
                                <div class="row center-align grey-text text-darken-1" style="">
                                    Documents
                                </div>
                                <div class="row center-align">
                                    <img src="<?= base_url() ?>images/003.jpg" class="responsive-img" style="width:70%"/>
                                </div>
                                <div class="row center-align">
                                    <span class="grey-text text-darken-2" style="font-size:.8em;">Documents for business details verification</span>
                                </div>

                                <hr/>

                                <div class="row center-align">
                                    <a href="<?php echo base_url() ?>documents" style="font-size:.85em; text-transform: uppercase"><?= $stat ?> Documents</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col s12 m12 l10 offset-l1">
                    <div class="row  grey-text text-darken-2">
                        <span style="font-size:1.4em;">Bulkhouse Maximizes the Benefits of your Business.</span>
                    </div>
                    <div class="row">
                        <p style="font-size:.8em;" class="grey-text text-darken-1">
                            Bulkhouse creates a favorable ecosystem to maximize growth opportunities for both buyers and Sellers by providing high quality fulfillment services and a secure payment infrastructure. Bulkhouse is all about simplifying trade without getting into the complexities involved in B2B e-commerce and export transactions.
                        </p>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col s12 m5 l5">
                            <br/>
                            <img src="<?= base_url() ?>images/007.png"  class="responsive-img"/>
                        </div>
                        <div class="col s12 m7 l7">
                            <div style=" border-radius: 25px;

                                 padding: 20px;
                                 border: 1px solid grey;
                                 ">
                                <span style="font-size:1em;" class="grey-text text-darken-3">
                                    Add a listing
                                </span>
                                <br/>
                                <p style="text-align:left; font-size:.8em;" class="grey-text text-darken-2">
                                    Uploading your products is simple through our portal. We can also help you put together an attractive catalogue by connecting you to the global market. <br/>
                                    <br/>
                                    <span style="float:right">
                                        <a target="_blank" href="http://bulk.house/index.php/marketplace/seller/login/" class="btn red waves-effect waves-light" style="font-size: .9em; text-transform: capitalize; text-transform: capitalize; letter-spacing: 0px;"> Add Products </a><br/>
                                    </span>
                                    <br/>


                                </p>
                            </div>
                        </div>
                    </div>


                </div>

            </div>


            <div class="row">
                <hr/>
            </div>

            <div class="row">
                <div class="container center-align">

                    <span class="page-sub-title">Connect our 24X7 customer care experts or reach our relationship manager to avail personalized services to clarify any doubts for smooth and comfortable trading. This site is best viewed in <i class="mdi mdi-google-chrome"></i> Google Chrome</span>
                </div>
            </div>

            <div class="row">
                <div class="container">
                    <div class="row indigo-text text-darken-4">
                        <center>
                            <i class="mdi mdi-phone indigo-text tex-darken-4"></i> &nbsp; Contact Number : +91 891 393 9393

                            &nbsp;&nbsp;
                            <i class="mdi mdi-email indigo-text text-darken-4" ></i> &nbsp; Email-Id : vsupport@bulkhouse.in
                        </center>
                        <br/>

                    </div>
                    <div class="row">
                        <span  class="page-sub-title">
                            Contact Address:<br/>LEVEL II, THE OFFICE, PLOT NO 39, OCEAN VIEW LAYOUT, VISAKHAPATNAM-530003, INDIA.<br/>&copy; &nbsp;Copyrights Bulkhouse India Private Trading Ltd. All rights reserved
                        </span>
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
    </body>
</html>
