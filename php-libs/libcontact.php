<?php

require_once( "php-libs/libinfo.php" );

function contact_get( $link, $title ) 
{

    if ( $link )
    {
        mysql_select_db( info_db(), $link );

        $query="SELECT * FROM people WHERE title = '".$title."';";
        $result=mysql_query( $query );

        while( $row=mysql_fetch_array( $result ) )
        {
            echo "<td><div class=\"contact_pic\">";
            echo "    <img src=\"".$row['bigpic']."\" />";
            echo "</div></td>";
            echo "<td><div class=\"contact_info\">";
            echo "    ".$row['name']."<br/>".$row['title']."<br/>";
            echo "    <a href=\"".$row['email']."\">".$row['email']."</a><br/>"; 
            echo "</div></td>";
        }
    }

}

?>
