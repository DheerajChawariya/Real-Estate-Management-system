<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}

$error = "";
$msg = "";

// Check if the user is submitting the registration form
if(isset($_POST['edit'])) {
    // Check if the user is submitting the edit form
    $user_id = $_SESSION['uid']; // Assuming you have a user session
    $user_name = $_POST['edit_user_name'];
    $user_email = $_POST['edit_user_email'];
    $user_phone = $_POST['edit_user_phone'];

    // Validate and update the user details in the database
    if (!empty($user_name) && !empty($user_email) && !empty($user_phone)) {
        $update_query = "UPDATE user SET uname='$user_name', uemail='$user_email', uphone='$user_phone' WHERE uid='$user_id'";
        $update_result = mysqli_query($con, $update_query);

        if ($update_result) {
            $msg = "<p class='alert alert-success'>Details Updated Successfully</p> ";
        } else {
            $error = "<p class='alert alert-warning'>Details Not Updated Successfully</p> ";
        }
    } else {
        $error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
    }
}

// Fetch the user details for display
$user_id = $_SESSION['uid']; // Assuming you have a user session
$user_details_query = "SELECT * FROM user WHERE uid='$user_id'";
$user_details_result = mysqli_query($con, $user_details_query);
$user_details = mysqli_fetch_assoc($user_details_result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Css Link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	<!--    Title   -->
	<title>Real Estate Seller</title>
    <link rel="icon" type="image/x-icon" href="web_icon/web-logo.png">
	</head>
<!-- ... (your existing HTML code) ... -->

<body>
    <!-- ... (your existing HTML code) ... -->

    <section class="section-class">
        <!--	Header start  -->
		<?php include("include/header.php");?>
        <!--	Header end  -->
        <div class="profile-page">
            <div class="profile-page-container " style ="text-align:center">
                <div class="profile-page-card">
                    <div class="profile-page-card-content">
                        <h1>EDIT PROFILE</h1>
                        <p class="account-subtitle">UPDATE YOUR DETAILS</p>
                        <?php echo $error; ?><?php echo $msg; ?>
                        <!-- Form for editing user details -->
                        <form method="post" enctype="multipart/form-data">
                            <div class="profile-form-group" style="margin:30px">
                                <input type="text" name="edit_user_name" class="form-control" placeholder="Your Name"
                                    value="<?php echo $user_details['uname']; ?>" required>
                            </div>
                            <div class="profile-form-group" style="margin:30px">
                                <input type="email" name="edit_user_email" class="form-control" placeholder="Your Email"
                                    value="<?php echo $user_details['uemail']; ?>" required>
                            </div>
                            <div class="profile-form-group" style="margin:30px">
                                <input type="text" name="edit_user_phone" class="form-control" placeholder="Your Phone"
                                    maxlength="10" value="<?php echo $user_details['uphone']; ?>" required>
                            </div>
                            <br>
                            <button style="width:65px; margin-bottom:20px" class="profile-button" name="edit" value="Edit" type="submit">EDIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--	Footer   start-->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->
    </section>
</body>

</html>