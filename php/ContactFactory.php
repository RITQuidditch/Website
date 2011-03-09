<?php

require_once( "php/Contact.php" );
require_once( "Zend/Gdata/Spreadsheets.php" );
require_once( "Zend/Gdata/Spreadsheets.php" );
require_once( "Zend/Gdata/Spreadsheets/ListQuery.php" );
require_once( "Zend/Gdata/ClientLogin.php" );

class RITQ_ContactFactory
{
    private $service = null;
    private $query = null;

    public function __construct( $user, $pass, $sheetKey, $wsID )
    {
        $client = Zend_Gdata_ClientLogin::getHttpClient( $user, $pass, Zend_Gdata_Spreadsheets::AUTH_SERVICE_NAME );
        $this->service = new Zend_Gdata_Spreadsheets( $client );
        $this->query = new Zend_Gdata_Spreadsheets_ListQuery();
        $this->query->setSpreadsheetKey( $sheetKey );
        $this->query->setWorksheetId( $wsID );
    }

    public function getContacts()
    {
        return $this->getContactsQuery( "" );
    }

    public function getContactsPair( $col, $val )
    {
        return $this->getContactsQuery( $col . '=' . $val );
    }

    public function getContactsQuery( $query )
    {
        $result = array();
        if ( $query != '' ) 
        {
            $this->query->setSpreadsheetQuery( $query );
        }
        $listFeed = $this->service->getListFeed( $this->query );
        foreach ( $listFeed->entries AS $rowdata )
        {
            $name = "No Name";
            $title = "No Title";
            $email = "No Email";
            $picture = null;
            foreach ( $rowdata->getCustom() AS $cell )
            {
                switch ( $cell->getColumnName()  )
                {
                    case 'name':
                        $name = $cell->getText();
                        break;
                    case 'title':
                        $title = $cell->getText();
                        break;
                    case 'email':
                        $email = $cell->getText();
                        break;
                    case 'picture':
                        $picture = $cell->getText();
                        break;
                }
            }
            $result[] = new RITQ_Contact( $name, $title, $email, $picture );
        }
        return $result;
    }
}
?>
