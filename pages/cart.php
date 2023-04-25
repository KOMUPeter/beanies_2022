<!-- =========>> PROBLEME AVEC LE PANIER CAN'T SEE THE list of added products  -->
<?php
if (!isset($_SESSION['cart'])) {
   $_SESSION['cart'] = [];
}
if (isset($_GET['id'])) { // THIS MEANS WHEN A CLIENT CLIKS TO BUY AN ITEM
   $mode = 'add';
   if (isset($_GET['mode'])) { // HERE MODE IS INITIALISED BY CLICKING BUY
      $mode = $_GET['mode'];
   }
   if (!isset($_SESSION['cart'][$_GET['id']])) { // LOGGING FOR THE FIRST TIME OR AFTER DELETING ALL ITEMS IN THE CART
      $_SESSION['cart'][$_GET['id']] = 0;
   }
   switch ($mode) { // MANUPULATING THE ITEMS IN YOUR CART
      case 'add';
         $_SESSION['cart'][$_GET['id']]++;
         break;
      case 'min';
         $_SESSION['cart'][$_GET['id']]--;
         break;
      case 'delete';
         $_SESSION['cart'][$_GET['id']] = 0;
         break;
   }
   if ($_SESSION['cart'][$_GET['id']] <= 0) { // WHEN ITEMS IN THE CART IS DELETED
      unset($_SESSION['cart'][$_GET['id']]);
   }
   header('Location: ?page=cart');
}
if (isset($_GET['mode']) && $_GET['mode'] == 'empty') { //EMPTY items cart
   $_SESSION['cart'] = [];
}
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
      foreach ($_SESSION['cart'] as $id => $quantity) {
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