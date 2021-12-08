<?php include('View/Admin/Layouts/master.php');
?>
<div class="main-panel">
    <h1 class="text-center">List of categories
        <div class="row">
            <a href="?controller=category&action=add"><button type="button" class="btn btn-default">Add
                    New</button></a>
        </div>
    </h1>

    <table class="table table-light table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Parent_Id</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $key => $category) : ?>
            <tr>
                <td><?php echo $category['id']; ?></td>
                <td><?php echo $category['name']; ?></td>
                <td><?php echo $category['paren_id']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

</div>

</div>
</div>
<?php
include('View/Admin/Layouts/footer.php');
?>