<?php

class Controller
{
     public $data;
     
     public function run()
     {
       if(!$_REQUEST['controller'])$_REQUEST['controller'] = 'index';
       $action = sprintf('action%s',ucwords($_REQUEST['controller']));
       $this->$action();
         
     }
     
     public function actionIndex()  
     {  
         $exrate = new Exchange_Rate();
         //all currencies listed in the sysetm
     	 $curs = $exrate->getCurrencyList(); 
         //concat year month day to form DB date
         $created_at = sprintf('%s-%s-%s',$_POST['created_year'],$_POST['created_month'],$_POST['created_day']);
        //source cur default USD
         $source = sprintf('%s',$_POST['source']);
         //default amount default 1
         $source_amount = sprintf('%s',$_POST['source_amount']);
         //target currency
         $target = sprintf('%s',$_POST['target']);
         //result of the query
         $rates = $exrate->getRateList($source,$created_at,$target); 
         include('../view/index.php');
     }  
     
}