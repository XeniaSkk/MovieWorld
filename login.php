<?php 
    include 'header.php';
    include_once 'account.php';

    $account = new Account($con);

    if(isset($_POST["submit"])) {

        $username = ($_POST["username"]);
        $password = ($_POST["password"]);

        $wasSuccessful = $account->login($username, $password);

        if($wasSuccessful) {
            $_SESSION["userLoggedIn"] = $username;
            header("Location: index.php");
        }
    }
?>



<section class="p-5">
    <h2>Log In!</h2>

    <form action="login.php" method="POST">
        <div class="form-group pt-3">
            <input class="form-control" type="text" name="username" placeholder="Username" required>
        </div>
        <div class="form-group pt-3">
            <input class="form-control" type="password" name="password" placeholder="Password" required>
        </div>
        <div class="form-group pt-3">
            <button class="btn-primary" type="submit" name="submit">Log In</button>
        </div>
    </form>
</section>
