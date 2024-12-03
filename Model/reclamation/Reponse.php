
<?php 
class Reponse {
 private string $reponse;
 private DateTime $date;
 private int $id;
 private int $id_admin;
 private int $id_reclamation;

 public function __construct(string $reponse, DateTime $date, int $id, int $id_admin, int $id_reclamation) {
  $this->reponse = $reponse;
  $this->date = $date;
  $this->id = $id;
  $this->id_admin = $id_admin;
  $this->id_reclamation = $id_reclamation;
 }

 public function getReponse(): string {
  return $this->reponse;
 }

 public function setReponse(string $reponse): void {
  $this->reponse = $reponse;
 }

 public function getDate(): DateTime {
  return $this->date;
 }

 public function setDate(DateTime $date): void {
  $this->date = $date;
 }

 public function getId(): int {
  return $this->id;
 }

 public function setId(int $id): void {
  $this->id = $id;
 }

 public function getIdAdmin(): int {
  return $this->id_admin;
 }

 public function setIdAdmin(int $id_admin): void {
  $this->id_admin = $id_admin;
 }

 public function getIdReclamation(): int {
  return $this->id_reclamation;
 }

 public function setIdReclamation(int $id_reclamation): void {
  $this->id_reclamation = $id_reclamation;
 }
}
