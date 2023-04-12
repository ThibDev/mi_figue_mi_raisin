<?php
namespace App\controllers;
use App\models\Product;

class ProductController{

    public static function Create($post, $files){
        $product = new Product($post["name_product"], $post["type"], $post["season"], $files, $post["category"]);
        $product->Add();
        self::ReadAll();
    }

    public static function ReadAll(){
        $products = Product::findAll();
        require("../views/Admin/Product/readAllProduct.php");
    }

    public static function ReadById($id_product){
        $product = Product::findById($id_product);
        require("../views/Admin/Product/ReadProduct.php");
    }

    public static function Update($post){
        $product =  new Product($post["name_product"], $post["type"], $post["season"], $post["picture"], $post["category"]);
        $product->Edit($post["id_product"]);
        self::ReadAll();
    }

    public static function formUpdate($id_product){
        $product = Product::findById($id_product);
        require("../views/Admin/Product/formUpdate.php");
    }

    public static function delete($id_product){
        $product = Product::Deleted($id_product);
        self::readAll();
    }
    
}