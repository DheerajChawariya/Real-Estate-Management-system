<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamer Gallery</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body>
    <!--Navigationbar-->
    <?php include("include/header.php");?>
    <!--Navigation Bar End -->

    <!-- Contact Section -->
    <section class="contact-section">
        <!-- Heading -->
        <h1 class="contact-page-heading">Contact Us</h1>
        <!-- Main Container Hold Form Or Contact Detail -->
        <div class="main-container">
            <div class="container">
                <!-- Contact Us Area -->
                <h3 class="contact-heading">Contact Us</h3>
                <!-- Address -->
                <div class="co-co-element">
                    <p><i class="fa fa-map-marker contact-icon"></i><strong> &nbsp ADDRESS:</strong><br> Borkhera, Kota, Rajasthan
                        India </a></p>
                </div>
                <!-- Phone -->
                <div class="co-co-element">
                    <p><i class="fa fa-phone contact-icon"></i><strong> &nbsp PHONE:</strong><br> &nbsp &nbsp &nbsp <a href="tel://1234567920">+ 1235 2355 98</a>
                    </p>
                </div>
                <!-- Email -->
                <div class="co-co-element">
                    <p><i class="fa fa-paper-plane contact-icon"></i><strong> &nbsp EMAIL:</strong><br> &nbsp &nbsp &nbsp <a href="mailto:info@yoursite.com">dheerajkumar6112003@gmail.com</a></p>
                </div>
                <!-- Website -->
                <div class="co-co-element">
                    <p><i class="fa fa-globe contact-icon"></i><strong> &nbsp WEBSITE:</strong><br> &nbsp &nbsp &nbsp <a href="#">yoursite.com</a></p>
                </div>

            </div>
            <div class="container form">
                <!-- Contact Form Area -->
                <h3 class="form-heading">Get In Touch</h3>
                <!-- Form -->
                <form method="POST" action="sendMail.php" id="contactForm" name="contactForm">
                    <div class="row">
                        <!-- Name -->
                        <div class="form-group">
                            <input type="text" class="form-control1" name="name" id="name" placeholder=" Name">
                        </div>
                        <!-- Email -->
                        <div class="form-group">
                            <input type="email" class="form-control1" name="email" id="email" placeholder=" Email">
                        </div>
                        <!-- Subject -->
                        <div class="form-group">
                            <input type="text" class="form-control1" name="subject" id="subject" placeholder=" Subject">
                        </div>
                        <!-- Message Box -->
                        <div class="form-group">
                            <textarea name="message" class="form-control1 fo-co-2" id="message" cols="30" rows="5"
                                placeholder=" Message"></textarea>
                        </div>
                        <!-- Button -->
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary">
                            <div class="submitting"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Soon -->
    <?php include("include/footer.php");?>
    <!-- Footer End -->

</body>

</html>