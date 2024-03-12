<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once '../vendor/autoload.php';
require_once 'requestDb/Database.php';
require_once 'requestDb/Products.php';
require_once 'requestDb/ProductsById.php';
require_once 'requestDb/ProductCategory.php';
require_once 'requestDb/Registration.php';
require_once 'requestDb/Authorization.php';
require_once 'requestDb/EditDataUser.php';
require_once 'requestDb/CheckUrl.php';

require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'controllers/registration.php';

