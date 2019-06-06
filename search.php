<?php require_once('header.php');

$value = $_POST['value'];

$sql = 'SELECT p.id as id, p.cat_id as cat_id, p.intro as intro, 
p.date_added as date_added, p.imagesrc as imagesrc, p.content as content, 
p.title as title, c.name as category, u.nick as nick, p.visitors as visitors
FROM category c 
INNER JOIN post p 
ON p.cat_id = c.id 
INNER JOIN user u 
ON u.id = p.author_id 
WHERE p.title LIKE "%'.$value.'%" OR u.nick LIKE "%'.$value.'%" OR c.name LIKE "%'.$value.'%"
ORDER BY p.date_added DESC';

$result = $conn->query($sql);

?>
    <div class="row">
        <section id="post" class="col-lg-8">
            <h2 class="title">Wyniki wyszukiwania dla <i><?= $value ?></i></h2>
                <ul class="post-list">
            <?php if ($result->num_rows): ?> 
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
            <?php else: ?>
                <p><i>Niestety, nic nie znaleziono</i></p>
            <?php endif; ?>
            </ul>
        </section>
    <?php require_once('sidebar.php'); ?>
  </div>
  <?php require_once('footer.php'); ?>