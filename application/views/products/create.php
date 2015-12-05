
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
    <button type="submit" class="btn btn-default">Submit</button>
</form>