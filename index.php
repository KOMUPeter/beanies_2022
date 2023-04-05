<?php
include_once "variable.php";
include_once "function.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beanies</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
        var_dump($bonnies)
        ?>
        </tbody>
    </table>
    
</body>
</html>