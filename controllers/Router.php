<?php 

use App\controllers\UserController;
use App\controllers\ProductController;

require_once("../autoloader.php");

if (isset($_GET["user"])) {
    if ($_GET["user"] == "create") {
        UserController::Create($_POST);
    } else if ($_GET["user"] == "readAll") {
        UserController::ReadAll();
    } else if ($_GET["user"] == "read") {
        UserController::ReadById($_GET["id_user"]);
    } else if ($_GET["user"] == "update") {
        UserController::Update($_POST);
    } elseif ($_GET["user"] == "formUpdate") {
        UserController::formUpdate($_GET["id_user"]);
    } else if ($_GET["user"] == "delete") {
        UserController::delete($_GET["id_user"]);
    } else if ($_GET["user"] == "register") {
        UserController::register($_POST);
    } else if ($_GET["user"] == "login") {
        UserController::login($_POST);
    } else if ($_GET["user"] == "all") {
        UserController::readAll();
    } else if ($_GET["user"] == "logout") {
        UserController::logout($_POST);
    }
}
if (isset($_GET["product"])) {
    if ($_GET["product"] == "create") {
        ProductController::Create($_POST, $_FILES);
    } else if ($_GET["product"] == "readAll") {
        ProductController::ReadAll();
    } else if ($_GET["product"] == "read") {
        ProductController::ReadById($_GET["id_product"]);
    } else if ($_GET["product"] == "update") {
        ProductController::Update($_POST);
    } elseif ($_GET["product"] == "formUpdate") {
        ProductController::formUpdate($_GET["id_product"]);
    } else if ($_GET["product"] == "delete") {
        ProductController::delete($_GET["id_product"]);
    } else if ($_GET["product"] == "all") {
        ProductController::readAll();
    }
}


    


