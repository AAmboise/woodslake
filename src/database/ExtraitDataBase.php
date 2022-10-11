<?php
  class ExtraitDataBase {

      public static function create ($extrait){
        try{
          $sql= "INSERT INTO `extrait`(`titre`, `URLFichier`) 
            VALUES (:titre,:URLFichier);"; // les parties variables marquées par : sont remplacées grace a un tableau associatif!
            $db=DataBase::getPDO()->prepare($sql);   // (cela protège de l'injection SQL)
            $db->execute([
                'titre'=>$extrait->titre,
                'URLFichier'=>$extrait->fichier
            ]);
        }
        catch (PDOException $exception){
            $msgErreur = $exception->getMessage();
            require_once './views/content/error.php';
        } 
      }

      public static function read () {
        try {
          $sql= "SELECT * from `extrait`"; 
            $db=DataBase::getPDO()->prepare($sql);
            $db->execute();
            $req = $db->fetchALL(PDO::FETCH_OBJ);
            $obj = [];
            foreach ($req as $objReq){
              $obj[] = new Extrait($objReq->ID, $objReq->titre, $objReq->URLFichier);
            }
            return $obj;
        }
        catch (PDOException $exception){
          $msgErreur = $exception->getMessage();
          require_once './views/content/error.php';
        } 
      }

      public static function update ($extraitId, $colonne, $value){
        try{
          $sql= "UPDATE `extrait`
            SET $colonne = '$value' 
            WHERE `id` = $extraitId;";
            $db=DataBase::getPDO()->prepare($sql);
            $db->execute();
        }
        catch (PDOException $exception){
            $msgErreur = $exception->getMessage();
            require_once './views/content/error.php';
        } 
      }

      public static function delete ($extraitId){
        try{
          $sql= "DELETE FROM `extrait` 
            WHERE `id` = $extraitId;";
            $db=DataBase::getPDO()->prepare($sql);
            $db->execute();
        }
        catch (PDOException $exception){
            $msgErreur = $exception->getMessage();
            require_once './views/content/error.php';
        } 
      }

  }
?>