<h2><?php //echo $title; ?></h2>
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
                    <a href="<?php echo base_url('categories/create/'.$category['cat_id']); ?>" class="btn btn-primary btn-sm">Edit</a>
                </td>
            </tr>

        <?php } ?>
    </table>
<?php } ?>