<?php

require_once( "php/Contact.php" );

class RITQ_Render
{
    function header()
    {
        echo '<div class="header">'."\n";
        echo '<img src="images/banner.png" />'."\n";
        echo '<div class="nav_bar">'."\n";
        echo '<a class="nav_button" href="index.php">HOME</a>'."\n";
        echo '<a class="nav_button" href="news.php">NEWS</a>'."\n";
        echo '<a class="nav_button" href="about.php">ABOUT</a>'."\n";
        echo '<a class="nav_button" href="calendar.php">CALENDAR</a>'."\n";
        echo '<a class="nav_button" href="contact.php">CONTACT</a>'."\n";
        echo '<a class="nav_button" href="faq.php">FAQ</a>'."\n";
        echo '</div>';
        echo '</div>';
    }

    function footer()
    {
        echo '<div class="footer" >RIT Quidditch &copy; 2011</div>';
    }

    function contact( $contact )
    {
        echo '<hr />'."\n";
        echo '<table border="0" width="720" >'."\n";
        echo '<tr>'."\n";
        echo '<td>'."\n";
        echo '<img src="'.$contact->getPicture().'" />'."\n";
        echo '</td>'."\n";
        echo '<td>'."\n";
        echo '<p class="body_right" >'.$contact->getName().'</p>'."\n";
        echo '<p class="body_right" >'.$contact->getTitle().'</p>'."\n";
        echo '<p class="body_right" ><a href="mailto:'.$contact->getEmail().'" >'.$contact->getEmail().'</a></p>'."\n";
        echo '</td>'."\n";
        echo '</table>'."\n";
    }

    function news( $news ) 
    {
        echo '<hr />'."\n";
        echo '<h3 class="section" >'.$news->getTitle().'</h3>'."\n";
        echo '<p class="body_left" >'.$news->getDate()->getFormated( "%M %d, %y" ).'</p>'."\n";
        echo '<p class="body_left" >'.$news->getContent().'</p>'."\n";
    }
}
?>
