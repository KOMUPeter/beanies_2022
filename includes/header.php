<?php
session_start();
require_once "includes/autoload.php";
require_once "includes/variable.php";
require_once "includes/function.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="?page=home">Big Sales</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?page=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?page=list">Table Price</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?page=cart">Add to Cart</a>
        </li>
        <?php if (isset($_SESSION['username'])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="?page=login"><?= $_SESSION['username']; ?></a>
        </li>
        <?php } else { ?> 
          <li class="nav-item">
            <a class="nav-link" href="?page=login">Sign In</a>
          </li>
          <?php } ?> 
          <li class="nav-item">
            <a class="nav-link" href="?page=logout">Sign Out</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=contact">Contact</a>
          </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<!-- show alert connection and disconnection message  -->

<?php
if (isset($_GET['login']) && $_GET['login'] == 'success') {
?>
<div class="alert alert-success" role="alert">
  Your are connected !
</div>
<?php } ?>

<?php
if (isset($_GET['logout']) && $_GET['logout'] == 'success') {
?>
<div class="alert alert-success" role="alert">
  Your are disconnected !
</div>
<?php } ?>

