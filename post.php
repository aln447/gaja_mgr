<?php require_once('header.php');

$id = $_GET['id'];

$sql = sprintf('SELECT * from post WHERE id = %d', $id);
$result = $conn->query($sql);
$post = $result->fetch_assoc();

//update visitors
$visitors = $post['visitors'] + 1;

$sql = sprintf('UPDATE post SET visitors = %d WHERE id = %d', $visitors, $id);
$conn->query($sql);

//get user 

$sql = sprintf('SELECT nick from user WHERE id = %d', $post['author_id']);
$result = $conn->query($sql);
$author = $result->fetch_assoc()['nick'];

//get category
$sql = sprintf('SELECT name from category WHERE id = %d', $post['cat_id']);
$result = $conn->query($sql);
$category = $result->fetch_assoc()['name'];

?>
            <div class="row">
                <section id="post" class="col-lg-8">

                    <h1><?php echo $post['title'] ?></h1>
                    <p>Kategoria: <a href="<?php echo ('top.php?id=' . $post['cat_id']) ?>"> <?php echo $category ?></a></p>
                    <p>Autor: <a href="user.php?id=<?php echo $post['author_id'] ?>"><?php echo $author ?></a> | <?php echo $post['date_added'] ?></p>
                    <p class="post__stats"><?php echo $visitors ?> wejść</p>
                    <hr>
                    <p><b><?php echo $post['intro'] ?></b></p>
                    <div class="thumb" style="background-image: url(<?php echo $post['imagesrc'] ?>);"></div>
                    <p><?php echo $post['content'] ?></p>

                    <hr>

                    <!--<hr>-->
                    <!--<h2>Komentarze</h2>-->
                    <!--<div class="new-comment">-->
                    <!--    <h3>Dodaj komentarz</h3>-->
                    <!--    <form action="">-->
                    <!--        <div class="form-group"><label for="nick">Twój nick</label><input type="text"-->
                    <!--                class="form-control" required></div>-->
                    <!--        <div class="form-group"><label for="comment">Komentarz</label>-->
                    <!--            <textarea name="comment" id="" rows="3" class="form-control" required></textarea>-->
                    <!--        </div>-->
                    <!--        <div class="form-group text-right">-->
                    <!--            <button type="submit" class="btn btn-primary">Dodaj komentarz</button>-->
                    <!--        </div>-->
                    <!--    </form>-->
                    <!--</div>-->
                    <!--<hr>-->
                    <!--<div class="comment-list">-->
                    <!--    <div class="comment">-->
                    <!--        <p class="comment__content" style="font-style: itallic;">Lorem ipsum dolor sit amet-->
                    <!--            consectetur adipisicing elit. Doloribus nobis cumque placeat ea delectus soluta, aliquam-->
                    <!--            et omnis quis facere.</p>-->
                    <!--        <p class="comment__data">Od <a href="#">User</a> | 23.11.19r.</p>-->
                    <!--    </div>-->
                    <!--    <div class="comment">-->
                    <!--        <p class="comment__content" style="font-style: itallic;">Lorem ipsum dolor sit amet-->
                    <!--            consectetur adipisicing elit. Doloribus nobis cumque placeat ea delectus soluta, aliquam-->
                    <!--            et omnis quis facere.</p>-->
                    <!--        <p class="comment__data">Od <a href="#">User</a> | 23.11.19r.</p>-->
                    <!--    </div>-->
                    <!--    <div class="comment">-->
                    <!--        <p class="comment__content" style="font-style: itallic;">Lorem ipsum dolor sit amet-->
                    <!--            consectetur adipisicing elit. Doloribus nobis cumque placeat ea delectus soluta, aliquam-->
                    <!--            et omnis quis facere.</p>-->
                    <!--        <p class="comment__data">Od <a href="#">User</a> | 23.11.19r.</p>-->
                    <!--    </div>-->
                    <!--    <div class="comment">-->
                    <!--        <p class="comment__content" style="font-style: itallic;">Lorem, ipsum dolor.</p>-->
                    <!--        <p class="comment__data">Od <a href="#">User</a> | 23.11.19r.</p>-->
                    <!--    </div>-->
                    <!--    <div class="comment">-->
                    <!--        <p class="comment__content" style="font-style: itallic;">Lorem ipsum dolor sit amet-->
                    <!--            consectetur adipisicing elit. Suscipit esse saepe id! Delectus modi nisi quia-->
                    <!--            consequatur. Temporibus facere aliquam ipsa repellat animi ad perferendis! Et officiis-->
                    <!--            enim veniam veritatis?.</p>-->
                    <!--        <p class="comment__data">Od <a href="#">User</a> | 23.11.19r.</p>-->
                    <!--    </div>-->
                    <!--    <div class="comment">-->
                    <!--        <p class="comment__content" style="font-style: itallic;">Lorem ipsum dolor sit amet-->
                    <!--            consectetur adipisicing elit. Doloribus nobis cumque placeat ea delectus soluta, aliquam-->
                    <!--            et omnis quis facere.</p>-->
                    <!--        <p class="comment__data">Od <a href="#">User</a> | 23.11.19r.</p>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<ul class="pagination pagination-warning">-->
                    <!--    <li class="active page-item">-->
                    <!--        <a href="javascript:void(0);" class="page-link">1</a>-->
                    <!--    </li>-->
                    <!--    <li class="page-item">-->
                    <!--        <a href="javascript:void(0);" class="page-link">2</a>-->
                    <!--    </li>-->
                    <!--</ul>-->

                </section>
                
                              <?php require_once('sidebar.php'); ?>
  </div>
  <?php require_once('footer.php'); ?>