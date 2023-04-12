<?php 
namespace App\models;
use App\models\DAO;
use \PDOException;

require_once("../autoloader.php");

class User{
    private $name;
    private $mail;
    private $password;
    private $exp;
    private $description;

    // Fonction construct

    function __construct($name, $mail, $password, $exp, $description)
    {
        $this->name = strip_tags($_POST["name"]);
        $this->mail = $mail;
        $this->password = password_hash($_POST["password"], PASSWORD_ARGON2ID);
        $this->exp = $exp;
        $this->description = $description;
    }

    // Getter et Setter

    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }

    public function setMail($mail){
        $this->mail = $mail;
    }
    public function getMail(){
        return $this->mail;
    }

    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }

    public function setExp($exp){
        $this->exp = $exp;
    }
    public function getExp(){
        return $this->exp;
    }

    public function setDescription($description){
        $this->description = $description;
    }
    public function getDescription(){
        return $this->description;
    }

    // Function Add

    public function Add(){
        try{

            $db = new DAO();
            $dbh = $db->getDbh();

            $stmt = $dbh->prepare("INSERT INTO user (name, mail, password, exp, description) VALUES (?, ?, ?, ?, ?)");
            $stmt->bindValue(1, $this->name);
            $stmt->bindValue(2, $this->mail);
            $stmt->bindValue(3, $this->password);
            $stmt->bindValue(4, $this->exp);
            $stmt->bindValue(5, $this->description);
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

            $stmt = $dbh->query("SELECT * FROM `user`");

            return $stmt->fetchAll();

        }catch(PDOException $error){
            echo $error->getMessage();
        }
    }

    // Function findById

    public static function findById($id_user){
        try{
            $db = new DAO();
            $dbh = $db->getDbh();

            $stmt = $dbh->prepare("SELECT * FROM `user` WHERE id_user = ?");
            $stmt->bindParam(1, $id_user);
            $stmt->execute();
            return $stmt->fetch();

        }catch(PDOException $error){
            echo $error->getMessage();
        }
    }

    //Function Edit

    public function Edit($id_user){
        try{
            $db = new DAO();
            $dbh = $db->getDbh();

            $stmt = $dbh->prepare("UPDATE user SET name=?, mail=?, password=?, exp=?, description=? WHERE id_user=?");

            $stmt->bindValue(1, $this->name);
            $stmt->bindValue(2, $this->mail);
            $stmt->bindValue(3, $this->password);
            $stmt->bindValue(4, $this->exp);
            $stmt->bindValue(5, $this->description);
            $stmt->bindValue(6, $id_user);

            $stmt->execute();
        }catch(PDOException $error){
            echo $error->getMessage();
        }
    }

    // Function Delete

    public static function Deleted($id_user){
        try{
          
            $db = new DAO();
            $dbh = $db->getDbh();

          $stmt = $dbh->prepare("DELETE FROM `user` WHERE id_user=?");
          $stmt->bindParam(1,$id_user);
          $stmt->execute();

        }catch(PDOException $erreur){
            echo $erreur->getMessage();
        }  
    }

    // Functinon FindByMail

    public static function FindByEmail($mail){
        try{
            
            $db = new DAO();       
            $dbh = $db->getDbh();
            
            $stmt = $dbh->prepare("SELECT * FROM user WHERE mail=?");
            $stmt->bindValue(1, $mail);
            $stmt->execute();
            return $stmt->fetch();
            
        } catch (PDOException $erreur) {
            echo $erreur->getMessage();
        }
    }

}