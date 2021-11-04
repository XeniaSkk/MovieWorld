<?php
include 'header.php';
include_once 'moviesview.php';

$movieview = new Moviesview($con);
$movie = $movieview->moviesItems($con);


?>
<div class="container">
<form action ='' method='GET'>
  <div class="checkbox">
    <h6>Sort by: </h6>
    <label><input type="radio" name="sortby" value="date" checked>Dates</label>
  </div>
  <div class="checkbox">
    <label><input type="radio" name="sortby" value="dislikes">dislikes</label>
  </div>
  <div class="checkbox disabled">
    <label><input type="radio" name="sortby" value="likes">likes</label>
  </div>
</form>


<?php while ($row = $movie->fetch(PDO::FETCH_ASSOC)): ?>

<div class="card">
  <div class="card-body">
    <h5 class="card-title"><?= $row['title']?></h5>
    <p class="card-text"><?= date('d-m-Y', strtotime($row['publicationdate']))?></p>
    <p class="card-text"><?= $row['description']?></p>
    <p class="card-text"><?= $row['likes']?> Likes</p>
    <p class="card-text"><?= $row['dislikes']?> Dislikes</p>
    <a href="#" class="card-link"><?= $row['user']?></a>
    <?php if (isset($_SESSION["userLoggedIn"]) && $row['user'] != $_SESSION["userLoggedIn"]): ?>
      <a href="#" class="card-link">Like</a>
      <a href="#" class="card-link">Dislike</a>
    <?php endif ?>
  </div>
</div>


<?php endwhile ?>
</div>






</body>
</html>