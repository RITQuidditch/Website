<?php

require_once( "php/News.php" );
require_once( "php/Date.php" );

class RITQ_NewsFactory
{
    private $entries = array();

    public function __construct( $newsdir )
    {
        $handle = opendir( $newsdir );
        while ( false !== ( $file = readdir( $handle ) ) )
        {
            if ( substr( $file, 0, 1 ) == "." )
            {
                continue;
            }

            $xmlDoc = new DOMDocument();
            $xmlDoc->load( $newsdir . "/" . $file );

            $title = "No Title";
            $date = "No Date";
            $content = "No Content";

            $root = $xmlDoc->documentElement;
            if ( $root->nodeName == "news" )
            {
                foreach ( $root->childNodes AS $newsNode )
                {
                    switch ( $newsNode->nodeName )
                    {
                    case "title":
                        $title = $newsNode->textContent;
                        break;
                    case "date":
                        $year = substr( $newsNode->textContent, 0, 4 );
                        $month = substr( $newsNode->textContent, 4, 2 );
                        $day = substr( $newsNode->textContent, 6, 2 );
                        $date = new RITQ_Date( $year, $month, $day );
                        break;
                    case "content":
                        $content = $newsNode->textContent;
                        break;
                    }
                }
            }

            $this->entries[] = new RITQ_News( $title, $date, $content );
        }

        $changes = 0;
        $k = count( $this->entries ) - 1;
        do {
            $changes = 0;
            for ( $i = 0; $i < $k; $i += 1 )
            {
                if ( strcmp( $this->entries[$i]->getDate()->getNumeric(),
                     $this->entries[$i + 1]->getDate()->getNumeric() ) < 0 )
                {
                    $tmp = $this->entries[$i];
                    $this->entries[$i] = $this->entries[$i + 1];
                    $this->entries[$i + 1] = $tmp;
                    $changes += 1;
                }
            }
            $k -= 1;
        } while ( $changes != 0 );
    }

    public function getNews()
    {
        return $this->getNewsInterval( 0, count( $this->entries ) );
    }

    public function getNewsIndex( $index )
    {
        return $this->entries[ $index ];
    }

    public function getNewsInterval( $start, $end )
    {
        $result = array();
        $limit = min( $end, count( $this->entries ) );

        for ( $i = $start; $i < $limit; $i += 1 )
        {
            $result[] = $this->entries[ $i ];
        }

        return $result;
    }

    public function getNewsCount()
    {
        return count( $this->entries );
    }

}
?>
