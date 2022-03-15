<?php

session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: /");
}

if(!empty($_POST['password'])):

	$message = '';

	if($_POST['password'] == "SuperSecretPassword"){
        $message = file_get_contents('./secrets/secret_1.txt', true);
	} elseif ($_POST['password'] == "AnotherSuperSecretPassword"){
        $message = file_get_contents('./secrets/secret_2.txt', true);
	} else {
		$message = 'Sorry, the password is wrong';
	}

endif;

?>

    <!-- Header section  -->
<?php include("header.php") ?>

    <!-- Main section  -->
    <div class="container">

        <h1>Secrets</h1>
        <p>Stuff I don't want to forget</p>

        <!-- Password: SuperSecretPassword  -->
        <form action="secrets.php" method="POST">
            
            <input type="password" placeholder="Enter your password" name="password">

            <input type="submit">

        </form>

        <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>

    </div>

    <!-- Footer section  -->
<?php include("footer.php") ?>