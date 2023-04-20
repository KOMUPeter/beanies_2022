<?php
$description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a leo diam. Quisque lorem orci, accumsan quis dolor sed, gravida.';


$tva = 0.2;
$beanies = [
  (new Beanie())
    ->setId(55)
    ->setName('Bonnet en laine')
    ->setDescription($description)
    ->setPrice(10.0)
    ->setImage('img/Bonnet-Cachemire-removebg-preview.png'),
  (new Beanie())
    ->setId(22)
    ->setName('Bonnet en laine bio')
    ->setDescription($description)
    ->setPrice(14.0)
    ->setImage('img/Bonnet-CGT-removebg-preview.png'),
  (new Beanie())
    ->setId(15)
    ->setName('Bonnet en laine et cachemire')
    ->setDescription($description)
    ->setPrice(12.0)
    ->setImage('img/Bonnet-Couleurs-removebg-preview.png'),
  (new Beanie())
    ->setId(11)
    ->setName('Bonnet arc-en-ciel')
    ->setDescription($description)
    ->setPrice(30.0)
    ->setImage('img/Bonnet-Laine-removebg-preview.png'),
];

$defaultPassword = '0000';
$defaultUsername = 'test';
$errors = [];