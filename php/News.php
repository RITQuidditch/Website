<?php
/*
 * News.php
 */

/**
 * A news peice gathered from a feed. 
 */
class RITQ_News
{
    private $title;
    private $date;
    private $content;

    public function __construct( $title = '', $date = null, $content = '' )
    {
        $this->title = $title;
        $this->date = $date;
        $this->content = $content;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getContent()
    {
        return $this->content;
    }

}
?>
