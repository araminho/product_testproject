<h2><?php //echo $title; ?></h2>
<?php if (!empty($products)){ ?>
    <table class="table">
        <thead>
        <tr>
            <th>Product title</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        </thead>
        <?php foreach ($products as $product) { ?>
            <tr>
                <td><?php echo $product['product_title']; ?></td>
                <td><?php echo $product['cat_title']; ?></td>
                <td>
                    <a href="<?php echo base_url('products/create/'.$product['product_id']); ?>" class="btn btn-primary">Edit</a>
                </td>
            </tr>
        <?php } ?>
    </table>
<?php } else { ?>
    <div class="row">
        No products
    </div>
<?php } ?>

<div class="row">
    <a href="<?php echo base_url('categories/'); ?>">All categories</a>
</div>