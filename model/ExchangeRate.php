<?php
/**
 * Exchange Rate class, the model to handle all exchange rate operations
 * @author Gareth Edwards
 * @package test
 * @since 29 Oct 2012
 */
class Exchange_Rate
{
        /**
         * @object Data
        */
	public $dataconnection;
        
        /**
         * @string date
        */
        public $created_at = false;
        
        /**
         * @string
        */
        public $source = false;
        
        /**
         * @string
        */
        public $target = false;
        
        /**
         * @int
        */
        public $source_amount = false;
        
        /**
         * @int
        */
        public $target_amount = false;
        
        
        const TABLE_NAME = 'exchange_rate';
	
	
        /**
        * Saves exchange rate record 
        * @param array $data
        * @return bool
        */
	function save($data) 
        {
	    $this->dataconnection = new Db();
            $sql = sprintf("INSERT INTO %s VALUES ('','%s','%s','%s','%s','%s') ",Exchange_Rate::TABLE_NAME,$data[0],$data[1],$data[2],$data[3],date('Y-m-d H:i:s'));
            return mysql_query($sql,$this->dataconnection->dblinkid);
        }
	
        /**
        * Check if running from CLI
        * @return bool
        */
        function isCommandLineInterface()
        {
             return (php_sapi_name() === 'cli');
        }
        
        /**
        * Get List of currencies
        * @return array
        */
        function getCurrencyList()
	{
	   $this->dataconnection = new Db();
	   $sql = sprintf("SELECT `short` FROM %s GROUP BY `short`",Exchange_Rate::TABLE_NAME);
	   $result = mysql_query($sql,$this->dataconnection->dblinkid);
           while($row = mysql_fetch_array($result))
	   {
	    $return[] = $row['short'];
	   }
				  
	   mysql_close($this->dataconnection->dblinkid); 
	   return @$return ;
	}
        
        /**
        * Get List of currencies
        * @return array
        */
        function getRateList($source,$created_at,$target)
	{
            
          // if($short)$short = "AND `short`='".$short."'";
           if($created_at)$created_at = " AND `created_at` = '".$created_at."'";
           if($target)$target = "AND `short`='".$target."'";
	   $this->dataconnection = new Db();
           
	   $sql = "SELECT `long`, `short`,`rate_buy`,`created_at`, (select rate_sell from ".Exchange_Rate::TABLE_NAME." where `short`='".$source."' $created_at) as base FROM ".Exchange_Rate::TABLE_NAME." WHERE `rate_buy` > 0 $target $created_at ";
           $result = mysql_query($sql,$this->dataconnection->dblinkid);
           while($row = mysql_fetch_array($result))
	   {
	    $return[] = $row;
	   }
				  
	   mysql_close($this->dataconnection->dblinkid); 
	   return @$return ;
	}
        
        /**
        * Check if no currencied exist for today
        * @return bool
        */
        function isEmptyDay()
	{
           $this->dataconnection = new Db();
	   $sql = sprintf("SELECT count(*) as tot FROM ".Exchange_Rate::TABLE_NAME." WHERE `created_at` = '%s' ",date('Y-m-d'));
           $result = mysql_query($sql,$this->dataconnection->dblinkid);
           $return = true;
           
           while($row = mysql_fetch_array($result))
	   {
	    if($row['tot'])$return = false;
	   }
				  
	   mysql_close($this->dataconnection->dblinkid); 
	   return @$return ;
	}
        
        
        
        
	
}
?>
