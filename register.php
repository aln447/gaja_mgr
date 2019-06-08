<?php require_once('header.php')?>
            <div class="row">
                <section id="registration" class="col-lg-8">
                    <h2 class="title">Rejestracja</h2>
                    <form action="be/register_handle.php" method="POST">
                        <p>* - pole wymagane</p>
                        <div class="form-group">
                            <label for="username">Nazwa uzytkownika *</label>
                            <input type="text" class="form-control" name="username"
                                placeholder="twój nick" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" name="email"
                                placeholder="name@example.com" required>
                        </div>
                        <div class="form-group">
                            <label for="passwd">Hasło *</label>
                            <input type="password" minlength="6" class="form-control" name="passwd"
                                required>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="name">Imię</label>
                            <input type="text" class="form-control" name="name" placeholder="Jan">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Nazwisko</label>
                            <input type="text" class="form-control" name="lastname" placeholder="Matejko">
                        </div>
                        <div class="form-group">
                            <label for="status">Status *</label>
                            <select class="form-control" name="status">
                                <option disabled selected value> -- Wybierz opcje -- </option>
                                <option>Uczeń</option>
                                <option>Student</option>
                                <option>Osoba dorosła</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Data urodzenia *</label>
                            <input type="text" name="birthdate" class="form-control datetimepicker" value="10/05/2000">
                        </div>
                        <div class="form-group">
                            <label for="bio">Opowiedz coś o sobie</label>
                            <textarea class="form-control" id="bio" rows="3"></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary text-right">Rejestruj!</button>
                        </div>
                    </form>
                </section>
          <?php require_once('sidebar.php'); ?>
  </div>
  <?php require_once('footer.php'); ?>