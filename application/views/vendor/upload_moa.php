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
        <style>
            .file-field .btn, .file-field .btn-large{
                height: 2.3rem;
                line-height: 2.3rem;
            }
        </style>
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
                <a href="<?php echo base_url() ?>moa_document" class="brand-logo center">Document - MOA</a>
                <ul class="left">
                    <li><a href="<?php echo base_url() ?>documents" id="left_logo"><i class="mdi mdi-arrow-left"></i></a></li>

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
                <div class="col m5 offset-m1">
                    <span class="page-title"><?php echo $profile->moa_status === "Approved" ? "Your" : "Please upload your " ?>  MOA Document</span>
                    <br/>
                    <span class="page-sub-title">
                        <br/>
                        <?php echo $profile->moa_status === "Approved" ? "Your document is sucessfully approved" : "Please upload the valid document and wait for verification. If there exists any ambiguilty,our customer care expert will reach you shortly" ?>
                    </span>
                    <br/>
                    <?php
                    $photo_id = "";
                    $photo_url = "";
                    if ($profile->moa_status === 'N/A') {
                        $photo_id = "N/A";
                        $photo_url = base_url() . "images/documents.png";
                    } else {
                        $photo_url = $profile->moa;
                    }
                    $extension = substr($photo_url, strrpos($photo_url, ".")+1);
                    $type = "";
                    if(strcasecmp($extension, "jpg") == 0) {
                        $type = "jpg";
                    } else if(strcasecmp($extension, "pdf") == 0) {
                        $type = "pdf";
                    }

                    ?>
                    <br/>
                    <center>
                        <?php if($type === "pdf") { ?>
                          <iframe src="<?php echo base_url()?>dashboard/get_document?pic=<?php echo $photo_url?>" class="col s12 m12 responsive-img" style="height:350px;"  frameBorder="0" ></iframe>
                            <?php

                        }  else {
                                ?>
                            <img src="<?php echo $photo_url?>" class="responsive-img"/>
                                    <?php
                            } ?>

                    </center>
                    <br/>

                </div>
                <?php if($profile->moa_status !== "Approved") {
                    ?>
                        <div class="col m5 offset-m1">
                    <div class="card-panel">
                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>moa_document/upload_document" onsubmit="return validate_form()">
                            <input type="hidden" name="doc_type" value="moa"/>
                            <div class="row">

                                <div class="input-field col s12">

                                    <div class="file-field input-field">
                                        <div class="btn red">
                                            <span style="font-size: .8em; text-transform: capitalize">Choose File</span>
                                            <input type="file" name="pic">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" id="pic_name">
                                        </div>
                                         <span style="color:red; font-size: .7em" id="pic_id_error"></span>
                                    </div>


                                </div>
                                <div class="input-field col s12 right-align">
                                    <button class="btn red waves-effect waves-light" type="submit" style="text-transform: capitalize; font-size: .8em;">Upload File</button>
                                </div>

                            </div>
                            <div class="row">
                                <span style="color:red; font-size: .7em" >
                                    <?php
                                        if($this->session->flashdata("message") !== NULL) {
                                            echo $this->session->flashdata("message");
                                        }
                                    ?>
                                </span>
                            </div>
                        </form>
                    </div>
                </div><?php
                } ?>
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
        <script type="text/javascript">
                             function validate_form() {
                                 $("#photo_id_error").html("");
                                 var pic_name = $("#pic_name").val();
                                 var ext = pic_name.substring(pic_name.lastIndexOf(".")+1);
                                 var flag = true;
                                 if(pic_name.trim().length < 5) {
                                     $("#pic_id_error").html("Please upload a file");
                                     flag = false;
                                 }
                                 if(!(ext.toLowerCase() === "pdf")) {
                                     $("#pic_id_error").html("Please upload .pdf files");
                                     flag = false;
                                 }

                                 return flag;

                             }
        </script>
    </body>
</html>
