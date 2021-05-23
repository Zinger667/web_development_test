var now = new Date();

function SetNumBoxValueFromSlider1(){
    let numBox = document.getElementById("sumOfContributionBox1");
    let slider = document.getElementById("sumOfContributionSlider1")
    numBox.value = slider.value;
}

function SetNumBoxValueFromSlider2(){
    let numBox = document.getElementById("sumOfContributionBox2");
    let slider = document.getElementById("sumOfContributionSlider2")
    numBox.value = slider.value;
}

function SetSliderValueFromNumBox1(){
    let numBox = document.getElementById("sumOfContributionBox1");
    let slider = document.getElementById("sumOfContributionSlider1")
    slider.value = numBox.value;
}

function SetSliderValueFromNumBox2(){
    let numBox = document.getElementById("sumOfContributionBox2");
    let slider = document.getElementById("sumOfContributionSlider2")
    slider.value = numBox.value;
}

function ClearCheckBox(){
    let checkBox = document.getElementById("checkBox");
    checkBox.value = "";
}

$( function() {
   
    $( "#date" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
    
    var minDate = $( "#date" ).datepicker( "option", "minDate" );
    $( "#date" ).datepicker( "option", "minDate", now );
    $( "#date" ).datepicker( $.datepicker.regional[( "ru" )]);
    $( "#date" ).datepicker( "option", "dateFormat", "dd.mm.yy" );
  } );

$(document).ready(function() {
    $("#form").on("submit",
		function(){
            console.log('aboba')
			Result('result', 'form', 'calc.php');
			return false; 
		}
	);
});

function Result(result_form, form, url){
    $.ajax({
        url: '/calc.php',
        method: 'POST',
        dataType: 'html',
        data: jQuery('#'+form).serialize(),
        success: function(data){
            console.log('aboba')
            document.getElementById('result').innerHTML=data;
        }
    });
}


