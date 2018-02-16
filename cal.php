<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
    <head>
        <title>Collection Date</title>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> 
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script> 
        <link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css" /> 

    </head>
<body> 
date:- <input id="departure" />
<div class="monthlist">

</div>
<script type="text/javascript">
    $(document).ready(function() {
    $("#departure").datepicker({
    dateFormat: "dd/mm/yy",
    changeMonth: true,
    changeYear: true,
    maxDate: "+4y",
    minDate: "-4y"
});
$("#departure").change(function()
    {       	
     $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>index.php/welcome/fetchmonth", 
         data: {},
         success: 
                function(data){
                $('.monthlist').html(data);				
              }
          });
     return false;
 });
    });
	
function myFunction(id) {
	      $(".monthbtn").css("display", "none");
	      $("#monthbtn" + id).css("display", "block");
}

function myFunction1(id) {
	alert(id);
		 value = $("#monthvalue" + id).val();
		 alert(value);
		 for (i = id; i <=  6; i++) {  
		 $("#monthvalue" + i).val(value);
		 
		 }
}
function submit1() {
	date = $('#departure').val();
	 var selectednumbers = [];
         $('.monthvalue').each(function(i, selected) {
            selectednumbers[i] = $(selected).val();
			
         });
		 alert(selectednumbers);
	}	
</script>


</body>
</html>
