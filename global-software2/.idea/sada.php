function calcDeposit()
{
var v1=0;
if(!$('#Vehicle_deposit1').val()=='')
{
v1=$('#Vehicle_deposit1').val();
}

var v2=0;
if(!$('#Vehicle_deposit2').val()=='')
{
v2=$('#Vehicle_deposit2').val();
}

var v3=0;
if(!$('#Vehicle_deposit3').val()=='')
{
v3=$('#Vehicle_deposit3').val();
}

var v4=0;
if(!$('#Vehicle_deposit4').val()=='')
{
v4=$('#Vehicle_deposit4').val();
}

var v5=0;
if(!$('#Vehicle_deposit5').val()=='')
{
v5=$('#Vehicle_deposit5').val();
}

var valT=parseFloat(v1)+parseFloat(v2)+parseFloat(v3)+parseFloat(v4)+parseFloat(v5);
$('#depositVal').html('$'+valT);
}