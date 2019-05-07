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
<script type="text/javascript">(function(d,n){var s,a,p;s=document.createElement("script");s.type="text/javascript";s.async=true;s.src=(document.location.protocol==="https:"?"https:":"http:")+"//cdn.nudgespot.com"+"/nudgespot.js";a=document.getElementsByTagName("script");p=a[a.length-1];p.parentNode.insertBefore(s,p.nextSibling);window.nudgespot=n;n.init=function(t){function f(n,m){var a=m.split('.');2==a.length&&(n=n[a[0]],m=a[1]);n[m]=function(){n.push([m].concat(Array.prototype.slice.call(arguments,0)))}}n._version=0.1;n._globals=[t];n.people=n.people||[];n.params=n.params||[];m="track register unregister identify set_config people.delete people.create people.update people.create_property people.tag people.remove_Tag".split(" ");for(var i=0;i<m.length;i++)f(n,m[i])}})(document,window.nudgespot||[]);nudgespot.init("a3b2a04cb8a634716c8f7a599784a8c8");
   
  var activity_name = "Seller_info_submited";
   nudgespot.track(activity_name);
   </script>
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
                            echo $this->session->flashdata("message");
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
                    <form method="post" action="<?php echo base_url() ?>businessinfo/create_business_info" onsubmit="return validateInfo()">
                        <div class="row">
                            <div class="col s12 m12 l5">
                                <span class="main-heading">
                                    Add your Business Information
                                </span><br/>
                                <span class="page-sub-title">
                                    <br/>
                                    Adding your business information will help us know better about your company.
                                </span>
                            </div>
                            <div class="col s12 m12 l7">
                                <div class="card-panel">
                                    <div class="row">
                                        <div class="container">
                                            <span class="indigo-text text-darken-4">
                                                <?php
                                                if ($this->session->flashdata("message") !== NULL) {
                                                    $value = $this->session->flashdata("message");
                                                    if ($value === "no") {
                                                        echo "Business info not registered.. Please try again..!";
                                                    }
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <b class="black-text">Company Details</b>
                                        <br/>
                                        <br/>
                                        <table class="width:100%" style="font-size : .9em; color: grey; font-weight: normal">
                                           <tr>
                                                <td style="width:50%">Year of Establishment</td>
                                                <td style="width:50%"><input type="text" id="year" name="year" /> <span id="year_error" style="font-size:.8em; color:red;"></span></td>
                                            </tr>
                                            <tr>
                                                <td>No of Employees</td>
                                                <td><select id="no" name="no" class="browser-default">

                                                        <option value="no">--Select--</option>
                                                        <option value="0 to 50">0 to 50</option>
                                                        <option value="50 to 100">50 to 100</option>
                                                        <option value="100 and above">100 and above</option>
                                                    </select><span  id="no_error" style="color:red; font-size:.8em;"></span></td>
                                            </tr>
                                            <tr>
                                                <td>Turn over</td>
                                                <td>
                                                    <input type="text" id="turn_over" name="turn_over"/>
                                                    <span id="turn_over_error" style="color:red; font-size: .8em"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Quality Certificate</td>
                                                <td>
                                                    <select id="certificate" class="browser-default" name="certificate">
                                                        <option value="no">--Select Certificate--</option>
                                                        <option value="ISI/BIS">ISI/BIS</option>
                                                        <option value='ISO'>ISO</option>
                                                        <option value="FSSAI">FSSAI</option>
                                                        <option value="NONE">NONE</option>

                                                    </select>
                                                    <span id="certificate_error" style="color:red; font-size: .8em"></span>
                                                </td>
                                            </tr>

                                        </table>
                                        <br/>
                                        <b class="black-text">Additional Details</b>
                                        <br/>
                                        <table style="width:100%; font-size: .8em; color: grey; font-weight: normal">
                                            <tr>
                                                <td style="width:50%">Contact Person</td>
                                                <td style="width:50%"><input type="text" id="contact_person" name="contact_person"/> <span id="contact_person_error" style="font-size: .8em; color: red"></span></td>
                                            </tr>
                                            <tr>
                                                <td>Contact Email</td>
                                                <td><input type="text" id="contact_email" name="contact_email"/> <span id="contact_email_error" style="font-size:.8em; color:red"></span></td>
                                            </tr>
                                            <tr>
                                                <td>Mobile Number</td>
                                                <td><input type="text" id="contact_phone" name="contact_phone" /> <span id="contact_phone_error" style="font-size:.8em; color:red"></span></td>
                                            </tr>
                                        </table>
                                    </div>


                                    <div class="row">
                                        <div class="right-align">
                                            <button class="btn waves-effect waves-light red" type="submit" style="text-transform: capitalize; letter-spacing: 0px; font-size: 0.8em">Click To Save Details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>

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
    <script type="text/javascript" src="<?php echo base_url(); ?>js/info.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/infoblur.js"></script>

</body>
</html>