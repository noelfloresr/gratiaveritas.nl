</article>
<div class="bookcase-component">
  <?php foreach ($content['row'] as $row) : ?>
    <div class="bookcase-container">
      <div class="image-container">
        <img class="img-fluid" src="<?php echo $row['image']['url'] ?>" alt="<?php echo $row['image']['alt'] ?>">
      </div>
      <div class="card">
        <div class="title">
          <a href="<?php echo $row['url']['url'] ?>">
            <?php echo $row['title'] ?>
          </a>
        </div>
        <div class="author">By: <?php echo $row['author'] ?></div>
        <?php if ($row['order_from']) : ?>
          <div class="book-store">
            Order From:
            <?php foreach ($row['order_from'] as $order) : ?>
              <a href="<?php echo $order['url'] ?>" target="_blank">
                <img class="img-fluid" src="<?php echo $order['image']['url'] ?>" alt="<?php echo $order['image']['alt'] ?>">
              </a>
            <?php endforeach ?>
          </div>
        <?php endif ?>

      </div>
    </div>
  <?php endforeach; ?>
</div>
<article class="content">