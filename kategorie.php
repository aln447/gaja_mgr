<?php require_once('header.php');

$sql = "SELECT * from category ORDER BY name";
$result = $conn->query($sql);


?>
    <div class="row">
        <section id="post" class="col-lg-8">
            <h2 class="title">Kategorie</h2>
            <ul style="list-style: none">
            <?php 
                while($row = $result->fetch_assoc()) { 
                    echo(sprintf('<li><a href="cat.php?id=%d" class="btn btn-primary">%s</a></li>', $row['id'],$row['name']));
                }
            ?>
            </ul>
            </section>
    <?php require_once('sidebar.php'); ?>
  </div>
  <?php require_once('footer.php'); ?>