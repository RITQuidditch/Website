<?php

require_once( "php-libs/libinfo.php" );
require_once( "Zend/Gdata.php" );
require_once( "Zend/Gdata/Feed.php" );
require_once( "Zend/Gdata/Query.php" );

function news_get_feed( $blogID )
{
    $gdClient = new Zend_Gdata();
    $query = new Zend_Gdata_Query( 'http://www.blogger.com/feeds/' . $blogID . '/posts/default' );
    return $gdClient->getFeed( $query );
}

function news_display_post( $entry )
{
    echo '<hr />';
    echo '<h3 class="news_title" >'.$entry->title.'</h3>';
    echo '<p class="news_date" >'.$entry->published.'</p>';
    echo '<p class="news_content" >'.$entry->content.'</p>';
}

function news_display_latest( $count )
{
    $feed = news_get_feed( info_blogID() );
    $limit = min( $count, $feed->count() );
    for ( $i = 0; $i < $limit; $i += 1 )
    {
        news_display_post( $feed->current() );
        $feed->next();
    }
}

?>
