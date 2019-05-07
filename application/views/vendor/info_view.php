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
                <a href="<?php echo base_url() ?>businessinfo" class="brand-logo center">Trade and Business Info</a>
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
                    <span class="main-heading">
                        <div class="container">
                            <?php
                            if ($this->session->flashdata("message") !== NULL) {
                                $val = $this->session->flashdata("message");
                                if($val === "yes") {
                                    echo "<center><span class = 'indigo-text text-darken-4'>Business Info Saved Successfully..!</span></center>";
                                } else {
                                    echo $val;
                                }
                            }
                            ?>
                        </div>
                    </span>
                </div>
                <div class="row">
                    <div class="col m10 offset-m1">
                         <div class="row">
                         <div class="col s12 m12 l5">
                        <span class="main-heading">
                            Add Products Category
                        </span><br/>
                        <span class="page-sub-title">
                             Lets take a step forward. Help us know what category of product(s) you sell
                        </span>
                         </div>

                         <div class="col s12 m12 l7">
                        <div class="card-panel">
                            <a href="<?php echo base_url() ?>businessinfo/product_categories" class="indigo-text text-darken-4">
                                <div class="row">
                                    <?php
                                    if (is_array($categories)) {
                                        if (isset($categories) && $categories !== NULL) {
                                            if ($categories === "no") {
                                                echo "There are no product categories added yet";
                                            } else {
                                                ?>
                                                <table style="width:100%; font-size: .9em; color: grey; font-weight: normal">
                                                    <thead>
                                                        <tr>
                                                            <th>Category &nbsp; <span style="font-size: .8em;color:blue; float: right">Click to add product category</span></th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($categories as $value) {
                                                            ?>
                                                            <tr>
                                                                <td><?= $value->name ?></td>
                                                            </tr>

                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>

                                                <?php
                                            }
                                        }
                                    } else {
                                        echo $categories;
                                    }
                                    ?>
                                </div>
                            </a>
                        </div>
                         </div>
                         </div>

                    <br/>
                    <br/>

                        <div class="row">
                            <?php
                                $details = $profile[0];
                            ?>
                            <div class="col m12 s12 l5">
                            <span class="main-heading">
                                Add your Business Information
                            </span><br/>
                            <span class="page-sub-title">
                                <br/>
                                Adding your business information will help us know better about your company.
                            </span>
                            <br/>
                            <center>
                                <img src="<?php echo base_url() ?>images/cart.png" class="responsive-img" style="width:50%"/>
                            </center>
                            <br/>
                            <span class="page-sub-title">
                            </span>
                            </div>
                            <div class="col m12 s12 l7">
                              <div class="row">
                          <div class="right-align">
                                  <a href="<?php echo base_url() ?>/businessinfo/update_business_info_view" class="btn waves-effect waves-light red" type="submit" style="text-transform: capitalize; letter-spacing: 0px; font-size: 0.8em">Click To Edit</a>
                          </div>
                      </div>
                            <div class="card-panel">
                                <div class="row">
                                    <div class="container">
                                        <span class="indigo-text text-darken-4">
                                            <?php
                                                if($this->session->flashdata("message") !== NULL) {
                                                    $value = $this->session->flashdata("message");
                                                    if($value === "no") {
                                                       echo "Business info not created..!";
                                                    } else if($value === "updated")  {
                                                        echo "Business info updated";
                                                    }
                                                }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                     <b class="black-text">Company Details</b>
                                    <br/>
                                    <table class="width:100%" style="font-size : .9em; color: grey; font-weight: normal">
                                        <tr>
                                            <td style="width:50%">Year of Establishment</td>
                                            <td><?= $details->year?></td>
                                        </tr>
                                        <tr>
                                            <td>No of Employees</td>
                                            <td><?= $details->no_of_employees?></td>
                                        </tr>
                                        <tr>
                                            <td>Turn over</td>
                                            <td>
                                                <?= $details->turn_over?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Quality Certificate</td>
                                            <td>
                                                <?= $details->certificate?>
                                            </td>
                                        </tr>

                                    </table>
                                    <br/>
                                    <b class="black-text">Additional Details</b>
                                    <br/>
                                    <table style="width:100%; font-size: .8em; color: grey; font-weight: normal">
                                        <tr>
                                            <td style="width:50%">Contact Person</td>
                                            <td style="width:50%"><?= $details->contact_person?></td>
                                        </tr>
                                        <tr>
                                            <td>Contact Email</td>
                                            <td><?= $details->contact_email?></td>
                                        </tr>
                                        <tr>
                                            <td>Contact Phone</td>
                                            <td><?= $details->contact_phone?></td>
                                        </tr>
                                    </table>
                                </div>



                            </div>
                        </div>
                        </div>




                    </div>

                </div>
                </div>
                <br/>
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