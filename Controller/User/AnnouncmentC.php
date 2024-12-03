<?php

include '../../Model/User/Announcement.php';

$db = config::getConnexion();

class AnnouncementC
{
    public function listannoun()
    {
        $sql = "SELECT * FROM `announcement_staff` ORDER BY `timestamp` DESC;";
        global $db;
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addAnnoun($Announcement) {
        $sql = "INSERT INTO announcement_staff  
        VALUES ('',:id_staff,:announ,CURRENT_TIMESTAMP)";
        global $db;
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_staff'=>$Announcement->getid_staff(),
                'announ'=>$Announcement->getcontent(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function deletAnnoun($id)
    {
        $sql = "DELETE FROM announcement_staff WHERE id_announcement=:id";
        global $db;
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}