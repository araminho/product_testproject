<h2><?php //echo $title; ?></h2>

<?php foreach ($products as $product): ?>

    <h3><?php echo $product['title']; ?></h3>
    <div class="main">
        <?php echo $product['description']; ?>
    </div>

<?php endforeach; ?>