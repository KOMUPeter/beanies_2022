<!-- =========>> PROBLEME AVEC LE PANIER CAN'T SEE THE list of added products  -->
 <?php 
   if (!isset($_SESSION['cart'])){ // if $_SESSION['cart'] is not defined
      $_SESSION['cart'] = [];      // then $_SESSION['cart']  equals empty table  
   }

   if (isset($_GET['id'])) { 
      $id = $_GET['id'];
      $cart = $_SESSION['cart']; // $cart is a copy so not related to the $_SESSION['cart']
      
      if (!isset($cart[$id])) { // IF NO PRODUCT INITIALISE THE SESSEION TO ZERO
         $cart[$id]=0;
      }
      $cart[$id] ++;
      $_SESSION['cart']=$cart; // NOTE !! valiable  $cart does not modify $_SESSION['cart']
   }                           // THAT IS WHY WE sign like this $_SESSION['cart']=$cart;

   var_dump($_SESSION['cart']);
   ?>

   <table>
      <!--  create a table of added carts  -->
      <thead>
         <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Price TTC</td>
            <td>Quantities</td>
            <td>Totol price</td>
         </tr>
      </thead>
      <tbody>
      <?php
   $allTotal = 0;   
   $total =0;
   foreach($_SESSION['cart'] as $id => $quantity){
        $bonnet = $bonnies[$id];
         $price = $bonnet['price'] * $quantity;
        $total += $price;
        $allTotal += $price;
?> <tr>
        <td><?= $id; ?></td>
        <td><?= $bonnet['name'];?></td>
        <td><?= number_format($bonnet['price'],2,',',' '); ?>€</td>
        <td><?= $quantity; ?></td>
        <td><?= number_format($price,2,',',' '); ?>€</td>
     </tr>
<?php } ?>
</tbody>
<tfoot>
<tr>
      <td>All Total</td>
      <td colspan="4" align="right">
      <?= number_format($allTotal,2,',',' '); ?>€
     </tr>
</tfoot>
</table>