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
                <a href="<?php echo base_url()?>businessinfo/product_categories" class="brand-logo center">Add / Delete Product Category</a>
                <ul class="left">
                    <li><a href="<?php echo base_url() ?>businessinfo" id="left_logo"><i class="mdi mdi-arrow-left"></i></a></li>

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
                <div class="col m10 offset-m1">
                    <div class="row">
                        <div class="col m12 s12 l5">
                            <span class="main-heading">
                                Add Your Product Category
                            </span><br/>
                            <span class="page-sub-title">
                               
                                This Page helps to add your product category
                            </span>
                        </div>
                        <div class="col m12 s12 l7">
                            <span class="indigo-text text-darken-4" style="font-size:1rem">
                                    <?php 
                                        if($this->session->flashdata("message") !== NULL) {
                                            $message = $this->session->flashdata("message");
                                         
                                            if($message === "yes") {
                                                echo "Category Added Successfully..!";
                                            } else {
                                                echo "Category Not Added.. Please try again";
                                            }
                                        }
                                        
                                    ?>
                                </span>
                            <div class="card-panel" style="color:grey; font-size: .9em; font-weight: normal">
                                <form method="post" action="<?php echo base_url() ?>businessinfo/add_product_category" onsubmit="return validate()"> 
                                <div class="row">
                                    <div class="col m12 s12 l6">
                                        Choose Product Category
                                    </div>
                                    <div class="col m12 s12 l6">
                                        <select class="browser-default" name="category" id="category">
                                            <option value="no">-- Choose Product Category --</option>
                                            <?php 
                                                if(isset($available) && $available !== NULL) {
                                                    foreach ($available as $value) {
                                                        ?>
                                            <option value="<?php echo $value->id?>"><?php echo $value->name?></option>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </select> <span style="color:red; font-size: .9em; font-family: normal" id="category_error"></span>
                                    </div>
                                </div>
                                 
                                
                                <div class="row right-align">
                                    <button type="submit" class="waves-effect waves-light red btn" style="text-transform: capitalize; letter-spacing: 0px; font-size: 0.8em">
                                        Add Category
                                    </button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
             <div class="row">
                <div class="col m10 offset-m1">
                    <div class="row">
                        <div class="col m12 s12 l5">
                        <span class="main-heading">Your Product Categories</span>
                        <br/>
                        <span class="main-sub-title">Here is the list of categories you added.</span>
                        <br/>
                        </div>
                        <div class="col m12 s12 l7">
                            <span class="indigo-text text-darken-4" style="font-size:1rem">
                                    <?php 
                                        if($this->session->flashdata("messages") !== NULL) {
                                            $message = $this->session->flashdata("messages");
                                         
                                            if($message === "yes") {
                                                echo "Category Deleted Successfully..!";
                                            } else {
                                                echo "Category Not Deleted.. Please try again";
                                            }
                                        }
                                        
                                    ?>
                                </span>
                            <div class="card-panel">
                                <?php 
                            if(isset($categories) && $categories !== NULL) {
                              if($categories === "no")   {
                                  echo "There are no product categories added yet";
                              } else {
                                  ?> 
                                <table style="width:100%; font-size: .9em; color: grey; font-weight: normal">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                 foreach($categories as $value) {
                                     ?> 
                                <tr>
                                    <td><?= $value->name?></td>
                                    <td><a href="<?php echo base_url()?>businessinfo/delete_category/<?= $value->id?>">Delete</a></td>
                                </tr>
                                         
                                         <?php
                                 }
                                ?>
                            </tbody>
                        </table>
                                      
                                      <?php
                              }
                            } 
                        ?>
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
        <script>
            function validate() {
                var value = $("#category").val();
                var flag = true;
                if(value === "no") {
                    flag = false;
                    $("#category_error").html("Please choose category");
                }
                return flag;
            }
            </script>
    </body>
</html>

