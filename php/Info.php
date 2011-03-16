<?php

class RITQ_Info
{
    private $user;
    private $pass;
    private $blogid;
    private $contactsid;
    private $contactsws;

    public function __construct( $filename )
    {

        $xmlDoc = new DOMDocument();
        $xmlDoc->load( $filename );

        $root = $xmlDoc->documentElement;
        if ( $root->nodeName == "info" )
        {
            foreach( $root->childNodes AS $node )
            {
                switch( $node->nodeName )
                {
                    case "user":
                        $this->user = $node->textContent;
                        break;
                    case "pass":
                        $this->pass = $node->textContent;
                        break;
                    case "blogid":
                        $this->blogid = $node->textContent;
                        break;
                    case "contactsid":
                        $this->contactsid = $node->textContent;
                        break;
                    case "contactsws":
                        $this->contactsws = $node->textContent;
                        break;
                }
            }
        }
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function getBlogId()
    {
        return $this->blogid;
    }

    public function getContactsId()
    {
        return $this->contactsid;
    }

    public function getContactsWS()
    {
        return $this->contactsws;
    }

}

?>
