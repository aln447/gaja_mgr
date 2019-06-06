<div class="col sidebar">
            <section id="search" class="search">
              <h3 class="title">Wyszukaj</h3>
              <form class="form-inline ml-auto" action="search.php" method="POST">
                <div class="form-group bmd-form-group">
                  <input type="text" class="form-control" name="value" placeholder="Szukaj nazw, autorów, tagów etc...">
                </div>
                <button type="submit" class="btn btn-raised btn-fab btn-round btn-primary">
                  <i class="material-icons">search</i>
                </button>
              </form>
            </section>
            <section id="categories">
              <h3 class="title">Gatunki</h3>
              <div class="cat_list">
                <?php 
                
                    $sql = "SELECT * from category ORDER BY name LIMIT 10";
                    $result = $conn->query($sql);
                
                  while($row = $result->fetch_assoc()) { 
                
                echo(sprintf('<a href="/cat.php?id=%d" class="btn btn-primary">%s</a>', $row['id'],$row['name']));
            }
                ?>
                <hr>
                <a href="kategorie.php" class="btn btn-success">Pełen spis gatunków</a>
              </div>
            </section>
            <hr>
          </div>

        </div>

    </div>
  </div>