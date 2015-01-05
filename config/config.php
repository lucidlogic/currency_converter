<?php
/**
 * Config class
 * @author Gareth Edwards
 * @package test
 * @since 29 Oct 2012
 */
class Config
{
    private $db_user     = "root";	// User name
    private $db_password = "root";	// Password
    private $db_name     = "test";  // Database name in MySQL
    private $db_host     = "127.0.0.1"; // Host name
    private $xe_url      = "https://www.xe.com/dfs/sample-usd.csv"; // Currency exchange URL
    private $time_zone   = "Africa/Johannesburg"; //server timezone
    
    /**
    * Set Timezone on initializing
    */
    function __construct() 
    {
    date_default_timezone_set($this->time_zone);
    }
    
    /**
    * return db user for creating a connection
    * @return string
    */
    public function getDbUser()
    {
        return $this->db_user;
    }
    
    /**
    * return db password for creating a connection
    * @return string
    */
    public function getDbPassword()
    {
        return $this->db_password;
    }
    
    /**
    * return db name for creating a connection
    * @return string
    */
    public function getDbName()
    {
        return $this->db_name;
    }
    
    /**
    * return db host for creating a connection
    * @return string
    */
    public function getDbHost()
    {
        return $this->db_host;
    }
    
    /**
    * return currency exchange url
    * @return string
    */
    public function getXeUrl()
    {
        return $this->xe_url;
    }
    
}
?>
