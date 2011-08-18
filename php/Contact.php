<?php

require_once( "php/ContactEntry.php" );

class RITQ_Contact
{
    private $entries = array();

    public function __construct( $filename )
    {
        $xmlDoc = new DOMDocument();
        $xmlDoc->load( $filename );

        $root = $xmlDoc->documentElement;
        if ( $root->nodeName == "contact" )
        {
            foreach ( $root->childNodes AS $node )
            {
                if ( $node->nodeName == "entry" )
                {
                    $name = "No Name";
                    $title = "No Title";
                    $email = "No Email";
                    $picture = "No Picture";

                    foreach ( $node->childNodes AS $entryNode )
                    {
                        switch ( $entryNode->nodeName )
                        {
                        case "name":
                            $name = $entryNode->textContent;
                            break;
                        case "title":
                            $title = $entryNode->textContent;
                            break;
                        case "email":
                            $email = $entryNode->textContent;
                            break;
                        case "picture":
                            $picture = $entryNode->textContent;
                            break;
                        }
                    }

                    $this->entries[] = new RITQ_ContactEntry( $name, $title,
                        $email, $picture );
                }
            }
        }
    }

    public function getEntry( $i )
    {
        return $this->entries[$i];
    }

    public function getEntries()
    {
        return $this->entries;
    }

    public function getEntryRange( $start, $end )
    {
        $subentries = array();
        $limit = min( $end, count( $this->entries ) );

        for ( $i = $start; $i < $limit; $i += 1 )
        {
            $subentries[] = $this->entries[$i];
        }

        return $subentries;
    }

    public function getEntryCount()
    {
        return count( $this->entries );
    }
}
?>
