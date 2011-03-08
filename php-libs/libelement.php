<?php

function element_banner()
{
    echo "<div class=\"banner\"> <img src=\"images/banner.png\" /> </div>";
}

function element_nav()
{
    echo "<div class=\"nav_bar\">";
    echo "    <a class=\"nav_button\" href=\"index.php\">HOME</a>";
    echo "    <a class=\"nav_button\" href=\"news.php\">NEWS</a>";
    echo "    <a class=\"nav_button\" href=\"about.php\">ABOUT</a>";
    echo "    <a class=\"nav_button\" href=\"calendar.php\">CALENDAR</a>";
    echo "    <a class=\"nav_button\" href=\"contact.php\">CONTACT</a>";
    echo "    <a class=\"nav_button\" href=\"faq.php\">FAQ</a>";
    echo "</div>";
}

function element_anchor()
{
    echo "<a class=\"anchor\" >RIT Quidditch &copy; 2011</a>";
}

function element_header()
{
    element_banner();
    element_nav();
}

function element_footer()
{
    element_anchor();
}
?>
