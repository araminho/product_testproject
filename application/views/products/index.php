<div class="row">
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
                    <td>
                        <a href="<?php echo base_url('products/'.$product['cat_id']); ?>"><?php echo $product['cat_title']; ?></a>
                    </td>
                    <td>
                        <a href="<?php echo base_url('products/edit/'.$product['product_id']); ?>" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <div class="row">
            No products
        </div>
    <?php } ?>
</div>

<div class="row">
    <a href="<?php echo base_url('products/create'); ?>" class="btn btn-success">Add product</a>
    <a href="<?php echo base_url('categories/'); ?>" class="btn btn-info">Categories list</a>
</div>