<?php

require_once( "php/FAQEntry.php" );

class RITQ_FAQ
{
    private $entries = array();

    public function __construct( $filename )
    {
        $xmlDoc = new DOMDocument();
        $xmlDoc->load( $filename );

        $root = $xmlDoc->documentElement;
        if ( $root->nodeName == "faq" )
        {

            foreach ( $root->childNodes AS $node )
            {

                if ( $node->nodeName == "entry" )
                {

                    $question = "No Question";
                    $answer = "No Answer";

                    foreach ( $node->childNodes AS $entryNode )
                    {

                        switch ( $entryNode->nodeName )
                        {
                            case "question":
                                $question = $entryNode->textContent;
                                break;
                            case "answer":
                                $answer = $entryNode->textContent;
                                break;
                        }

                    }

                    $entry = new RITQ_FAQEntry( $question, $answer );
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
