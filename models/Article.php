<?php 
namespace App\models;
use App\models\DAO;
use DateTime;
use \PDOException;

require_once("../autoloader.php");

class Article{
    private $title;
    private $text;
    private $picture;
    private $id_user;
    private $created_at;
    

    // Fonction construct

    function __construct($title, $text, $picture, $created_at, $id_user)
    {
        $this->title = strip_tags($_POST["title"]);
        $this->text = $text;
        $this->picture = $picture;
        $this->id_user = $id_user;
        $this->created_at = $created_at;
    }

    // Getter et Setter

    public function settitle($title){
        $this->title = $title;
    }
    public function gettitle(){
        return $this->title;
    }

    public function settext($text){
        $this->text = $text;
    }
    public function gettext(){
        return $this->text;
    }

    public function setpicture($picture){
        $this->picture = $picture;
    }
    public function getpicture(){
        return $this->picture;
    }

    public function setid_user($id_user){
        $this->id_user = $id_user;
    }
    public function getid_user(){
        return $this->id_user;
    }

    public function setcreated_at($created_at){
        $this->created_at = $created_at;
    }
    public function getcreated_at(){
        return $this->created_at;
    }

    // Function Add

    public function Add(){
        try{

            $db = new DAO();
            $dbh = $db->getDbh();

            $stmt = $dbh->prepare("INSERT INTO article (title, text, picture, created_at, id_user) VALUES (?, ?, ?, ?, ?)");
            $stmt->bindValue(1, $this->title);
            $stmt->bindValue(2, $this->text);
            $stmt->bindValue(3,$this->picture['picture']['name']);
            move_uploaded_file($this->picture['picture']['tmp_name'],"../static/image/".$this->picture['picture']['name']);
            $stmt->bindValue(4, $this->created_at);
            $stmt->bindValue(5, $this->id_user);
            $stmt->execute();

        }catch(PDOException $erreur){
            echo $erreur->getMessage();
        }
    }

    // Function findAll

    public static function findAll(){
        try{
            $db = new DAO();
            $dbh = $db->getDbh();

            $stmt = $dbh->query("SELECT * FROM `article`");

            return $stmt->fetchAll();

        }catch(PDOException $error){
            echo $error->getMessage();
        }
    }

    // Function findById

    public static function findById($id_article){
        try{
            $db = new DAO();
            $dbh = $db->getDbh();

            $stmt = $dbh->prepare("SELECT * FROM `article` WHERE id_article = ?");
            $stmt->bindParam(1, $id_article);
            $stmt->execute();
            return $stmt->fetch();

        }catch(PDOException $error){
            echo $error->getMessage();
        }
    }

    //Function Edit

    public function Edit($id_article){
        try{
            $db = new DAO();
            $dbh = $db->getDbh();

            $stmt = $dbh->prepare("UPDATE article SET title=?, text=?, picture=?, id_user=?, created_at=? WHERE id_article=?");

            $stmt->bindValue(1, $this->title);
            $stmt->bindValue(2, $this->text);
            $stmt->bindValue(3, $this->picture);
            $stmt->bindValue(4, $this->id_user);
            $stmt->bindValue(5, $this->created_at);
            $stmt->bindValue(6, $id_article);

            $stmt->execute();
        }catch(PDOException $error){
            echo $error->getMessage();
        }
    }

    // Function Delete

    public static function Deleted($id_article){
        try{
          
            $db = new DAO();
            $dbh = $db->getDbh();

          $stmt = $dbh->prepare("DELETE FROM `article` WHERE id_article=?");
          $stmt->bindParam(1,$id_article);
          $stmt->execute();

        }catch(PDOException $erreur){
            echo $erreur->getMessage();
        }  
    }


}