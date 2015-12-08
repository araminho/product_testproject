
<div class="row">
    <?php if (validation_errors()) { ?>
        <div class="col-sm-12">
            <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
        </div>
    <?php } ?>
</div>

<form action="<?php echo base_url('categories/create/');?>" method="post" accept-charset="utf-8">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" required/>
    </div>
    <a href="<?php echo base_url('categories'); ?>" class="btn btn-default">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>