<?php
$pageTitle = "My table List";
 ?>
    <table>
        <thead>
            <tr>
                <td>key</td>
                <td>Name</td>
                <td>Price HT</td>
                <td>TVA</td>
                <td>Price TTC</td>
                <td>Description</td>
                <td>Add to cart</td>
            </tr>
        </thead>
        <tbody>
              <?php foreach ($bonnies as $key => $bonnet) {
                // call function minimise 
                minimise($key, $bonnet);
            } 
        // var_dump($bonnies)
        ?>
        </tbody>
    </table>
