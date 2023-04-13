<?php
namespace App\controllers;
use App\models\Article;

class ArticleController{

    public static function Create($post, $files){
       $article = new Article($post["title"], $post["text"], $files, $post["id_user"], $post["created_at"]);
       $article->Add();
        self::ReadAll();
    }

    public static function ReadAll(){
       $articles = Article::findAll();
        require("../views/Admin/Article/readAllArticle.php");
    }

    public static function ReadById($id_article){
       $article = Article::findById($id_article);
        require("../views/Admin/Article/ReadArticle.php");
    }

    public static function Update($post){
       $article =  new Article($post["title"], $post["text"], $post["picture"], $post["id_user"], $post["created_at"]);
       $article->Edit($post["id_article"]);
        self::ReadAll();
    }

    public static function formUpdate($id_article){
       $article = Article::findById($id_article);
        require("../views/Admin/Article/ArticleFormUpdate.php");
    }

    public static function delete($id_article){
       $article = Article::Deleted($id_article);
        self::readAll();
    }
    
}