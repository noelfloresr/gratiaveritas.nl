<footer>
  <!-- <div class="footer-shape hide-mobile"></div> -->
  <div class="container">
    <section class="footer-section">
      <ul class="footer-menu">
        <?php wp_nav_menu(array('menu' => 2, 'container' => false, 'items_wrap' => '%3$s')); ?>
      </ul>
    </section>
  </div>
</footer>
</div><!-- end of site wrapper -->

<?php wp_footer(); ?>
</body>

</html>