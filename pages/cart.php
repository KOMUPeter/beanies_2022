<!-- =========>> PROBLEME AVEC LE PANIER CAN'T SEE THE list of added products  -->
<?php
$cart = new Cart($_GET);
// var_dump($_SESSION['cart']);
?>

<table id="table-cart" class="container">
   <!--  create a table of added carts  -->
   <thead>
      <tr>
         <td>ID</td>
         <td>Name</td>
         <td>Price TTC</td>
         <td>Quantities</td>
         <td>Total price</td>
      </tr>
   </thead>
   <tbody>
      <?php
      $allTotal = 0;
      $total = 0;
      foreach ($cart->getContenu() as $id => $quantity) {
         // here we have to search object beanie from id by creating a function find by id
         $bonnet = findById($beanies, $id);
         if (empty($bonnet)) {
            continue;
         }
         $price = $bonnet->getPrice() * $quantity;
         $total += $price;
         $allTotal += $price; ?>
         <tr>
            <td>
               <?= $id; ?>
            </td>

            <td>
               <?= $bonnet->getName(); ?>
            </td>

            <td>
               <?= number_format($bonnet->getPrice(), 2, ',', ' '); ?>€
            </td>

            <td>
               <a href="?page=cart&id=<?= $id ?>">+</a>
               <?= $quantity; ?>
               <a href="?page=cart&id=<?= $id ?>&mode=min">-</a>
               <a href="?page=cart&id=<?= $id ?>&mode=delete">Delete</a>
            </td>

            <td>
               <?= number_format($price, 2, ',', ' '); ?>€
            </td>

         </tr>
      <?php } ?>
   </tbody>
   <tfoot>
      <tr>
         <td>All Total </td>
         <td colspan="3" align="right"><a href="?page=cart&mode=empty" class="btn btn-danger">Delete all</a></td>
         <td colspan="4" align="right">
            <?= number_format($allTotal, 2, ',', ' '); ?>€
      </tr>
   </tfoot>
</table>