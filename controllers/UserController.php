<?php
namespace App\controllers;
use App\models\User;

class UserController{

    public static function Create($post){
        $user = new User($post["name"], $post["mail"], $post["password"], $post["exp"], $post["description"]);
        $user->Add();
        self::ReadAll();
    }

    public static function ReadAll(){
        $users = User::findAll();
        require("../views/Admin/User/readAllUser.php");
    }

    public static function ReadById($id_user){
        $user = User::findById($id_user);
        require("../views/Admin/User/ReadUser.php");
    }

    public static function Update($post){
        $user =  new User($post["name"], $post["mail"], $post["password"], $post["exp"], $post["description"]);
        $user->Edit($post["id_user"]);
        self::ReadAll();
    }

    public static function formUpdate($id_user){
        $user = User::findById($id_user);
        require("../views/Admin/User/formUpdate.php");
    }

    public static function delete($id_user){
        $user = User::Deleted($id_user);
        self::readAll();
    }
    
    public static function register($post){
        
        $erreurs = [];
        $exp = null;
        $description = null;
      
        if(empty($post["name"]) || empty($post["mail"]) || empty($post["password"])){
            $erreurs += ["incomplet" => "veuillez completer le formulaire correctement"];
        }

        
        if(!empty($post["exp"])){
            $exp = strip_tags($post["exp"]);
        }
        
        if(!empty($post["description"])){
            $description = strip_tags($post["description"]);
        }

        password_hash($post["password"], PASSWORD_ARGON2ID);

        strip_tags($post["name"]);

        
        $mail = filter_var($post["mail"], FILTER_VALIDATE_EMAIL);
        
        if($mail == false){
            $erreurs += ["mailI" => "Format email invalide"];
        }
        
        $check = User::findByEmail($mail);
        
        if($check != false){
            $erreurs += ["mailE" => "Ce mail existe deja"];
        }

        
        if(empty($erreurs)){
            
            
            $user = new User($post["name"], $post["mail"], $post["password"], $exp, $description);
            $user->Add();
            header('Location: ../views/public/login.php');
        }else{
            require("../views/public/register.php");
        }
    }

    public static function login($post){
         
        $erreurs = [];
        if(empty($post["mail"]) || empty($post["password"]) ){
            $erreurs += ["incomplet" => "veuillez completer le formulaire correctement"];
        }
        
        $mail = filter_var($post["mail"], FILTER_VALIDATE_EMAIL);
        
        if($mail == false){
            $erreurs += ["mailI" => "Format email invalide"];
        }
        
        $user = User::findByEmail($mail);
        
        if ($user == false) {
            $erreurs += ["mailE" => "ce compte n'existe pas"];
        }
        
        if(password_verify($post["password"], $user["password"]) == true){
            session_start();
            require("../views/public/profil.php");
        }

    }

    public static function logout(){
        session_start();
        session_destroy();
        header('Location: ../index.php');
    }
}