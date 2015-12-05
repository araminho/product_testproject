
<?php echo validation_errors(); ?>

<form action="<?php echo base_url('categories/create/');?>" method="post" accept-charset="utf-8">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" required/>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>