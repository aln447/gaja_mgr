<?php require_once('connect.php') ?>
<!doctype html>
<html lang="en">
  
  <?php 
    
    $userId = $_SESSION['user_id'];
    $userName = $_SESSION['user_name'];
    $flashError = $_SESSION['flash_error'];
    
  ?>

<head>
  <title>Gaja.pl</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-kit.css?v=2.0.5" rel="stylesheet" />
  <!-- Custom styling -->
  <link href="assets/css/style.css" rel="stylesheet" />
</head>

<?php 

  if ($flashError) {
    echo ( '<div class="alert alert-danger">' .
            '<div class="container">'.
              '<div class="alert-icon">'.
                '<i class="material-icons">error_outline</i>'.
              '</div>'.
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
                '<span aria-hidden="true"><i class="material-icons">clear</i></span>'.
              '</button>'.
              '<b>Problem:</b>'.$flashError.
        '</div></div>');
  }

?>

<body>
  <nav class="bottom-panel text-center">
    <div class="panel__button material-hover">
      <a href="index.php" class="nav-link">
        <i class="fa fa-fire"></i> Top
      </a>
    </div>
    <div class="panel__button material-hover">
      <a href="#" class="nav-link">
        <i class="fa fa-clock-o"></i> Najnowsze
      </a>
    </div>
    <div class="panel__button material-hover">
            <a href="#pablo" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false"><i
                class="fa fa-book"></i>Kategorie<div class="ripple-container"></div></a>
            <div class="dropdown-menu">
              <h6 class="dropdown-header">Kategorie</h6>
              <?php 
                $sql = "SELECT * from category ORDER BY name LIMIT 5";
                $result = $conn->query($sql);
              
                while($row = $result->fetch_assoc()) { 
                    echo(sprintf('<a href="cat.php?id=%d" class="dropdown-item">%s</a>', $row['id'],$row['name']));
                }
              ?>
              <div class="dropdown-divider"></div>
              <a href="kategorie.php" class="dropdown-item">Wszystkie kategorie</a>
            </div>
    </div>
    <div class="panel__button material-hover">
      <a href="index.php#search" class="nav-link">
        <i class="fa fa-search"></i> Szukaj
      </a>
    </div>
    <div class="panel__button material-hover">
      <?php if ($userId) : ?>
            <div class="dropdown nav-item">
              <a href="#pablo" class="dropdown-toggle nav-link text-danger" data-toggle="dropdown" aria-expanded="false"><i
                  class="fa fa-user"></i><?php echo $userName ?><div class="ripple-container"></div></a>
              <div class="dropdown-menu">
                <h6 class="dropdown-header">Konto</h6>
                <a href="<?php echo 'user.php?id=' . $userId ?>" class="dropdown-item"><i class="fa fa-user"></i> Moje dane</a>
                <a href="add_post.php" class="dropdown-item"><i class="fa fa-plus"></i> Dodaj post</a>
                <div class="dropdown-divider"></div>
                <a href="be/logout.php" class="dropdown-item"><i class="fa fa-sign-out"></i> Wyloguj</a>
              </div>
            </div>
          <?php else : ?>
            <div class="nav-item">
              <a href="#" class="btn btn-danger btn-sm " data-toggle="modal" data-target="#myModal">
                <i class="fa fa-user"></i> Konto
              </a>
            </div>
          <?php endif; ?>
    </div>
  </nav>
  <nav class="navbar fixed-top navbar-expand-lg" color-on-scroll="100">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="index.php">
          <b>Gaja.pl</b> - Dom najpiękniejszych historii</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="fa fa-fire"></i> Top
            </a>
          </li>
          <li class="nav-item">
            <a href="new.php" class="nav-link">
              <i class="fa fa-clock-o"></i> Najnowsze
            </a>
          </li>
          <li class="dropdown nav-item">
            <a href="#pablo" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false"><i
                class="fa fa-book"></i>Kategorie<div class="ripple-container"></div></a>
            <div class="dropdown-menu">
              <h6 class="dropdown-header">Kategorie</h6>
              <?php 
                $sql = "SELECT * from category ORDER BY name LIMIT 5";
                $result = $conn->query($sql);
              
                while($row = $result->fetch_assoc()) { 
                    echo(sprintf('<a href="cat.php?id=%d" class="dropdown-item">%s</a>', $row['id'],$row['name']));
                }
              ?>
              <div class="dropdown-divider"></div>
              <a href="kategorie.php" class="dropdown-item">Wszystkie kategorie</a>
            </div>
          </li>
          
          <?php if ($userId) : ?>
            <li class="dropdown nav-item">
              <a href="#pablo" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false"><i
                  class="fa fa-user"></i><?php echo $userName ?><div class="ripple-container"></div></a>
              <div class="dropdown-menu">
                <h6 class="dropdown-header">Konto</h6>
                <a href="<?php echo 'user.php?id=' . $userId ?>" class="dropdown-item"><i class="fa fa-user"></i> Moje dane</a>
                <a href="add_post.php" class="dropdown-item"><i class="fa fa-plus"></i> Dodaj post</a>
                <div class="dropdown-divider"></div>
                <a href="be/logout.php" class="dropdown-item"><i class="fa fa-sign-out"></i> Wyloguj</a>
              </div>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a href="#" class="btn btn-danger btn-sm " data-toggle="modal" data-target="#myModal">
                <i class="fa fa-user"></i> Konto
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
  
    <div class="main-container">
    <div class="container">
