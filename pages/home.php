<section class="d-flex gap-3 justify-content-center">
  <?php
  // show images
  $i = 0;
  foreach ($beanies as $key=> $bonnet) {
    $i++;
    if ($i >= 6) {
      break;
    }
    ?>
    <!-- SHOW IMAGES -->
    <article class="card text-center col-12" style="width: 18rem;">

      <img src="<?php echo $bonnet->getImage(); ?>" class="card-img-top" alt="images">

      <div class="card-body">

        <h4 class="card-title">
          <?php echo $bonnet->getName(); ?>
        </h4>

        <p class="card-text">
          <?php echo number_format($bonnet->getPrice(), 2, ',', ''); ?>€
        </p>

        <p class="card-text">
          <?php echo $bonnet->getDescription(); ?>
        </p>

        <a href="?page=cart&id=<?php echo $bonnet->getId(); ?>" class="btn btn-primary">Buy Now</a>

      </div>

    </article>
    <?php
  }
  ?>
</section>

<div class="block ">
  <a href="?page=list" class="d-inline p-2 bg-dark text-white text-decolation-none">See all products</a>
</div>