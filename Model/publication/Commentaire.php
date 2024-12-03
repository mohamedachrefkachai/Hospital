
<?php 
class Commentaire {
 private string $commentaire;
 private DateTime $date;
 private int $id;
 private int $id_admin;
 private int $id_publication;

 public function __construct(string $commentaire, DateTime $date, int $id, int $id_admin, int $id_publication) {
  $this->commentaire = $commentaire;
  $this->date = $date;
  $this->id = $id;
  $this->id_admin = $id_admin;
  $this->id_publication = $id_publication;
 }

 public function getCommentaire(): string {
  return $this->commentaire;
 }

 public function setCommentaire(string $commentaire): void {
  $this->commentaire = $commentaire;
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

 public function getIdPublication(): int {
  return $this->id_publication;
 }

 public function setIdpublication(int $id_publication): void {
  $this->id_publication = $id_publication;
 }
}
