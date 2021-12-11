<?php include('View/Admin/Layouts/master.php');
?>
<div class="main-panel">
    <h1 class="text-center">List of categories
        <div class="row">
            <a href="?controller=category&action=add" class="btn btn-info"><i class=" fa fa-calendar-plus fa-5x"></i>
                ADD
                NEW
            </a>
        </div>
    </h1>

    <table class="table table-light table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Parent_Id</th>
                <th>User_Id</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $key => $category) : ?>
            <tr>
                <td><?php echo $category['id']; ?></td>
                <td><?php echo $category['name']; ?></td>
                <td><?php echo $category['paren_id']; ?></td>
                <td><?php echo $category['user_id']; ?></td>
                <td>
                    <a href="?controller=category&action=edit&id=<?php echo $category['id'] ?>"
                        class="btn btn-primary">Edit</a>
                    <a href="?controller=category&action=delete&id=<?php echo $category['id'] ?>"
                        class="btn btn-danger">Del</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</div> <?php
        include('View/Admin/Layouts/footer.php');
        ?>