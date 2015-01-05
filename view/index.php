<?php include('partial/head.php');?>
<body> 

<div data-role="page" id="page">

    <div data-role="header">
        <h1>Exchange Rates</h1>
    </div><!-- /header -->

<div data-role="content">	
 <form action='/' method='post' class='ui-body ui-body-b ui-corner-all' data-ajax="false"> 
   
   
    <div data-role="fieldcontain">
        <label for="source">Convert this many ...</label>
        <input type="range" name="source_amount" id="source_amount" value="<?php echo ($_POST['source_amount'] ? $_POST['source_amount'] : '1')?>" min="0" max="1000" step="0.1" style='width:10%;t'  />
    </div>  
    <div data-role="fieldcontain">
     <label for="source">Of this currency ...</label>
        <input type="text" autocomplete="off" id="source" name="source" value="<?php echo ($_POST['source'] ? $_POST['source'] : 'USD')?>" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" >
        <ul id="suggestions" data-role="listview" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow" ></ul>
    </div>   
    <div data-role="fieldcontain">
    <label for="source">Into this currency ...</label>
    <input type="text" autocomplete="off" id="target" name="target"  value="<?php echo $_POST['target']?>" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" >
    <ul id="suggestions2" data-role="listview" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow" ></ul>
    
    </div>
    <div data-role="fieldcontain">
       
       <fieldset data-role="controlgroup" data-type="horizontal" class=" ui-controlgroup ui-controlgroup-horizontal"><div role="heading" class="ui-controlgroup-label">On this day ...</div><div class="ui-controlgroup-controls">
        
        <div class="ui-select">
                        <select name="created_day" id="select-choice-day">
            <?php
                        $selected = (isset($_POST['created_day']) ? $_POST['created_day'] : date('d'));

                        for ($i = 1; $i <= 31; $i++)
                        {
                            $day = date('d', mktime(0, 0, 0, 0, $i, 2012));
                            echo '<option value="'.$day.'"';
                            if($day == $selected)echo ' SELECTED ';
                            echo '>'.$day.'</option>';
                        }

                         ?>
        </select></div>
        <div class="ui-select">
                        <select name="created_month" id="select-choice-month">
            <?php
                        $selected = (isset($_POST['created_month']) ? $_POST['created_month'] : date('m'));

                        for ($i = 1; $i <= 12; $i++)
                        {
                            $month_name = date('M', mktime(0, 0, 0, $i, 1, 2012));
                            $month_number = date('m', mktime(0, 0, 0, $i, 1, 2012));
                            echo '<option value="'.$month_number.'"';
                            if($month_number == $selected)echo ' SELECTED ';
                            echo '>'.$month_name.'</option>';
                        }

                         ?>
        </select></div>

        

        <div class="ui-select">
                        <select name="created_year" id="select-choice-year">
            <?php
                        $selected = (isset($_POST['created_year']) ? $_POST['created_year'] : date('Y'));

                        for ($i = date('Y'); $i >= 2000; $i--)
                        {
                            echo '<option value="'.$i.'"';
                            if($i == $selected)echo ' SELECTED ';
                            echo '>'.$i.'</option>';
                        }

                         ?>
        </select></div>
    </div></fieldset>
    </div>
     <input type='submit' value='Go &#9658;'/>
  
    <?php
    if($rates)
        {
    ?>
           <p>&nbsp;</p>     
                <div class="ui-grid-b">
            <div class="ui-block-a"><div class="ui-bar ui-bar-a" style="height:30px;"></div></div>
            <div class="ui-block-b"><div class="ui-bar ui-bar-a" style="height:30px;"></div></div>
            <div class="ui-block-c"><div class="ui-bar ui-bar-a" style="height:30px;">Date</div></div>
        </div>
           <?php foreach($rates as $rate){ 
               $amount = $_POST['source_amount'];
               $total = $amount*$rate['base']*$rate['rate_buy'];
               
               ?>
           <div class="ui-grid-b">
            <div class="ui-block-a"><div class="ui-bar ui-bar-d" style="height:30px;"><?php echo $rate['long']?></div></div>
            <div class="ui-block-b"><div class="ui-bar ui-bar-d" style="height:30px;"><?php echo $rate['short'].' '.money_format('%i', $total)?></div></div>
            <div class="ui-block-c"><div class="ui-bar ui-bar-d" style="height:30px;"><?php echo $rate['created_at']?></div></div>
        </div>
           <?php } ?>
  <?php
    }else{  ?>
           <p>&nbsp;</p>     
           <div class="ui-grid-c">Sorry no results, try changing the form &uarr;
             </div>
<?php }?>
            </form>
</div><!-- /content -->
 

    
</div><!-- /page -->

</body>
</html>