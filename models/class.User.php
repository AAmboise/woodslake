<?php

    class User{

        private int $id;
        public string $pseudo;
        private string $password;
        private  bool $isAdmin;

        public function __construct($pId, $Pseudo,$Password,$IsAdmin=0){
            $this->id = (int)$Id;
            $this->pseudo = $Pseudo;
            $this->password = $Password;
            $this->isAdmin = (int)$IsAdmin;
        }

        public function getId(): int{
            return $this->id;
        }
        public function setId(int $id): int {
            $this->id = $id;
     
            return $this;
        }

        public function getPseudo(){
            return $this->pseudo;
        }
        public function setPseudo(string $pseudo): string {
            $this->pseudo = $pseudo;
     
            return $this;
        }

        public function getPassword(){
            return $this->password;
        }
        public function setPassword(string $password): string {
            $this->password = $password;
     
            return $this;
        }
    }
    
?>