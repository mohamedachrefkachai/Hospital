<?php
class Announcement
{
    private ?int $id_staff  = null;
    private ?string $content = null;

    public function __construct($id_staff,$content)
    {
        $this->id_staff=$id_staff;
        $this->content=$content;
    }

    public function getid_staff()
    {
        return $this->id_staff;
    }


    public function setid_staff($id_staff)
    {
        $this->id_staff=$id_staff;
        return $this;
    }

    public function getcontent()
    {
        return $this->content;
    }

    public function setncontent($content)
    {
        $this->content=$content;
        return $this;
    }

}