<?php 
    include 'header.php';
    include_once 'account.php';

    $account = new Account($con);

    if(isset($_POST["submit"])) {
        $username = ($_POST["username"]);
    
        $password = ($_POST["password"]);
        $password2 = ($_POST["password2"]);
        
        $wasSuccessful = $account->register($username, $password, $password2);
    
        if($wasSuccessful) {
            $_SESSION["userLoggedIn"] = $username;
            header("Location: index.php");
        }
    
    }



?>

<section class="p-5">
    <h2>Sign up!</h2>

    <form action="signup.php" method="POST">
        <div class="form-group pt-3">
            <input class="form-control" type="text" name="username" placeholder="Username" required>
            <?php echo $account->getError("Your username must be between 5 and 25 characters"); ?>
            <?php echo $account->getError("This username already exists"); ?>
        </div>
        <div class="form-group pt-3">
            <input class="form-control" type="password" name="password" placeholder="Password" autocomplete="off" required>
            <?php echo $account->getError("Your passwords do not match"); ?>
            <?php echo $account->getError("Your password can only contain letters and numbers"); ?>
            <?php echo $account->getError("Your password must be between 5 and 30 characters"); ?>
        </div>
        <div class="form-group pt-3">
            <input class="form-control" type="password" name="password2" placeholder="Confirm Password" autocomplete="off" required>
        </div>
        <div class="form-group pt-3">
            <button class="btn-primary" type="submit" name="submit">Sign up</button>
        </div>
</form>
</section>