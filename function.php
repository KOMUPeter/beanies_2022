<?php
// function to calculate price before tva
function withoutVAT(float $price): float{
    return $price/1.2;
}
// function tva
function tva(): float{
    return 0.2;
}
// function minimise the code
function minimise(int $key, array $bonnet): void {
    ?>
    <tr>
       <td><?php echo ++$key;?></td>

       <td> <?php echo $bonnet['name'];?></td>

       <td> <?php echo number_format(withoutVAT($bonnet['price']), 2, '.', ' ') ;?></td>

       <td> <?php echo number_format(tva($bonnet['price']), 2, '.', ' ') ;?></td>

       <td <?php if ( $bonnet['price'] <= 12) {
           echo 'class = "green"';
       } elseif ( $bonnet['price'] >= 12){
           echo 'class = "blue"';
       }
       ?>> <?php echo number_format($bonnet['price'], 2, '.', ' ');?>€</td>

       <td> <?php echo $bonnet['description'];?></td>
    </tr>
    <?php
}