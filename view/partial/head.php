<!DOCTYPE html> 
<html> 
<head> 
	<title>Exchange rates</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="/css/jquery.mobile-1.2.0.min.css" />
	<script src="/js/jquery-1.8.2.min.js"></script>
	<script src="/js/jquery.mobile-1.2.0.min.js"></script>
        <style>
           .ui-mobile-viewport div.ui-select .ui-btn-inner{padding-right: 36px;}
        </style>
        <script>
         $(document).ready(function(){
              

			var availableTags = ['<?php echo count($curs)?>', 
                            <?php foreach($curs as $cur){
                                echo "'".$cur."',";
                            }?>
                        'NONE'];

			$("#source").autocomplete({
				target: $('#suggestions'),
                                icon: 'arrow-r',
				source: availableTags,
				minLength: 1,
                                callback: function(e) {
					var $a = $(e.currentTarget);
					$('#source').val($a.text());
					$("#source").autocomplete('clear');
				},
				matchFromStart: true
			});
                        
                        $("#target").autocomplete({
				target: $('#suggestions2'),
                                icon: 'arrow-r',
				source: availableTags,
				minLength: 1,
                                callback: function(e) {
					var $a = $(e.currentTarget);
					$('#target').val($a.text());
					$("#target").autocomplete('clear');
				},
				matchFromStart: true
			});
		});
	 
         
       
            </script>
</head> 