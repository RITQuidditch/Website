<?php

require_once( "php/AboutEntry.php" );

class RITQ_About
{
    private $entries = array();

    public function __construct( $filename )
    {
        $xmlDoc = new DOMDocument();
        $xmlDoc->load( $filename );

        $root = $xmlDoc->documentElement;
        if ( $root->nodeName == "about" )
        {

            foreach ( $root->childNodes AS $node )
            {

                if ( $node->nodeName == "entry" )
                {

                    $title = "No Title";
                    $body = "No Body";

                    foreach ( $node->childNodes AS $entryNode )
                    {

                        switch ( $entryNode->nodeName )
                        {
                            case "title":
                                $title = $entryNode->textContent;
                                break;
                            case "body":
                                $body = $entryNode->textContent;
                                break;
                        }

                    }

                    $entry = new RITQ_AboutEntry( $title, $body );
                    $this->entries[] = $entry;

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

        for ( $i = $start; $i < $end; $i += 1 )
        {
            $subentries[] = $this->entries[$i];
        }

        return $subentries;
    }

    public function getEntryCount()
    {
        return $entries->count;
    }

}
?>
