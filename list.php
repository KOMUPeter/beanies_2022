<?php
$pageTitle = "Liste";
include "includes/header.php";
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
    <?php
include "includes/footer.php";
?>