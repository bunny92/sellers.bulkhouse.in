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
   
  var activity_name = "Seller_bank_credentials_submited";
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
                <a href="<?php echo base_url()?>bank" class="brand-logo center">Add Your Bank Credentials</a>
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
                <div class="col offset-m1 m10 l6 offset-l3">
                    <div class="row">
                         <span class="main-heading">
                                Add Bank Credentials
                            </span><br/>
                            <span class="page-sub-title">
                              You're almost done. Please add the valid business bank account details to facilitate speedy transactions.
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
                            <form method="post" action="<?php echo base_url() ?>bank/create_bank_credentials" onsubmit="return validate_bank_credentials()">
                                <table style="width:100%; font-size: .9em; color: grey; font-weight: normal">
                                    <tr>
                                        <td>Bank Account Name</td>
                                        <td><input type="text" id="account_name" name="account_name"  /><span style="font-size: .8em; color: red" id="account_name_error"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Bank Account Number</td>
                                        <td><input type="text" id="account_number" name="account_number" /><span style="font-size:.8em; color:red" id="account_number_error" ></span></td>
                                    </tr>
                                    <tr>
                                        <td>Bank Name</td>
                                        <td><input type="text" id="bank_name" name="bank_name" /><span style="font-size:.8em; color:red" id="bank_name_error"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Branch Name</td>
                                        <td><input type="text" id="branch_name" name="branch_name" /><span style="font-size:.8em; color:red" id="branch_name_error"></span></td>
                                    </tr>
                                    <tr>
                                        <td>IFSC</td>
                                        <td><input type="text" id="ifsc" name="ifsc" /><span style="font-size:.8em; color:red" id="ifsc_error"></span></td>
                                    </tr>


                                </table>
                                <div class="row">
                                    <div class="pull-right">
                                        <button class="btn waves-effect waves-light red" type="submit" style="font-size:.8em; text-transform: capitalize">Click to Save Credentials</button>
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
        <script type="text/javascript" src="<?php echo base_url();?>js/bankblur.js"></script>
    </body>
</html>
