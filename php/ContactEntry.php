<?php
class RITQ_ContactEntry
{
    private $name;
    private $title;
    private $email;
    private $picture;

    public function __construct( $name = '', $title = '', 
        $email = '', $picture = '' )
    {
        $this->name = $name;
        $this->title = $title;
        $this->email = $email;
        $this->picture = $picture;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPicture()
    {
        return $this->picture;
    }

}
?>
