<?php require_once('header.php');

$sql = sprintf('SELECT p.id as id, p.cat_id as cat_id, p.intro as intro, p.author_id as author_id,
p.date_added as date_added, p.imagesrc as imagesrc, p.content as content, 
p.title as title, c.name as category, u.nick as nick, p.visitors as visitors
FROM category c 
INNER JOIN post p 
ON p.cat_id = c.id 
INNER JOIN user u 
ON u.id = p.author_id 
ORDER BY p.visitors DESC');

$result = $conn->query($sql);

$postList = [];

while($post = $result->fetch_assoc()) {
  $postList[] = $post;
}


//REMOVE THE TOP 3 POSTS AND PLACE THEM IN SPECIAL VARS
$post1 = $postList[0];
unset($postList[0]);

$post2 = $postList[1];
unset($postList[1]);

$post3 = $postList[2];
unset($postList[2]);

?>

      <section id="top3">
        <h2 class="title top-title">Top3</h2>
        <div class="top bg-rose navbar">
          <div class="top__half">
            <div class="top__field top__field--1" onclick="window.location.href='post.php?id=<?= $post1['id'] ?>'">
              <div class="top__field__info">
                <h2><?= $post1['title'] ?></h2>
                <a href="<?php echo 'cat.php?id='.$post1['cat_id'] ?>"><?php echo $post1['category'] ?></a>
                <p><a href="<?= $post1['author_id'] ?>"><?= $post1['nick'] ?></a> | <?= $post1['date_added'] ?></p>
                <p><?= $post1['intro'] ?></p>
                <p class="top__stats">Przeczytane przez: <?= $post1['visitors'] ?></p>
              </div>
              <div class="top__field__bg top__field__bg--1" style="background-image: url(<?= $post1['imagesrc'] ?>);"></div>
            </div>
          </div>
          <div class="top__half">
            <div class="top__field top__field--2" onclick="window.location.href='post.php?id=<?= $post2['id'] ?>'">
              <div class="top__field__info">
                <h3><?= $post2['title'] ?></h3>
                <a href="<?php echo 'cat.php?id='.$post2['cat_id'] ?>"><?php echo $post2['category'] ?>
                <p><a href="<?= $post2['author_id'] ?>"><?= $post2['nick'] ?></a> | <?= $post2['date_added'] ?></p>
                <p class="ellipsis"><?= $post2['intro'] ?></p>
                <p class="top__stats">Przeczytane przez: <?= $post2['visitors'] ?></p>
              </div>
              <div class="top__field__bg top__field__bg--2" style="background-image: url(<?= $post2['imagesrc'] ?>);"></div>

            </div>
            <div class="top__field top__field--2" onclick="window.location.href='post.php?id=<?= $post3['id'] ?>'">
              <div class="top__field__info">
                <h3><?= $post3['title'] ?></h3>
                <a href="<?php echo 'cat.php?id='.$post3['cat_id'] ?>" ><?php echo $post3['category'] ?></a>
                <p><a href="<?= $post3['author_id'] ?>"><?= $post3['nick'] ?></a> | <?= $post3['date_added'] ?></p>
                <p class="ellipsis"><?= $post3['intro'] ?></p>
                <p class="top__stats">Przeczytane przez: <?= $post3['visitors'] ?></p>
              </div>
              <div class="top__field__bg top__field__bg--3" style="background-image: url(<?= $post3['imagesrc'] ?>);"></div>

            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <section id="popular" class="col-lg-8">
            <h2 class="title">
              Popularne 
            </h2>
            <div>
            </div>
            <ul class="post-list">
              <?php foreach($postList as $post): ?>
                    <li class="post material-hover" onclick="window.location.href='<?php echo 'post.php?id=' . $post['id'] ?>'">
                        <div class="post__thumbnail" style="background-image: url(<?php echo $post['imagesrc'] ?>);"> </div>
                        <div class="post__info">
                          <h4 class="title"><a href="<?php echo 'post.php?id=' . $post['id'] ?>"><?php echo $post['title'] ?></h4>
                          <p><a href="<?php echo 'cat.php?id='.$post['cat_id'] ?>" class="badge badge-pill badge-primary"><?php echo $post['category'] ?></a></p>
                          <p><a href="<?php echo 'user.php?id=' . $post['author_id'] ?>"><?php echo $post['nick'] ?></a> | <?php echo $post['date_added'] ?></p>
                          <p><?php echo $post['intro'] ?></p>
                          <p class="post__stats">Przeczytane przez:<?php echo $post['visitors'] ?></p>
                          
                        </div>
                      </li>
                <?php endforeach; ?>
            </ul>
          <!--  <ul class="pagination pagination-info">-->
          <!--    <li class="active page-item">-->
          <!--      <a href="javascript:void(0);" class="page-link">1</a>-->
          <!--    </li>-->
          <!--    <li class="page-item">-->
          <!--      <a href="javascript:void(0);" class="page-link">2</a>-->
          <!--    </li>-->
          <!--    <li class="page-item">-->
          <!--      <a href="javascript:void(0);" class="page-link">3</a>-->
          <!--    </li>-->
          <!--    <li class="page-item">-->
          <!--      <a href="javascript:void(0);" class="page-link">4</a>-->
          <!--    </li>-->
          <!--    <li class="page-item">-->
          <!--      <a href="javascript:void(0);" class="page-link">5</a>-->
          <!--    </li>-->
          <!--    <li class="page-item">-->
          <!--      <a href="javascript:void(0);" class="page-link">następna</a>-->
          <!--    </li>-->
          <!--  </ul>-->
          </section>
          <?php require_once('sidebar.php'); ?>
  </div>
  <?php require_once('footer.php'); ?>