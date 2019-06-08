<?php require_once('header.php');

$sql = sprintf('SELECT * from user WHERE id = "%d"', $_GET['id']);
$result = $conn->query($sql);

$user = $result->fetch_assoc();

$bday = new DateTime($user['birthday']);

$bdayFormat = $createDate->format('Y-m-d');

$sql = sprintf('SELECT p.id as id, p.cat_id as cat_id, p.intro as intro, p.author_id as author_id,
p.date_added as date_added, p.imagesrc as imagesrc, p.content as content, 
p.title as title, c.name as category, u.nick as nick, p.visitors as visitors
FROM category c 
INNER JOIN post p 
ON p.cat_id = c.id 
INNER JOIN user u 
ON u.id = p.author_id 
WHERE u.id = "%d"
ORDER BY p.date_added DESC', $_GET['id']);


$result = $conn->query($sql);

?>
    <div class="row">
        <section id="post" class="col-lg-8">
            <h2 class="title">Twoje konto:</h2>
                <p>Nazwa użytkownika: <b><?php echo $user['nick'] ?></b></p>
                <?php if ($user['firstname']): ?>
                    <p>Imię: <b><?php echo $user['firstname'] ?></b></p>
                <?php endif; ?>
                <?php if ($user['lastname']): ?>
                    <p>Nazwisko: <b><?php echo $user['lastname'] ?></b></p>
                <?php endif; ?>
                <p>Status: <b><?php echo $user['status'] ?></b></p>
                <p>Data urodzenia: <b><?php echo $bdayFormat ?></b></p>
                <?php if ($user['bio']): ?>
                <p>Bio: <b><?php echo $user['bio'] ?></b></p>
                <?php endif; ?>
                <hr>
                <h3>Posty</h3>
                <ul class="post-list">
                <?php while($post = $result->fetch_assoc()): ?>
                    <li class="post material-hover" onclick="window.location.href='<?php echo 'post.php?id=' . $post['id'] ?>'">
                        <div class="post__thumbnail" style="background-image: url(<?php echo $post['imagesrc'] ?>);"> </div>
                        <div class="post__info">
                          <h4 class="title"><a href="<?php echo 'post.php?id=' . $post['id'] ?>"><?php echo $post['title'] ?></h4>
                          <p><a href="<?php echo 'cat.php?id='.$post['cat_id'] ?>" class="badge badge-pill badge-primary"><?php echo $post['category'] ?></a></p>
                          <p><a href="<?php echo 'user.php?id=' . $post['author_id'] ?>"><?php echo $post['nick'] ?></a> | <?php echo $post['date_added'] ?></p>
                          <p><?php echo $post['intro'] ?></p>
                          <p class="post__stats">Przeczytane przez: <?php echo $post['visitors'] ?></p>
                          
                        </div>
                      </li>
                <?php endwhile; ?>
                </ul>
        </section>
    <?php require_once('sidebar.php'); ?>
  </div>
  <?php require_once('footer.php'); ?>