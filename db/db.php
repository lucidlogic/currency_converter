<?php
/**
 * Data connection class, add db server credentials here
 * @author Gareth Edwards
 * @package test
 * @since 29 Oct 2012
 */
class Db
{
    /**
     * @object db connection
     */
    public  $dblinkid;
		
    /**
    * Establish Database connection
    */
    function __construct()
    {
        $config = new config();
        $this->dblinkid = @mysql_connect($config->getDbHost(),$config->getDbUser(),$config->getDbPassword());
         //failure to connect
        if(!$this->dblinkid){
            echo "<b>Error establishing connection to the database</b>";
            return false;
        }
        
	// Select the database using the established connection			
	mysql_select_db($config->getDbName(),$this->dblinkid);
    }	

}