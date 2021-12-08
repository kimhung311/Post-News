  <?php include('View/Admin/Layouts/master.php') ?>
  <form action="" methob="POST" enctype="multipart/form-data">
      <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" class="form-control" placeholder="Enter category name">
      </div>
      <div class="form-group">
          <label for="">Paren_id</label>
          <input type="text" name="paren_id" class="form-control" placeholder="Enter Paren_id">
      </div>
      <button type="submit" name="action" value="store" class="btn btn-primary">SAVE</button>

  </form>