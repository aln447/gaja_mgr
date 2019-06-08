<?php require_once('header.php')?>
            <div class="row">
                <section id="registration" class="col-lg-8">
                    <h2 class="title">Dodaj post!</h2>
                    <form method="post" action="be/add_post_handle.php" accept-charset="utf-8">
                        <div class="form-group">
                            <label for="username">Nazwa</label>
                            <input type="text" class="form-control" name="title"
                                placeholder="Tytuł" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Kategoria</label>
                            <select class="form-control" name="category">
                                <option disabled selected value> -- Wybierz kategorie -- </option>
                                <?php 
                                
                                $sql = "SELECT * from category ORDER BY name";
                                $result = $conn->query($sql);
                                
                                while($row = $result->fetch_assoc()) { 
                                    
                                    echo(sprintf('<option value="%d">%s</option>', $row['id'],$row['name']));
                                 }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="imagesrc">Link do okładki</label>
                            <input type="text" class="form-control" name="imagesrc"
                                placeholder="W razie braku, zostanie zastosowana jedna z naszych okładek bazowych :)">
                                
                                </div>
                        <div class="form-group">
                            <label for="intro">Którki opis</label>
                            <textarea class="form-control" id="intro" rows="3"  name="intro" required placeholder="Krótka historia o tym jak..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="content text-primary" >Twoja historia: </label>
                            <textarea class="form-control" id="content" rows="25" name="content" required placeholder="Dawno, dawno temu..."></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">Dodaj!!</button>
                        </div>
                    </form>
                </section>
          <?php require_once('sidebar.php'); ?>
  </div>
  <?php require_once('footer.php'); ?>