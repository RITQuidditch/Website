<?php

require_once( "php/News.php" );
require_once( "php/Date.php" );
require_once( "Zend/Gdata.php" );
require_once( "Zend/Gdata/ClientLogin.php" );
require_once( "Zend/Gdata/Query.php" );
require_once( "Zend/Gdata/Feed.php" );

class RITQ_NewsFactory
{
    private $feed = null;

    public function __construct( $user, $pass, $blogID )
    {
        $client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, 'blogger', null, Zend_Gdata_ClientLogin::DEFAULT_SOURCE, null, null, Zend_Gdata_ClientLogin::CLIENTLOGIN_URI, 'GOOGLE' );
        $gdClient = new Zend_Gdata( $client );
        $query = new Zend_Gdata_Query( 'http://www.blogger.com/feeds/'.$blogID.'/posts/default' );
        $this->feed = $gdClient->getFeed( $query );
    }

    public function getNews()
    {
        return $this->getNewsInterval( 0, $this->feed->count() );
    }

    public function getNewsIndex( $index )
    {
        $entry = $this->feed->entries[ $index ];

        $rawdate = $entry->published;
        $year = substr( $rawdate, 0, 4 );
        $month = substr( $rawdate, 5, 2 );
        if ( substr( $month, 0, 1 ) == "0" )
        {
            $month = substr( $month, 1, 1 );
        }
        $day = substr( $rawdate, 8, 2 );
        if ( substr( $day, 0, 1 ) == "0" )
        {
            $day= substr( $day, 1, 1 );
        }
        $hour = substr( $rawdate, 11, 2 );
        if ( substr( $hour , 0, 1 ) == "0" )
        {
            $hour = substr( $hour , 1, 1 );
        }
        $minute = substr( $rawdate, 14, 2 );
        if ( substr( $minute , 0, 1 ) == "0" )
        {
            $minute = substr( $minute , 1, 1 );
        }
        $second = substr( $rawdate, 17, 2 );
        if ( substr( $second , 0, 1 ) == "0" )
        {
            $second = substr( $second , 1, 1 );
        }

        $title = $entry->title;
        $date = new RITQ_Date( $year, $month, $day, $hour, $minute, $second );
        $content = $entry->content;
        
        return new RITQ_News( $title, $date, $content );

    }

    public function getNewsInterval( $start, $end )
    {
        $limit = min( $end, $this->feed->count() );
        $result = array();
        for ( $i = $start; $i < $limit; $i += 1 )
        {
            $result[] = $this->getNewsIndex( $i );
        }
        return $result;
    }

    public function getNewsCount()
    {
        return $feed->count();
    }

}
?>
