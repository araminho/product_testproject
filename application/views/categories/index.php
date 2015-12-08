<div class="row">
    <?php if (!empty($categories)){ ?>
        <table class="table">
            <thead>
            <tr>
                <th>Category</th>
                <th>Action</th>
            </tr>
            </thead>
            <?php foreach ($categories as $category) { ?>
                <tr>
                    <td><?php echo $category['cat_title']; ?></td>
                    <td>
                        <a href="<?php echo base_url('categories/edit/'.$category['cat_id']); ?>" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>

            <?php } ?>
        </table>
    <?php } else { ?>
        <div class="row">
            No categories
        </div>
    <?php } ?>
</div>

<div class="row">
    <a href="<?php echo base_url('categories/create'); ?>" class="btn btn-success">Add category</a>
    <a href="<?php echo base_url(''); ?>" class="btn btn-info">Products list</a>
</div>