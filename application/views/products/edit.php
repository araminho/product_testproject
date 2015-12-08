
<div class="row">
    <?php if (validation_errors()) { ?>
        <div class="col-sm-12">
            <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
        </div>
    <?php } ?>

    <?php if(isset($message) && $message){ ?>
        <div class="col-sm-12">
            <p class="alert alert-success"><?php echo isset($message) ? $message : ""; ?></p>
        </div>
    <?php } ?>
</div>


<form action="<?php echo base_url('products/edit/'.$product['product_id']);?>" method="post" accept-charset="utf-8">
    <input type="hidden" name="id" value="<?php echo $product['product_id'];?>"/>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" required value="<?php echo $product['product_title'];?>"/>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" rows="10" id="description" class="form-control"><?php echo $product['product_description'];?></textarea>
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select name="category" id="category" class="form-control">
            <option value="0">Choose...</option>
            <?php foreach ($categories as $category) { ?>
                <option value="<?php echo $category['cat_id'];?>" <?php echo $product['product_category_id'] == $category['cat_id'] ? "selected" : "";?>>
                    <?php echo $category['cat_title'];?>
                </option>
            <?php } ?>
        </select>
    </div>
    <a href="<?php echo base_url(''); ?>" class="btn btn-default">Back</a>
    <button type="submit" class="btn btn-primary ">Submit</button>
</form>
