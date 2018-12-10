<?php
session_start();
//PAGES
define('BR','</br>');
define('HOME_PAGE', '/e-commerce/merkato-online/home.php');
define('SIGNIN_PAGE', '/e-commerce/merkato-online/signin.php');
define('SIGNUP_PAGE', '/e-commerce/merkato-online/signup.php');
define('LOGOUT_PAGE', '/e-commerce/merkato-online/logout.php');
define('SELL_PAGE', '/e-commerce/merkato-online/sellerHome.php');
define('ADD_PRODUCT', '/e-commerce/merkato-online/seller/product/addProduct.php');
define('UPDATE_PRODUCT', '/e-commerce/merkato-online/seller/account/updateProduct.php');
define('VIEW_ORDERS', '/e-commerce/merkato-online/viewOrders.php');
define('VIEW_PRODUCTS', '/e-commerce/merkato-online/seller/product/viewProducts.php');
define('ACCOUNT', '/e-commerce/merkato-online/seller/account/account.php');
define('UPDATE_ACCOUNT', '/e-commerce/merkato-online/seller/account/updateAccount.php');
define("SEARCH_RESULTS_PAGE", 'searchResult.php');
//CSS
define('CSS_HOME', '../css/home.css');
define('CSS_DIR','/e-commerce/css');
//JS
define("JQUERY", "../js/jquery-1.9.1.min.js");
define("JS_HOME", "../js/script.js");
//IMAGE
define("IMAGE_DIR", '/e-commerce/images');
define("UPLOAD_IMAGE_DIR", '../../../images');



spl_autoload_register(function($file_name){
    if(file_exists($_SERVER['DOCUMENT_ROOT']."/e-commerce/app/{$file_name}.php")){
        require_once_once ($_SERVER['DOCUMENT_ROOT']."/e-commerce/app/{$file_name}.php");
    } else {
        echo 'AUTO LOADER FAIL';
    }
    
});
