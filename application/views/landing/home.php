<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="author" content="Ganesh - ganesh.works24@gmail.com"/>
        <meta name="web-author" content="Ganesh ganesh.works24@gmail.com"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Home</title>

            <link href="/landing_assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="/landing_assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
            <link href="/landing_assets/css/style.css" rel="stylesheet" type="text/css" />
            <link href="/landing_assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
            <link href="/landing_assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
            <!--mouse-scroll-css-->
            <link rel="Stylesheet" type="text/css" href="/landing_assets/js/mouse-scroll/smoothDivScroll.css" />

            <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600italic,800,700,700italic,300italic,400italic,600,800italic' rel='stylesheet' type='text/css'>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                <style>
                    .frmep::-webkit-scrollbar {
                        width: 1px;
                        background:none;
                    }

                    .frmep::-webkit-scrollbar-track {
                        -webkit-box-shadow: none;
                        border-radius: 10px;
                    }

                    .frmep::-webkit-scrollbar-thumb {
                        border-radius: 10px;
                        -webkit-box-shadow: none;
                        background-color:none;
                    }

                </style>
                <script>

                    $(document).ready(function () {

                        $('.toggle').click(function (e) {

                            $('.main-nav').slideToggle('slow');



                            e.preventDefault();

                        });

                    });

                </script>

                <!--pop up-->

                <!--li active-->

                <script>

                    $(document).ready(function () {

                        $(document).on("scroll", onScroll);



                        //smoothscroll

                        $('a[href^="#"]').on('click', function (e) {

                            e.preventDefault();

                            $(document).off("scroll");



                            $('a').each(function () {

                                $(this).removeClass('active');

                            })

                            $(this).addClass('active');



                            var target = this.hash,
                                    menu = target;

                            $target = $(target);

                            $('html, body').stop().animate({
                                'scrollTop': $target.offset().top + 2

                            }, 500, 'swing', function () {

                                window.location.hash = target;

                                $(document).on("scroll", onScroll);

                            });

                        });

                    });



                    function onScroll(event) {

                        var scrollPos = $(document).scrollTop();

                        $('#menu-center a').each(function () {

                            var currLink = $(this);

                            var refElement = $(currLink.attr("href"));

                            if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {

                                $('#menu-center  li a').removeClass("active");

                                currLink.addClass("active");

                            }

                            else {

                                currLink.removeClass("active");

                            }

                        });

                    }

                </script>

                <!--li active-->

                <!--pop up-->
                <style media="screen">
                    .employ{
                        padding:20px;
                        text-align: center;
                    }
                </style>
                </head>

                <body class="index">
                    <header id="header">
                        <div class="container">
                            <div class="row">
                                <div class="logo-div col-lg-3 col-md-2 col-sm-2 col-xs-12"> <img src="/landing_assets/Image/logo.png" alt="logo" /> </div>
                                <div id="menu-center" class="main-menu col-lg-9 col-md-10 col-sm-10 col-xs-12">
                                    <ul class="main-nav">
                                        <li><a class="active" href="#h1">Home</a> </li>
                                        <li><a href="#a1">About Us</a> </li>
                                        <li><a href="#f1">Features </a> </li>
                                        <li><a href="#a21">Contact Us</a> </li>
                                        <li ><a href="<?= base_url("welcome/login")?>" >Log In</a> </li>
                                        <li ><a href="<?= base_url("register")?>" >Register As Seller </a> </li>
                                    </ul>
                                </div>
                            </div>
                            <a href="#" class="toggle"> <span class="border-span"></span> <span class="border-span"></span> <span class="border-span"></span> </a> </div>
                    </header>
                    <div id="h1" >
                        <div class="slider text-center" >
                            <img src="/landing_assets/Image/slider-bg.jpg" width="100%" />

                        </div>
                    </div>
                    <div id="enquiry" class="modal fade" aria-labelledby="myModalLabel" aria-hidden="true" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                     <h4 class="modal-title">Enquiry Form</h4>
                                </div>
                                <div class="modal-body" id="myModalBody">
                                  <form name="contact_form" method="POST" action="">
                                      <div class="form-group col-md-6">
                                      <label for="first_name">First Name</label>
                                      <input class="form-control" id="first_name" name="first_name" placeholder="Your First Name" type="text"/>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label for="last_name">Last Name</label>
                                      <input class="form-control" id="last_name" name="last_name" placeholder="Your Last Name" type="text" />
                                  </div>
                                         <div class="form-group col-md-6">
                                           <label for="email">Email ID</label>
                                           <input type = "email" class="form-control" id="email" name="email" placeholder="Email-ID"/>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="phone">Phone Number</label>
                                            <input class="form-control" id="phone" name="phone" placeholder="Contac Number" type="number"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Category you looking for</label>
                                            <select class="form-control" name="category" id="category">
                                                <option value="">Choose Category</option>
                                                <option value="Apparels and Textiles">Apparels and Textiles</option>
                                                <option value="Footwear, Bags and Accessories">Footwear, Bags and Accessories</option>
                                                <option value="Home and Kitchen">Home and Kitchen</option>
                                                <option value="Electrical, Lighting and Tools">Electrical, Lighting and Tools</option>
                                                <option value="Mobiles, Computers and Electronics">Mobiles, Computers and Electronics</option>
                                                <option value="Sport and Toyes">Sport and Toyes</option>
                                                <option value="Health and Beauty Care">Health and Beauty Care</option>
                                                <option value="Packaging and Office">Packaging and Office</option>
                                                <option value="Construction">Construction</option>
                                                <option value="Industrial and Automotive">Industrial and Automotive</option>
                                                <option value="Food and Agriculture">Food and Agriculture</option>
                                                <option value="Furniture">Furniture</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Message"></textarea>
                                        </div>

                                         <div class="form-group">
                                            <input type="checkbox" name="checkbox" value="check" id="agree" />
Although i am registered an a DND customer, I authorize Bulkhouse Trading India(P) Ltd to call me, send SMS/text messages or send me E-mails.
                                        </div>
                                        <div class="form-group">
                                        <div id="alert-msg"></div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                  <input class="btn btn-danger" id="submit" name="submit" type="button" value="Send" />
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div  id="a1" >
                        <div class="employ"  data-wow-duration="1s" >
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 col-xm-12">
                                        <div style="font-size:1.3em;color:white; padding-bottom:10px">Start your business with Bulkhouse &amp; reach customers across World</div>
                                    </div>
                                    <div class="col-md-4 col-xm-12">
                                        <a href="#enquiry" role="button" data-toggle="modal" style="color:white; font-size:2rem; padding:10px; background-color:#D83548">ENQUIRY</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="who-we text-center">
                            <div class="container">
                                <h3 class="cont-head">Who we Are</h3>
                                <p>Bulkhouse is promoted by leading business house from Visakhapatnam Andhra Pradesh, India with international shipping and trading experience for decades in metals, minerals and various commodities across the globe.</p>
                                <p>We at Bulkhouse intend to integrate the modern technologies of e-commerce into global trade to simplify the process of trading with most efficient logistics solutions.</p>
                                <p>This uniqueness of an international Marketplace makes it easier for the Buyers and Sellers to do business on Bulkhouse.</p>
                            </div>
                            <div class="three-boxes ">
                                <div class="container">
                                    <div class="row">
                                        <div class="benifits col-md-4  col-sm-4 "> <img alt="Benefit" src="/landing_assets/Image/document-list.png" />
                                            <h4 class="total-head">Unlimited</h4>
                                            <p>Product Listings</p>
                                        </div>
                                        <div class="payroll col-md-4  col-sm-4"> <img alt="Payroll" src="/landing_assets/Image/Ruppe.png" />
                                            <h4 class="total-head">Zero Registration </h4>
                                            <p>Fees</p>
                                        </div>
                                        <div class="free col-md-4  col-sm-4"> <img alt="free" src="/landing_assets/Image/free-icon.png" />
                                            <h4 class="total-head">24 x 7 Sales  </h4>
                                            <p>Channel</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="compliance ">
                            <div class="container">
                                <h2 class="cont-head">What We Do</h2>
                                <div class="row">
                                    <div class="you-video col-md-6   wow slideInLeft" data-wow-duration="2s" >
                                        <iframe class="you-video-div" src="https://www.youtube.com/embed/gVxf1W0gG5E" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                    <div class="compliance-cont col-md-6  wow slideInRight" data-wow-duration="2s" >
                                        <p class="black-bold">At Bulkhouse we provide E-commerce marketplace where traders, wholesalers and domestic manufacturers can sell their products across India through "Bulkhouse.in" and international markets through "Bulkhouse.com" without the hassles of Export License and procedures by listing your products here.</p>
                                        <ul class="compliance-ul">
                                            <li>
                                                <h2>E-COMMERCE</h2>
                                                <p> Through our platform, we provide a favorable ecosystem for Sellers and Buyers incorporating transparent business ethical and quality practices, customer centric approach and high service standards in product deliveries. </p>
                                            </li>
                                            <li>
                                                <h2>PRODUCTS</h2>
                                                <p> As a Seller, you have a choice of 12 major categories, 300+ sub product categories in which to list your products, which are cataloged and displayed to international importers and domestic bulk buyers. </p>
                                            </li>
                                            <li>
                                                <h2>QUALITY AND QUANTITY</h2>
                                                <p> At Bulkhouse we ensure that our buyers gets the right quality and quantity through a mandatory pre-shipment QA check. </p>
                                            </li>
                                            <li>
                                                <h2>SHIPPING</h2>
                                                <p> We provide End to End shipping and logistics solutions to ship the products from your door step to the buyers across the globe. </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div  id="f1" >
                        <div class="intregation">
                            <div class="container">
                                <h1 class="cont-head"> Features </h1>
                                <div  class="row marg-intre">
                                    <div class="benefit-insurance col-md-3 col-sm-6 text-center"> <img src="/landing_assets/Image/benefit-insu.png" />
                                        <p class="inte-head">SINGLE LISTING MULTIPLE MARKETPLACES</p>
                                        <p>You list your products at sellers.bulkhouse.in and your products are displayed across the various websites such as bulkhouse.com and bulkhouse.in</p>
                                    </div>
                                    <div class="payroll-tax col-md-3 col-sm-6 text-center"> <img src="/landing_assets/Image/payroll-tax.png" />
                                        <p class="inte-head">GLOBAL MARKET</p>

                                        <p>Why restrict your products to certain markets when you can sell them globally across various continents. Let your products also reach emerging markets such as Africa and South America.</p>
                                    </div>
                                    <div class="hr-compliance col-md-3 col-sm-6 text-center"> <img src="/landing_assets/Image/hr.png" />
                                        <p class="inte-head">FLEXIBLE SHIPPING OPTION</p>
                                        <p>Bulkhouse offers first of its kind shipping system where a buyer can choose various options such as Surface, Sea or Air, thus enabling more sales.</p>
                                    </div>
                                    <div class="payroll-tax col-md-3 col-sm-6 text-center"> <img src="/landing_assets/Image/payroll-tax.png" />
                                        <p class="inte-head">SECURED PAYMENTS</p>
                                        <p>We offer various kinds of faster and secure payment options to enable transparency and security for payments between the buyer and the seller using payment gateways and direct transfers.</p>
                                    </div>
                                </div>
                                <div class="whaty-watching">
                                    <h2 class="what-are-head"><span class="red-head"><i>WHAT ARE YOU WAITING FOR?REGISTER NOW!</span> AND LET YOUR PRODUCTS GO GLOBAL</i></h2>
                                    <a href="http://sellers.bulkhouse.in/register" class="red-button">Register</a> </div>
                            </div>
                        </div>
                        <!-- <div class="problem">
                         <div class="container">
                           <h2 class="cont-head">Many problems? One integrated solution.</h2>
                           <div class="row"> </div>
                           <div class="compliance-cont col-md-6 wow slideInLeft" data-wow-duration="2s" >
                             <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry.

                               Lorem Ipsum has been the industry's standard dummy text ever since the

                               1500s, when an unknown printer took a galley of type and scrambled Lorem

                               Ipsum is simply dummy text of the printing and typesetting industry.

                               Lorem Ipsum has been the industry's standard dummy text ever. </p>
                             <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry.

                               Lorem Ipsum has been the industry's standard dummy text ever since the

                               1500s, when an unknown printer took a galley of type and scrambled </p>
                             <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry.

                               Lorem Ipsum has been the industry's standard dummy text ever since the

                               1500s, when an unknown printer took a galley of type and scrambled </p>
                           </div>
                           <div class="you-video col-md-6 wow slideInRight" data-wow-duration="2s">
                             <iframe class="you-video-div" src="https://www.youtube.com/embed/YVx6fPkCI7U" frameborder="0" allowfullscreen></iframe>
                           </div>
                         </div>
                       </div> -->

                        <!--------------------
                        <div class="slider-wrap">
                         <div id="myCarousel" class="carousel slide" data-ride="carousel">

                         <ol class="carousel-indicators">
                           <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                           <li data-target="#myCarousel" data-slide-to="1"></li>
                           <li data-target="#myCarousel" data-slide-to="2"></li>
                           <li data-target="#myCarousel" data-slide-to="3"></li>
                           <li data-target="#myCarousel" data-slide-to="4"></li>
                           <li data-target="#myCarousel" data-slide-to="5"></li>
                         </ol>


                        <div class="carousel-inner" role="listbox">
                           <div class="item active">
                             <img src="/landing_assets/Image/slide1.jpg" />
                           </div>

                           <div class="item">
                             <img src="/landing_assets/Image/slide2.jpg" />
                           </div>

                           <div class="item">
                             <img src="/landing_assets/Image/slide3.jpg" />
                           </div>

                           <div class="item">
                             <img src="/landing_assets/Image/slide4.jpg" />
                           </div>
                               <div class="item">
                             <img src="/landing_assets/Image/slide5.jpg" />
                           </div>
                               <div class="item">
                             <img src="/landing_assets/Image/slide6.jpg" />
                           </div>
                         </div>


                         <a class="left carousel-control" data-target="#myCarousel" role="button" data-slide="prev">
                           <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                           <span class="sr-only">Previous</span>
                         </a>
                         <a class="right carousel-control" data-target="#myCarousel" role="button" data-slide="next">
                           <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                           <span class="sr-only">Next</span>
                         </a>

                       </div>

                         </div>

                        -->
                        <!-------------------- MOUSE SCROLL SECTION START ----------------------------

  <div id="makeMeScrollable">
  <div class="owl-carousel">
                <img src="/landing_assets/Image/slide1.jpg" alt="Demo image" id="field" />
                <img src="/landing_assets/Image/slide2.jpg" alt="Demo image" id="gnome" />
                <img src="/landing_assets/Image/slide3.jpg" alt="Demo image" id="pencils" />
                <img src="/landing_assets/Image/slide4.jpg" alt="Demo image" id="golf" />
                <img src="/landing_assets/Image/slide5.jpg" alt="Demo image" id="river" />
                <img src="/landing_assets/Image/slide6.jpg" alt="Demo image" id="train" />
        </div>



         <iframe class="frmep" style="border:none" width="100%" height="650px" src="/landing_assets/slider/index.html"></iframe>





                        <!-------------- MOUSE SCROLL SECTION END ---------->

                        <div style="width:100%">
                            <iframe class="frmep" style="border:none; padding-top:20px" width="100%" height="525px" src="/landing_assets/slider/index.html"></iframe>
                            <div class="ifrme-top"></div>
                        </div>



                    </div>




                    <div id="a21" >
                        <div class="reason">
                            <div class="container">
                                <h1 class="cont-head"> TOP REASONS TO CHOOSE BULKHOUSE </h1>
                                <p>Online Business Made Easy</p>
                                <div  class="row  marg-reason ">
                                    <div class="col-md-4  col-sm-4 no-lr-padd"> <img alt="image1" src="/landing_assets/Image/top-1.jpg" /> </div>
                                    <div class="reason-cont broken col-md-4 col-sm-4 text-center  no-lr-padd">
                                        <h3 class="broken-head">ADVISORS</h3>
                                        <p>Unsure of how to succeed online?  <br />
                                            Our expert team of bulkhouse-Advisors <br />
                                            assist you at every step to bring and grow your business online.</p>
                                    </div>
                                    <div class="col-md-4  col-sm-4  no-lr-padd"> <img alt="image2" src="/landing_assets/Image/top-2.jpg" /> </div>
                                </div>
                                <div  class="row">
                                    <div class="reason-cont broken col-md-4 col-sm-4 text-center  no-lr-padd">
                                        <h3 class="broken-head">FREE TRAINING</h3>
                                        <p>We provide in-depth knowledge of all processes <br />and prepare you for success. You can complete our free online training at your convenience.
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 no-lr-padd"> <img alt="image3" src="/landing_assets/Image/top-3.jpg" /> </div>
                                    <div class="reason-cont broken col-md-4 col-sm-4 text-center no-lr-padd">
                                        <h3 class="broken-head">BULKHOUSE PROFESSIONAL SERVICE</h3>
                                        <p>Still need some help? Choose from our list of empanelled and rated professional service providers for a range of services like photoshoots, catalogue development etc.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <footer id="footer">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 logo-foot"> <img src="/landing_assets/Image/bh_white.png" height="41px" width="44px" alt="logo-footer" />
                                        <p>Reach millions through Bulkhouse!
                                            Selling on Bulkhouse helps you expand your business globally as well as within domestic markets beyond your domain.

                                            .</p>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <h3 class="foot-heading">Our Advantages</h3>
                                        <ul class="footer-ul">
                                            <li>Pricing advantages, cost-savings</li>
                                            <li>Price comparisons</li>
                                            <li>Bulk purchasing by buyers</li>
                                            <li>Dedicated Customer Care </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <h3 class="foot-heading">Map</h3>
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7601.1727109396!2d83.32172917549984!3d17.716990231399816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a394368a0c4cacd%3A0xbb2deb2243e142ca!2sAqua+Sports+Complex!5e0!3m2!1sen!2sin!4v1450472239423" width="250" height="140" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <h3 class="foot-heading">GET IN TOUCH </h3>
                                        <ul class="footer-ul">
                                            <li>+91 891 393 93 93</li>
                                            <li>Email: vsupport@bulkhouse.in</li>
                                            <li>Bulkhouse Trading India Pvt Ltd.,</li>
                                            <li>Level II, The Office, Plot No 39, </li>
                                            <li>Ocean View Layout, Visakhapatnam - 530003, INDIA</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </footer>
                        <div class="footer-below">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8  col-sm-8">
                                        <p>© 2016 <a href="http://bulkhouse.com/" class="red">Bulkhouse Trading India Pvt.Ltd</a>, Inc. All Rights Reserved.</p>
                                    </div>
                                    <div class="col-md-4  col-sm-4">
                                        <ul class="social">
                                            <li class="facebook"></li>
                                            <li class="twitter"></li>
                                            <li class="pinrest"></li>
                                            <li class="google"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
                </html>



                <!--smooth scrolling-->

                <!--li active-->

                <script>

                    $('.main-nav li > a').click(function () {

                        $('li').removeClass();

                        $(this).parent().addClass('active');

                    });

                </script>

                <!--li active-->

                <div class="container">

                    <!-- Trigger the modal with a button -->

                    <!-- Modal -->

                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="input-field col-md-6"><i style="color:#e53935 " class="material-icons prefix fa fa-building"></i>
                                                    <input type="text" aria-required="true" placeholder="Company Name" required="" class="validate" name="firm_name" id="firm_name" onblur="find_firm()">
                                                        <label style="width:100%;" for="firm_name">Company Name</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col-md-6"><i style="color:#e53935 " class="material-icons prefix fa fa-user"></i>
                                                    <input type="text" aria-required="true" placeholder="First Name" required="" class="validate" name="firstname" id="firstname" onblur="find_fname()">
                                                        <label style="width:100%;" for="firstname" class="">First Name</label>
                                                </div>
                                                <div class="input-field col-md-6"><i style="color:#e53935 " class="material-icons prefix fa fa-user"></i>
                                                    <input type="text" aria-required="true" placeholder="Last Name" required="" class="validate" name="lastname" id="lastname" onblur="find_lname()">
                                                        <label style="width:100%;" for="lastname" class="">Last Name</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col-md-6"><i style="color:#e53935 " class="material-icons prefix fa fa-envelope"></i>
                                                    <input type="email" name="email" id="email" placeholder="Email" onblur="find_email()">
                                                        <label style="width:100%;" for="email">Email</label>
                                                </div>
                                                <div class="input-field col-md-6"><i style="color:#e53935 " class="material-icons prefix fa fa-mobile"></i>
                                                    <input type="tel" aria-required="true" placeholder="Mobile Number" required="" length="10" class="validate ng-pristine ng-invalid ng-invalid-required ng-touched" name="mobile" ng-model="mobile" id="mobile" onblur="find_mobile()">
                                                        <label style="width:100%;" for="mobile" class="">Mobile Number</label>
                                                        <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span></div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col-md-6"><i style="color:#e53935 " class="material-icons prefix fa fa-lock"></i>
                                                    <input type="password" aria-required="true" placeholder="Password" required="" name="password" id="password" onblur="find_pswd()">
                                                        <label style="width:100%;" for="password">Password</label>
                                                </div>
                                                <div class="input-field col-md-6"><i style="color:#e53935 " class="material-icons prefix fa fa-lock"></i>
                                                    <input type="password" aria-required="true" placeholder="Repeat-Password" required="" id="confirm_password" name="confirm_password" onblur="find_rpswd()">
                                                        <label style="width:100%;" for="confirm_password">Repeat-Password</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col-md-12 text-center"><i style="color:#e53935 " class="material-icons prefix fa fa-user-plus"></i>
                                                    <input type="text" name="agent" id="agent" onblur="find_agent_id()">
                                                        <label style="width:100%;" for="agent">Agent ID<span style="font-size: 0.7em">(Not Mandatory)</span></label>
                                                </div>
                                            </div>
                                            <div class=" text-center">
                                                <div class="col-md-12">
                                                    <center>
                                                        <input type="checkbox" disabled="" checked="checked" class="iagree filled-in" id="test5" name="iagree">
                                                            <label class="hide-on-med-and-up" for="test5"><span style="display: block" class="terms_none">I agree T&amp;C</span><span style="display: none" class="terms_export">I agree T&amp;C Exports<a href="http://sellers.bulkhouse.in/export_terms" target="_blank">View</a></span><span style="display: none" class="terms_domestic">I agree T&amp;C Domestic<a href="http://sellers.bulkhouse.in/domestic_terms" target="_blank">View</a></span><span style="display: none" class="terms_both">I agree T&amp;C Both<a href="http://sellers.bulkhouse.in/export_terms" target="_blank">Export</a><span>&amp;</span><a href="http://sellers.bulkhouse.in/domestic_terms" target="_blank">Domestic</a></span></label>

                    <!--<input type="checkbox" disabled="" checked="checked" class="iagree_b filled-in" id="test6" name="iagree_b">

                                                        <label class="hide-on-small-only" for="test6">

                                                            <span style="display: block" class="terms_none">I agree Terms and Conditions

                                                            </span>

                                                            <span style="display: none" class="terms_export">I agree Terms and Conditions Exports

                                                                <a href="http://sellers.bulkhouse.in/export_terms" target="_blank">View</a>

                                                            </span>

                                                            <span style="display: none" class="terms_domestic">I agree Terms and Conditions Domestic

                                                                <a href="http://sellers.bulkhouse.in/export_terms" target="_blank">View</a>

                                                            </span>

                                                            <span style="display: none" class="terms_both">I agree Terms and Conditions Both

                                                                <a href="http://sellers.bulkhouse.in/export_terms" target="_blank">Export</a><span> &amp; </span>

                                                                <a href="http://sellers.bulkhouse.in/domestic_terms" target="_blank">Domestic</a>

                                                            </span>

                                                        </label>

                                                            -->

                                                    </center>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <center>
                                                        <a class="waves-effect waves-light red darken-1 btn" href="#" onclick="form_submit()"><font><font class="">Register</font></font></a>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $('#submit').click(function () {
                        var form_data = {
                            first_name: $('#first_name').val(),
                            last_name: $('#last_name').val(),
                            email: $('#email').val(),
                            phone: $('#phone').val(),
                            category: $('#category').val(),
                            message: $('#message').val()
                        };
                        $.ajax({
                            url: "<?php echo base_url(); ?>/register/enquiry",
                            type: 'POST',
                            data: form_data,
                            success: function (msg) {

                                if (msg == 'yes')
                                    $('#alert-msg').html('<div class="alert alert-success text-center">Your mail has been sent successfully!</div>');
                                else if (msg == 'no')
                                    $('#alert-msg').html('<div class="alert alert-danger text-center">Error in sending your message! Please try again later.</div>');
                                else
                                    $('#alert-msg').html('<div class="alert alert-danger ">' + msg + '</div>');
                            }
                        });
                        return false;
                    });
                </script>

                <script>
                    $(window).load(function () {

                        $('.compliance-ul p').hide();
                    });
                    $(document).ready(function () {
                        $('.compliance-ul h2').click(function () {
                            $('.compliance-ul p').not().slideUp();
                            $(this).next('p').toggle();

                        });
                    });


                </script>
                <script>
                    $('.compliance-ul').on('click', 'li', function () {
                        $('.compliance-ul li.active').removeClass('active');
                        $(this).addClass('active');
                    });
                </script>

                <!-- Smoth mouse scroll js
                <script src="/landing_assets/js/mouse-scroll/owl.carousel.min.js" type="text/javascript"></script>
                <script src="/landing_assets/js/mouse-scroll/owl.carousel.js" type="text/javascript"></script>

                <script>
                var owl = $('.owl-carousel');
                owl.owlCarousel({
                    loop:false ,
                    nav:true,
                    margin:0,
                    responsive:{
                        0:{
                            items:1
                        },
                        50:{
                            items:1
                        },
                       50:{
                            items:1
                        },
                        50:{
                            items:1
                        }
                    }
                });
                owl.on('mousewheel', '.owl-stage', function (e) {
                    if (e.deltaY>0) {
                        owl.trigger('next.owl');
                    } else {
                        owl.trigger('prev.owl');
                    }
                    e.preventDefault();
                });
                </script>-->
              
