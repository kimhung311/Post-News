  <?php include('View/Admin/Layouts/master.php') ?>
  <div class="main-panel">
      <h1 class="text-center">ADD CATEGORY
      </h1>
      <form action="" method="post" role="form" enctype="multipart/form" class="text-center">
          <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter category name">
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Slected</label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="paren_id">
                  <?php foreach ($categories as $key => $value) : ?>
                  <option value="<?php echo $value['id'] ?>">
                      <?php echo $value['name'] ?></option>
                  <?php endforeach; ?>
              </select>
          </div>

          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Slected</label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="user_id">
                  <?php foreach ($user as $key => $value) : ?>
                  <option value="<?php echo $value['name'] ?>">
                      <?php echo $value['name'] ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
          <button type="submit" name="action" value="store" class="btn btn-primary">Submit</button>
      </form>
  </div>
  </div>
  </div>
  <?php
    include('View/Admin/Layouts/footer.php');
    ?>