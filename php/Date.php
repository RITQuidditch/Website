<?php
/*
 * Date.php
 */

/**
 * A date.
 */
class RITQ_Date
{
    private $year;
    private $month;
    private $day;
    private $hour;
    private $minute;
    private $second;

    public function __construct( $year = '1970', $month = '1', $day = '1', 
        $hour = '0', $minute = '0', $second ='0' )
    {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
        $this->hour = $hour;
        $this->minute = $minute;
        $this->second = $second;
    }

    public function __get($key)
    {
        return $this->$key;
    }

    public function getNumeric()
    {
        $year = $this->year;
        $month = ( ( strlen( $this->month ) < 2 ) ? "0" : "" ) . $this->month;
        $day = ( ( strlen( $this->day ) < 2 ) ? "0" : "" ) . $this->day;
        $hour = ( ( strlen( $this->hour ) < 2 ) ? "0" : "" ) . $this->hour;
        $minute = ( ( strlen( $this->minute ) < 2 ) ? "0" : "" ) .
                                                                $this->minute;
        $second = ( ( strlen( $this->second ) < 2 ) ? "0" : "" ) . 
                                                                $this->second;
        return $year . $month . $day . $hour . $minute . $second;
    }

    public function getHourTwelve()
    {
        $newhour = intval( $hour );
        $newhour = ( $newhour % 12 ) + 1;
        return strval( $newhour );
    }

    public function getMonthName()
    {
        $result = '';
        switch ( $this->month )
        {
            case '1';
                $result = 'January';
                break;
            case '2';
                $result = 'February';
                break;
            case '3';
                $result = 'March';
                break;
            case '4';
                $result = 'April';
                break;
            case '5';
                $result = 'May';
                break;
            case '6';
                $result = 'June';
                break;
            case '7';
                $result = 'July';
                break;
            case '8';
                $result = 'August';
                break;
            case '9';
                $result = 'September';
                break;
            case '10';
                $result = 'October';
                break;
            case '11';
                $result = 'November';
                break;
            case '12';
                $result = 'December';
                break;
        }
        return $result;
    }

    public function getFormated( $format )
    {
        $result = "";
        for ( $i = 0; $i < strlen( $format ); $i += 1 )
        {
            $c = substr( $format, $i, 1 );
            if ( $c == '%' )
            {
                $i += 1;
                if ( $i < strlen( $format ) )
                {
                    $c = substr( $format, $i, 1 );
                    switch ( $c )
                    {
                        case 'y':
                            $result .= $this->year;
                            break;
                        case 'm':
                            $result .= $this->month;
                            break;
                        case 'M':
                            $result .= $this->getMonthName();
                            break;
                        case 'd':
                            $result .= $this->day;
                            break;
                        case 'H':
                            $result .= $this->getHourTwelve();
                            break;
                        case 'h':
                            $result .= $this->hour;
                            break;
                        case 'n':
                            $result .= $this->minute;
                            break;
                        case 's':
                            $result .= $this->second;
                            break;
                        default:
                            $result .= '%'.$c;
                            break;
                    }
                }
                else
                {
                    $result .= '%';
                }
            }
            else
            {
                $result .= $c;
            }
        }
        return $result;
    }
}
?>
