<!--Navigationbar-->
<nav>
        <!--Logo -->
        <div class="logo-name">
            <a href="admin/login.php" style="margin-left:10px; color:white;">Real E-State</a>
        </div>
        <!--NavBar-->
        <ul class="navigation">
            <!--Home Tab-->
            <li><a href="index.php">Home</a></li>
            <!--Properties Tab-->
            <li><a href="property.php">Properties</a></li>
            <!--About Tab-->
            <li><a href="about.php">About</a></li>
            <!--Contact Tab-->
            <li><a href="contact.php">Contact</a></li>
            <!--Account Tab-->
            <?php  if(isset($_SESSION['uemail']))
			{ ?>
            <li class="has-submenu">
                <a id="subspecial" href="#">Account</a>
                <ul class="submenu">
                    <li><a href="profile.php">Profile</a></li>
                    <li id="logout"><a href="logout.php">Log Out</a></li>
                </ul>
            </li>
            <?php } else 
                { ?>
					<li> <a href="login.php">Login/Register</a> </li>
					<?php } ?>
        </ul>
    </nav>
    <!--Navigation Bar End -->