
<?php echo validation_errors(); ?>

<form action="<?php echo base_url('products/create/');?>" method="post" accept-charset="utf-8">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" required/>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" rows="10" id="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select name="category" id="category" class="form-control">
            <option value="0">Choose...</option>
            <?php foreach ($categories as $category) { ?>
                <option value="<?php echo $category['cat_id'];?>">
                    <?php echo $category['cat_title'];?>
                </option>
            <?php } ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>