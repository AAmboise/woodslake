<?php
namespace Src\Database;
use Src\Models\User;
use PDO;

class UserDataBase {

      public static function create ($user){
        try{
          $sql= "INSERT INTO `user`(`nom`, `prenom`,`email`, `telephone`,`password`,`isAdmin`) 
            VALUES (:nom,:prenom,:email,:telephone,:password,:isAdmin);"; // Sécurité contre les injections SQL
            $db=DataBase::getPDO()->prepare($sql);
            $db->execute([
                'nom'=>$user->nom,
                'prenom'=>$user->prenom,
                'email'=>$user->email,
                'telephone'=>$user->telephone,
                'password'=>$user->password,
                'isAdmin'=>0
            ]);
        }
        catch (\PDOException $exception){
            $msgErreur = $exception->getMessage();
            require_once './views/content/error.php';
        } 
      }

      public static function read () {
        try {
          $sql= "SELECT * from `user`"; 
            $db=DataBase::getPDO()->prepare($sql);
            $db->execute();
            $req = $db->fetchALL(PDO::FETCH_OBJ);
            $obj = [];
            foreach ($req as $objReq){
              $obj[] = new User($objReq->id, $objReq->nom, $objReq->prenom, $objReq->email, $objReq->telephone, $objReq->password, $objReq->isAdmin);
            }
            return $obj;
        }
        catch (\PDOException $exception){
          $msgErreur = $exception->getMessage();
          require_once './views/content/error.php';
        } 
      }
      
      public static function update ($userId, $colonne, $value){
        try{
          $sql= "UPDATE `user`
            SET $colonne = '$value' 
            WHERE `id` = $userId;";
            $db=DataBase::getPDO()->prepare($sql);
            $db->execute();
        }
        catch (\PDOException $exception){
            $msgErreur = $exception->getMessage();
            require_once './views/content/error.php';
        } 
      }

      public static function delete ($userID){
        try{
          $sql= "DELETE FROM `user` 
            WHERE `id` = $userID;";
            $db=DataBase::getPDO()->prepare($sql);
            $db->execute();
        }
        catch (\PDOException $exception){
            $msgErreur = $exception->getMessage();
            require_once './views/content/error.php';
        } 
      }

      public static function checkLogin($email) {
        try {
          $sql= "SELECT * from `user`
          WHERE email = :email";
            $db=DataBase::getPDO()->prepare($sql);
            $db->bindValue(':email', $email, PDO::PARAM_STR);
            $db->execute();
            $req = $db->fetch();
            if ($req) {
              $user = new User($req['ID'],$req['nom'],$req['prenom'],$req['email'],$req['telephone'],$req['password'],$req['isAdmin']);
              return $user;
            }
            else{
              return false;
            }
        }
        catch (\PDOException $exception) {
            $msgErreur =$exception->getMessage();
            require_once './views/content/error.php';
        } 
      }

      public static function checkemail($email){
        try {
          $sql= "SELECT COUNT(id) FROM `user` where email like :email;";
          $db=DataBase::getPDO()->prepare($sql);
          $db->execute(['email'=>$email]);
          $req = $db->fetchColumn(); // retourn un boolean
          if(!$req) {
            return true;
          }
          else {
            return false;
          }
        }
        catch (\PDOException $exception) {
          $msgErreur =$exception->getMessage();
          require_once './views/content/error.php';
        } 
      }
  }
?>