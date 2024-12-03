<?php 

  class Publication {
   private int $id;
   private string $publication;
   private DateTime $date;
   private int $etat;
   private string $nom;
   
   
   

   public function __construct(string $publication, int $etat, string $nom) {
    
    $this->publication = $publication;
    $this->etat = $etat;
    $this->nom = $nom;
    
   }

   public function getId(): int {
    return $this->id;


   }

 
   public function getPublication(): string {
    return $this->publication;
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

   
   
  
   public function setId(int $id): void {
    $this->id = $id;
   }

   public function setPublication(string $publication): void {
    $this->publication = $publication;
   }

   public function setDate(DateTime $date): void {
    $this->date = $date;
   }
  
   public function setEtat(int $etat): void {
    $this->etat = $etat;
   }

   public function setNom(string $nom): void {
    $this->nom = $nom;
   }

  
  }
