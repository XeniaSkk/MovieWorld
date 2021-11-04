<?php
    include 'header.php';
    include_once 'movieupload.php';
    
    $movieupload = new movieupload($con);
    $user = $_SESSION["userLoggedIn"];
    
    if(isset($_POST["submit"])) {
        $title = ($_POST["title"]);
    
        $description = ($_POST["description"]);

        $wasSuccessful = $movieupload->upload($title, $description, $user);
    
        if($wasSuccessful) {
            header("Location: index.php");
        }
    
    }


?>





<section class="p-5">
    <h2>Upload Movie</h2>

    <form action="upload.php" method="POST">
        <div class="form-group pt-3">
            <input class="form-control" type="text" name="title" placeholder="Title" required>
            <?php echo $movieupload->getError("Your Title must be between 1 and 20 characters"); ?>
        </div>
        <div class="form-group pt-3">
            <textarea class="form-control" name="description" placeholder="Description" rows="4" required></textarea>
            <?php echo $movieupload->getError("Your Description must be between 1 and 1000 characters"); ?>
        </div>
        <div class="form-group pt-3">
            <button class="btn-primary" type="submit" name="submit">Upload</button>
        </div>
</form>
</section>