<?php
//require mysql connection
require('database/DBController.php');
//require product class
require('database/Product.php');

//require cart class
require('database/cart.php');

//require reserve class
require('database/Reserve.php');

//DBController object
$db=new DBController();

$product=new Product($db);
$product_shuffle = $product->getData(); // shop now page access

//cart object
$Cart=new Cart($db);

//reserve object
//$reserve = new reserve($db);
//$arr= array(
  //  "user_id"=>5,
   // "item_id"=>4
//);

//$reserve->insertIntoReserve($arr);