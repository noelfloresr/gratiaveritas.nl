<div class="accordion-container" id="accordion">
    <?php foreach ($content['accordion_repeater'] as $row) : ?>
        <button class="accordion">
            <h3><?php echo $row['title'] ?> <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></h3>
        </button>
        <div class="panel">
            <p><?php echo $row['content'] ?></p>
        </div>
    <?php endforeach; ?>
</div>