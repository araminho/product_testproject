
<?php echo validation_errors(); ?>

<form action="/index.php/products/create" method="post" accept-charset="utf-8">



<label for="title">Title</label>
<input type="input" name="title" /><br />

<label for="text">Description</label>
<textarea name="description"></textarea><br />

<input type="submit" name="submit" value="Create product item" />

</form>