
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


<form action="<?php echo base_url('categories/edit/'.$category['cat_id']);?>" method="post" accept-charset="utf-8">
    <input type="hidden" name="id" value="<?php echo $category['cat_id'];?>"/>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" required value="<?php echo $category['cat_title'];?>"/>
    </div>
    <a href="<?php echo base_url('categories'); ?>" class="btn btn-default">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>