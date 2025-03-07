<?php
//MODEL POUR LA TABLE JOUEURS
class ModelPlayer {
    // Attributs
    private ?int $id;
    private string $pseudo = '';
    private string $email = '';
    private ?int $score;
    private string $password = '';
    private ?PDO $bdd;

    // Constructeur
    public function __construct( ) {
        $this->bdd = connect();
   
    }

    // Getter & Setter
    public function getId(): ?int {
        return $this->id;
    }
    public function setId(int $newId){
        $this->id=$newId;
        return $this;

    }

    public function getPseudo(): ?string {
        return $this->pseudo;
    }
    public function setPseudo(string $newPseudo): string {
        $this->pseudo = $newPseudo;
        return $this;
    }

    public function getEmail(): ?string {
        return $this->email;
    }
    public function setEmail(string $newEmail): string {
        $this->email = $newEmail;
        return $this;
    }


    public function getScore(): ?int {
        return $this->score;
    }
    public function setScore(int $newScore): int {
        $this->score = $newScore;
        return $this;
    }

    public function getPassword(): ?string {
        return $this->password;
    }
    public function setPassword(string $newPassword): string {
        $this->password = $newPassword;
        return $this;
    }

    public function getBdd(): ?PDO{
      return $this->bdd;
    }
  
    public function setBdd(?PDO $bdd): self {
      $this->bdd = $bdd;
      return $this;
    }


}
?>