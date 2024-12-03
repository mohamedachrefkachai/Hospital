
<?php 

  class Reclamation {
   private int $id;
   private string $reclamation;
   private DateTime $date;
   private int $etat;
   private string $nom;
   private string $email;
   private string $tel;

   public function __construct(string $reclamation, int $etat, string $nom, string $email,string $tel) {
    
    $this->reclamation = $reclamation;
    $this->etat = $etat;
    $this->nom = $nom;
    $this->email = $email;
    $this->tel=$tel;
   }

   public function getId(): int {
    return $this->id;
   }

 public function getTel(): string {
    return $this->tel;
   }
   
   public function getReclamation(): string {
    return $this->reclamation;
   }

   public function getDate(): DateTime {
    return $this->date;
   }

   public function getEtat(): int {
    return $this->etat;
   }

   public function getNom(): string {
    return $this->nom;
   }

   public function getEmail(): string {
    return $this->email;
   }

   public function setId(int $id): void {
    $this->id = $id;
   }

   public function setReclamation(string $reclamation): void {
    $this->reclamation = $reclamation;
   }

   public function setDate(DateTime $date): void {
    $this->date = $date;
   }
   public function setTel(string $tel): void {
    $this->tel = $tel;
   }
   public function setEtat(int $etat): void {
    $this->etat = $etat;
   }

   public function setNom(string $nom): void {
    $this->nom = $nom;
   }

   public function setEmail(string $email): void {
    $this->email = $email;
   }
  }
