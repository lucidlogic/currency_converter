<?php
/**
 * Cronjob, to be run via cli to update the exchange rate
 * @author Gareth Edwards
 * @package test
 * @since 29 Oct 2012
 */

defined('APPLICATION_PATH') || define('APPLICATION_PATH', dirname(__DIR__) );
include(APPLICATION_PATH.'/config/config.php');
include(APPLICATION_PATH.'/db/db.php');
include(APPLICATION_PATH.'/model/ExchangeRate.php');

$config = new config();
$exrate = new Exchange_Rate();

//cli check
if($exrate->isCommandLineInterface() && $exrate->isEmptyDay())
{
    //handle remote csv of exchange rates
    $handle = fopen($config->getXeUrl(), "r");
    while (($data = fgetcsv($handle)) !== FALSE) 
    {
        //Ignore unnecessary arrays
        if( count($data)>3)
        {
            $exrate->save($data);
            echo "saved ".$data[0]." \n";
        }

    }
}
else
{
    echo "Only cli access, please configure cronjob.";
    
}
