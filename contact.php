<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/ebb02e5adb.js" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrapCss/bootstrap-grid.css">
    <!-- StyleSheet -->
    <link rel="stylesheet" href="dist/style.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- stickyHeader -->
    <script src="dist/stickyHeader.js" defer></script>
    <!-- mobileMenu -->
    <script src="dist/mobileMenu.js" defer></script>
    <!-- contactForm -->
    <script src="dist/contactForm.js" defer></script>
</head>
<body>
    <?php require_once "inc/bootstrap.php" ?>
    <?php require_once "inc/sideMenu.php" ?>
    <div id="mainPage" class="mainPage">
        <?php require "inc/header.php" ?>
        <hr class="d-none d-md-block d-lg-none navLocLine">
        <div class="container d-none d-md-block navLoc">
            <small class=""><a href="index.php">Home</a> / How Can We Help You?</small>
        </div>
        <div class="contactMainConBG">
            <div class="container contactMainCon">
                <div class="row removeColPadding">
                    <div class="col-12 removeColPadding"> 
                        <h1>How Can We Help You?</h1>
                    </div>
                </div>
                <div class="row removeColPadding">
                    <div class="container removeColPadding contactDetails col-12 col-xl-4 order-xl-last">
                        <div class="col-12 removeColPadding"><strong>Call us on:</strong></div>
                        <div class="col-12 officeHolder container removeColPadding"</div>
                            <div class="col-12 officeName">Wymondham Office:</div>
                            <div class="col-12 officeNumber"><a href="#">01603 70 40 20</a></div>
                        </div>
                        <div class="col-12 officeHolder container removeColPadding"</div>
                            <div class="col-12 officeName">Gorleston Office:</div>
                            <div class="col-12 officeNumber"><a href="#">01493 60 32 04</a></div>
                        </div>
                        <div class="col-12 officeHolder container removeColPadding"</div>
                            <div class="col-12 removeColPadding"><strong>Email us on:</strong></div>
                            <div class="col-12 officeNumber"><a href="#">sales@netmatters.com</a></div>
                        </div>

                        <div class="col-12 removeColPadding"><strong>Business hours:</strong></div>
                        <div class="col-12 removeColPadding"><strong>Monday - Friday 07:00 - 18:00</strong></div>

                        <div class="col-12 removeColPadding"><strong>Out of Hours IT Support <i class="fas fa-chevron-down"></i></strong></div>
                    </div>
                    <div class="col-12 col-xl-8 order-xl-first removeColPadding">
                        <form action="" class="contactForm container removeColPadding" id="contactForm">
                            <div class="row removeColPadding">
                                <div class="col-12 col-lg-6 contactPart lg-rp">
                                    <label for="full_name">Your Name <span class="text-danger">*</span><span id="full_name_error" class="d-none text-danger formError">Name is required!</span></label>
                                    <input type="text" name="full_name" id="full_name">
                                </div>
                                <div class="col-12 col-lg-6 contactPart lg-lp">
                                    <label for="email">Your Email <span class="text-danger">*</span><span id="email_error" class="d-none text-danger formError">Valid email required!</span></label>
                                    <input type="email" name="email" id="email">
                                </div>
                                <div class="col-12 col-lg-6 contactPart lg-rp">
                                    <label for="phone">Your Telephone Number <span class="text-danger">*</span><span id="phone_error" class="d-none text-danger formError">Valid phone required!</span></label>
                                    <input type="phone" name="phone" id="phone">
                                </div>
                                <div class="col-12 col-lg-6 contactPart lg-lp">
                                    <label for="subject">Subject <span class="text-danger">*</span><span id="subject_error" class="d-none text-danger formError">Subject required!</span></label>
                                    <input type="text" name="subject" id="subject">
                                </div>
                                <div class="col-12 contactPart">
                                    <label for="message">Message <span class="text-danger">*</span><span id="message_error" class="d-none text-danger formError">Message required!</span></label>
                                    <textarea name="message" id="message"></textarea>
                                </div>
                                <div class="col-12 checkMarketing">
                                    <div class="checkHolder">
                                        <input type="checkbox" class="form-check-input" id="newsletterMarketing">
                                        <span class="holderThing"><span class="fas fa-check"></span></span>
                                    </div>
                                    <div>
                                        <label class="form-check-label" for="newsletterMarketing">Please tick this box if you wish to receive marketing information from us. Please see our <a href="https://www.netmatters.co.uk/privacy-policy">Privacy Policy</a> for more information on how we use your data. <span id="newsletterMarketing_error" class="d-none text-danger formError"></span> </label>
                                    </div>
                                </div>
                                <div class="col-12 contactPart">
                                    <button type="button" class="btn text-uppercase" id="contactSubmit">Send Enquiry</button>
                                </div>
                            </div>
                            <div id="preSCover" class="d-none">
                                <div>
                                    <i class="far fa-check-circle"></i>
                                    <span>Message Recieved</span>
                                    <p>We will reply to you shortely if necessary</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 

        <?php require "inc/footer.php"  ?>
    </div>
</body>
</html>