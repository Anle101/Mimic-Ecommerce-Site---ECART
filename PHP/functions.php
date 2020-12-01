<?php
//DBcontroller class
require('../database/DatabaseController.php');
//item class
require('../database/items.php');
//cart class
require('../database/cart_items.php');
//user class
require('../database/user.php');

//Db Object
$db = new DatabaseController();

//Item Object
$item = new Item($db);

$item_shuffle = $item->getData();

//Cart Object
$cart = new Cart($db);


//Cart Object
$user = new User($db);
