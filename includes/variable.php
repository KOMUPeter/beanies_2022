<?php
$description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a leo diam. Quisque lorem orci, accumsan quis dolor sed, gravida.';


$tva= 0.2;
$bonnies = [
  55=>  ['name'      =>'Bonnet en laine',
    'description'=> $description,
    'price'      => 10.0,
    'image'      => 'img/Bonnet-Cachemire-removebg-preview.png',
    ],  
  22=>   ['name'      =>'Bonnet en laine bio',
    'description'=> $description,
    'price'      => 14.0,
    'image'      => 'img/Bonnet-CGT-removebg-preview.png',
    ], 
  15=> ['name'      =>'Bonnet en laine et cachemire',
    'description'=> $description,
    'price'      => 20.0,
    'image'      => 'img/Bonnet-Couleurs-removebg-preview.png',
    ], 
  11=> [
    'name'       =>'Bonnet arc-en-ciel',
    'description'=> $description,
    'price'      => 12.0,
    'image'      => 'img/Bonnet-Laine-removebg-preview.png',
    ],
  5=>   [
    'name'       =>'Bonnet ciel',
    'description'=> $description,
    'price'      => 25.0,
    'image'      => 'https://www.montparel.com/4370-large_default/beechfield-bf045-bonnet-avec-rabat.jpg',
    ],
];

$defaultPassword = '0000';
$defaultUsername = 'test';
$errors = [];
