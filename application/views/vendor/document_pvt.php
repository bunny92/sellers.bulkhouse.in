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
                <a href="<?php echo base_url() ?>documents" class="brand-logo center">Upload Your Documents</a>
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
                <div class="col l4 offset-l1 s12 m12">
                    <span class="page-title">Upload Your Documents</span>
                    <br/><br/>
                    <span class="page-sub-title">Let's take the final step! Uploading your documents will help us validate you as a <i><b>VERIFIED VENDOR</b></i></span>
                    <br/>
                    <center>
                        <img src="<?php echo base_url() ?>images/documents.png">
                    </center>
                    <br/>

                    <span  class="page-sub-title">The following documents are required for you to upload</span>
                    <br/>

                    <ol type = '1' style="font-size:.8em; color: gray;">

                        <li>Photo ID <span style="color:red">*</span></li>
                        <li>VAT/CST <span style="color:red">*</span></li>
                        <li>Company PAN <span style="color:red">*</span></li>
                        <li>MOA</li>
                        <li>CENVAT </li>
                        <li>Cancel Cheque <span style="color:red">*</span></li>

                    </ol>
                </div>
                <div class="col s12 l6 m8 offset-m2">

                    <div class="row  ">

                        <div class="row">
                            <span class="page-title">1. Photo ID&nbsp; <span style="color:red; font-size:.8em">*</span></span>
                            <div class="container">
                                <p class="page-sub-title">
                                    <span class="green-text text-darken-1"><?php
                                        if ($this->session->flashdata("photo_message") !== NULL) {
                                            echo $this->session->flashdata("photo_message");
                                        }
                                        ?></span><br/>
                                    Note : Upload Passport Copy / Aadhar Card / Driving License <br/>
                                    Format : JPG or PDF Only <br/>
                                    <span class="indigo-text text-darken-4">Status : <?= $profile->photo_status === 'N/A' ? "Please Upload" : $profile->photo_status ?></span><br/><br/>
                                    <button onclick="document.location.href = '<?php echo base_url() ?>photo_document'" class="btn red white-text" style="font-size: .8em; text-transform: capitalize">
                                        <?php
                                        if ($profile->photo_status === 'N/A') {
                                            echo "Upload";
                                        } else if ($profile->photo_status === 'Approved') {
                                            echo "View";
                                        } else {
                                            echo "Edit";
                                        }
                                        ?>

                                        Photo Id</button>
                                </p>
                            </div>
                        </div>


                        <div class="row">
                            <span class="page-title">2. VAT/CST&nbsp; <span style="color:red; font-size:.8em">*</span></span>
                            <div class="container">
                                <p class="page-sub-title">
                                    <span class="green-text text-darken-1"><?php
                                        if ($this->session->flashdata("vat_message") !== NULL) {
                                            echo $this->session->flashdata("vat_message");
                                        }
                                        ?></span><br/>
                                    Format : JPG or PDF Only <br/>
                                    <span class="indigo-text text-darken-4">Status : <?= $profile->vat_status === 'N/A' ? "Please Upload" : $profile->vat_status ?></span><br/><br/>
                                    <button  onclick="document.location.href = '<?php echo base_url() ?>vat_document'" class="btn red white-text" style="font-size: .8em; text-transform: capitalize"><?php
                                        if ($profile->vat_status === 'N/A') {
                                            echo "Upload";
                                        } else if ($profile->vat_status === 'Approved') {
                                            echo "View";
                                        } else {
                                            echo "Edit";
                                        }
                                        ?>VAT/CST</button>
                                </p>
                            </div>
                        </div>


                        <div class="row">
                            <span class="page-title">3. Company PAN&nbsp; <span style="color:red; font-size:.8em">*</span></span>
                            <div class="container">
                                <p class="page-sub-title">
                                    <span class="green-text text-darken-1"><?php
                                        if ($this->session->flashdata("company_message") !== NULL) {
                                            echo $this->session->flashdata("company_message");
                                        }
                                        ?></span><br/>
                                    Format : JPG or PDF Only <br/>
                                    <span class="indigo-text text-darken-4">Status : <?= $profile->pan_status === 'N/A' ? "Please Upload" : $profile->pan_status ?></span><br/><br/>
                                    <button onclick="document.location.href = '<?php echo base_url() ?>company_document'" class="btn red white-text" style="font-size: .8em; text-transform: capitalize"><?php
                                        if ($profile->pan_status === 'N/A') {
                                            echo "Upload";
                                        } else if ($profile->pan_status === 'Approved') {
                                            echo "View";
                                        } else {
                                            echo "Edit";
                                        }
                                        ?> Company PAN</button>
                                </p>
                            </div>
                        </div>


                        <div class="row">
                            <span class="page-title">4. MOA</span>
                            <div class="container">
                                <p class="page-sub-title">
                                    <span class="green-text text-darken-1"><?php
                                        if ($this->session->flashdata("moa_message") !== NULL) {
                                            echo $this->session->flashdata("moa_message");
                                        }
                                        ?></span><br/>
                                    Format : PDF Only <br/>

                                    <span class="indigo-text text-darken-4">Status : <?= $profile->moa_status === 'N/A' ? "Please Upload" : $profile->moa_status ?></span><br/><br/>
                                    <button onclick="document.location.href = '<?php echo base_url() ?>moa_document'" class="btn red white-text" style="font-size: .8em; text-transform: capitalize"><?php
                                        if ($profile->moa_status === 'N/A') {
                                            echo "Upload";
                                        } else if ($profile->moa_status === 'Approved') {
                                            echo "View";
                                        } else {
                                            echo "Edit";
                                        }
                                        ?> MOA Document</button>
                                </p>
                            </div>
                        </div>


                        <div class="row">
                            <span class="page-title">5. CENVAT</span>
                            <div class="container">
                                <p class="page-sub-title">
                                    <span class="green-text text-darken-1"><?php
                                        if ($this->session->flashdata("cenvat_message") !== NULL) {
                                            echo $this->session->flashdata("cenvat_message");
                                        }
                                        ?></span><br/>
                                    Format : JPG or PDF Only <br/>                                    <span class="indigo-text text-darken-4">Status : <?= $profile->cenvat_status === 'N/A' ? "Please Upload" : $profile->cenvat_status ?></span><br/><br/>
                                    <button onclick="document.location.href = '<?php echo base_url() ?>cenvat_document'" class="btn red white-text" style="font-size: .8em; text-transform: capitalize"><?php
                                        if ($profile->cenvat_status === 'N/A') {
                                            echo "Upload";
                                        } else if ($profile->cenvat_status === 'Approved') {
                                            echo "View";
                                        } else {
                                            echo "Edit";
                                        }
                                        ?> CENVAT</button>
                                </p>
                            </div>
                        </div>


                        <div class="row">
                            <span class="page-title">6. Cancelled Cheque&nbsp; <span style="color:red; font-size:.8em">*</span></span>
                            <div class="container">
                                <p class="page-sub-title">
                                    <span class="green-text text-darken-1"><?php
                                        if ($this->session->flashdata("cancel_message") !== NULL) {
                                            echo $this->session->flashdata("cancel_message");
                                        }
                                        ?></span><br/>
                                    Format : JPG or PDF Only <br/>                                    <span class="indigo-text text-darken-4">Status : <?= $profile->cancel_status === 'N/A' ? "Please Upload" : $profile->cancel_status ?></span><br/><br/>
                                    <button onclick="document.location.href = '<?php echo base_url() ?>cancel_document'" class="btn red white-text" style="font-size: .8em; text-transform: capitalize"><?php
                                        if ($profile->cancel_status === 'N/A') {
                                            echo "Upload";
                                        } else if ($profile->cancel_status === 'Approved') {
                                            echo "View";
                                        } else {
                                            echo "Edit";
                                        }
                                        ?> Cancelled Cheque</button>
                                </p>
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

    </body>
</html>