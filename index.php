<?php
$description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a leo diam. Quisque lorem orci, accumsan quis dolor sed, gravida.';

$tva= 0.2;
$bonnies = [
    ['name'      =>'Bonnet en laine',
    'description'=> $description,
    'price'      => 10.0,
    ],  
    ['name'      =>'Bonnet en laine bio',
    'description'=> $description,
    'price'      => 14.0,
    ], 
    ['name'      =>'Bonnet en laine et cachemire',
    'description'=> $description,
    'price'      => 20.0,
    ], 
    [
    'name'       =>'Bonnet arc-en-ciel',
    'description'=> $description,
    'price'      => 12.0,
    ],
    [
    'name'       =>'Bonnet ciel',
    'description'=> $description,
    'price'      => 25.0,
    ],
];
// function to calculate price before tva
function withoutVAT(float $price): float{
    return $price/1.2;
};
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