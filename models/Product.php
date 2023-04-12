<?php 
namespace App\models;
use App\models\DAO;
use \PDOException;

require_once("../autoloader.php");

class Product{
    private $name_product;
    private $type;
    private $season;
    private $picture;
    private $category;

    // Fonction construct

    function __construct($name_product, $type, $season, $picture, $category)
    {
        $this->name_product = strip_tags($_POST["name_product"]);
        $this->type = $type;
        $this->season = $season;
        $this->picture = $picture;
        $this->category = $category;
    }

    // Getter et Setter

    public function setname_product($name_product){
        $this->name_product = $name_product;
    }
    public function getname_product(){
        return $this->name_product;
    }

    public function settype($type){
        $this->type = $type;
    }
    public function gettype(){
        return $this->type;
    }

    public function setseason($season){
        $this->season = $season;
    }
    public function getseason(){
        return $this->season;
    }

    public function setpicture($picture){
        $this->picture = $picture;
    }
    public function getpicture(){
        return $this->picture;
    }

    public function setcategory($category){
        $this->category = $category;
    }
    public function getcategory(){
        return $this->category;
    }

    // Function Add

    public function Add(){
        try{

            $db = new DAO();
            $dbh = $db->getDbh();

            $stmt = $dbh->prepare("INSERT INTO product (name_product, type, season, picture, category) VALUES (?, ?, ?, ?, ?)");
            $stmt->bindValue(1, $this->name_product);
            $stmt->bindValue(2, $this->type);
            $stmt->bindValue(3, $this->season);
            $stmt->bindValue(4,$this->picture['picture']['name']);
            move_uploaded_file($this->picture['picture']['tmp_name'],"../static/image/".$this->picture['picture']['name']);
            $stmt->bindValue(5, $this->category);
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

            $stmt = $dbh->query("SELECT * FROM `product`");

            return $stmt->fetchAll();

        }catch(PDOException $error){
            echo $error->getMessage();
        }
    }

    // Function findById

    public static function findById($id_product){
        try{
            $db = new DAO();
            $dbh = $db->getDbh();

            $stmt = $dbh->prepare("SELECT * FROM `product` WHERE id_product = ?");
            $stmt->bindParam(1, $id_product);
            $stmt->execute();
            return $stmt->fetch();

        }catch(PDOException $error){
            echo $error->getMessage();
        }
    }

    //Function Edit

    public function Edit($id_product){
        try{
            $db = new DAO();
            $dbh = $db->getDbh();

            $stmt = $dbh->prepare("UPDATE product SET name_product=?, type=?, season=?, picture=?, category=? WHERE id_product=?");

            $stmt->bindValue(1, $this->name_product);
            $stmt->bindValue(2, $this->type);
            $stmt->bindValue(3, $this->season);
            $stmt->bindValue(4, $this->picture);
            $stmt->bindValue(5, $this->category);
            $stmt->bindValue(6, $id_product);

            $stmt->execute();
        }catch(PDOException $error){
            echo $error->getMessage();
        }
    }

    // Function Delete

    public static function Deleted($id_product){
        try{
          
            $db = new DAO();
            $dbh = $db->getDbh();

          $stmt = $dbh->prepare("DELETE FROM `product` WHERE id_product=?");
          $stmt->bindParam(1,$id_product);
          $stmt->execute();

        }catch(PDOException $erreur){
            echo $erreur->getMessage();
        }  
    }


}