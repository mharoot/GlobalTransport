<?php
/* @var $this OrderFormController */
/* @var $model GlobalTrackerDispatch */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Manage',
);

/*$this->menu=array(
	array('label'=>'List GlobalTrackerDispatch', 'url'=>array('index')),
	array('label'=>'Create GlobalTrackerDispatch', 'url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#global-tracker-order-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cancels</h1>

<div class="row">
    <div class="col-lg-12">
        <span><a style="float: right;" class="btn btn-success" href="<?php echo Yii::app()->createUrl('dispatch/create');?>"><i class="fa fa-add"></i> Create Order</a></span>
    </div>
</div>
<div style="float:left;">
    <select name="searchQ" id="searchQ">
        <option value="id">Order ID</option>
        <option value="email">Email</option>
        <option value="fname">Customer First Name</option>
        <option value="lname">Customer Last Name</option>
        <option value="mobile">Mobile Number</option>
        <option value="company">Company</option>


    </select>
    <input type="text" name="sBox"  id="sBox" placeholder="Enter Search Query">
    <span class="btn btn-info" onclick="searchText()"><i class="fa fa-search"></i> Search</span>
    <span class="btn btn-info" onclick="resetSearch()"><i class="fa fa-undo"></i> Reset</span>


</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'global-tracker-order-grid',
	'dataProvider'=>$model->cancel(),
	'filter'=>$model,
	'columns'=>array(

        array(
            'id' => 'ids',
            'class' => 'CCheckBoxColumn',
            'selectableRows' => 2,
            'value' => 'FilingGenerics::encryptKey($data->id)',
            'htmlOptions' => array('width' => '3%'),
        ),

	   array(
	           'name'=>'id',
                'value'=>function($data)
                {
                    echo '<a href="'.Yii::app()->createUrl('dispatch/view',array('id'=>$data->id)).'">'.FilingGenerics::showOrderId($data->id).'</a>';
                }
            ),

        array(
                'name'=>'creationdatetime',
                 'header'=>'Created',
                  'value'=>function($data)
                  {
                      echo FilingGenerics::showDate($data->creationdatetime);
                  }
        ),

        array(
                'name'=>'fname',
                'header'=>'Shipper',
                'value'=>function($data)
                {
                    echo $data->fname.' '.$data->lname;
                    echo '<br>'.FilingGenerics::showPhone($data->mobile);
                    echo '<br><a href="mailto:'.$data->email.'">'.$data->email.'</a>';

                }

        ),

		array(
		        'name'=>'city',
                'header'=>'Pickup Location',
                'value'=>function($data)
                        {
                         echo $data->p_city.',',$data->p_state.','.$data->p_zip;
                        }
        ),
        array(
            'name'=>'extra5',
            'header'=>'Tariff',
            'value'=>function($data)
            {
                echo '$'.$data->extra5;
            }
        ),
        's_date',
        array(
          'name'=>'created_by',
            'value'=>function($data)
            {
                echo FilingGenerics::getUserName($data->created_by).' ( '.$data->created_by.' )';
            }
        ),
		/*
		'phone1',
		'phone2',
		'mobile',
		'fax',
		'address1',
		'address2',
		'city',
		'state',
		'zip',
		'country',
		'sel_contact',
		'sel_location',
		'p_address1',
		'p_address2',
		'p_city',
		'p_state',
		'p_zip',
		'p_country',
		'p_contactname',
		'p_companyname',
		'p_buyernumber',
		'p_phone1',
		'p_phone2',
		'p_mobile',
		's_date',
		's_vrun',
		's_via',
		'info_forShipper',
		'notes_shipper',
		'vehicle_info',
		'carrier_pay',
		'bal_paid_by',
		'pickup_terminal_fee',
		'delivery_terminal_fee',
		'referred_by',
		'p_phone3',
		'extra',
		'extra2',
		'extra3',
		'extra4',
		'extra5',
		'extra6',
		'created_by',
		'creationdatetime',
		*/
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view} {update}'
		),
	),
)); ?>

<span>Select : <input type="checkbox" id="allA" style="margin-right:10px;" onclick="checkAllA();"><span onclick="selectAllA();">All</span> / <span
            onclick="unSelectAllA();">None</span> </span>

<style>
    .filters
    {
        display: none !important;
    }
</style>

<a id="cancelBtn" onclick="moveToHold();" class="btn btn-info"
           style="margin:10px;float: right;"><i
                    class="fa fa-stop"></i> Move to Hold</a>

<a id="holdBtn" onclick="moveToOrder();" class="btn btn-info"
           style="margin:10px;float: right;"><i
                    class="fa fa-stop"></i> Move to Order</a>

<script>
    $(document).ready(function(){
        $('#global-tracker-order-grid td').on('dblclick',function()
        {
            console.log(this);
            var url=$(this).parent().find('.button-column .update').attr('href');
            if(typeof url !== 'undefined')
                window.location= url;
        });

    });

    function moveToHold() {
        //$('#holdBtn').html('Processing'); 
        //$('#processingReq').show();
        $('input[type=checkbox]:checked').each(function (index, val) {
            console.log(val);
            console.log($(val).attr('value'));
            var idVal = $(val).attr('value');
            var url = 'index.php?r=dispatch/movetohold&id=__id__';
            url = url.replace('__id__', idVal);
            //alert(url);
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    'passKey': '2424324242dsfsdfs',
                },
                success: function (data) {
                    //alert(data.passKey);
                }
            });
            sleep(300);
        });
        alert("Move succeed!");
        window.location.href = 'index.php?r=dispatch/cancel';
    }

    function moveToOrder() {
        $('input[type=checkbox]:checked').each(function (index, val) {
            console.log(val);
            console.log($(val).attr('value'));
            var idVal = $(val).attr('value');
            var url = 'index.php?r=dispatch/movetoorder&id=__id__';
            url = url.replace('__id__', idVal);
            //alert(url);
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    'passKey': '2424324242dsfsdfs',
                },
                success: function (data) {
                    //alert(data.passKey);
                }
            });
            sleep(300);
        });
        alert("Move succeed!");
        window.location.href = 'index.php?r=dispatch/cancel';
    }

    function sleep(milliseconds) {
        var start = new Date().getTime();
        for (var i = 0; i < 1e7; i++) {
            if ((new Date().getTime() - start) > milliseconds) {
                break;
            }
        }
    }

    function searchText()
    {
        var s=$('#searchQ').val();

        var sb=$('#sBox').val();
        if(s=='mobile')
        {
            console.log('in s');
            sb=sb.replace('(','');
            sb=sb.replace(')','');
            sb=sb.replace('-','');
            sb=sb.replace(' ','');
            sb=sb.trim();
            console.log(sb);
        }
     //   var ctab=$('.nav-tabs').find('li[class="active"] a').attr('href');
      //  ctab=ctab.replace('#','');
        var x='GlobalTrackerDispatch['+s+']';

        var url='<?php echo Yii::app()->createUrl('dispatch/index',array('__searchQ__'=>'__sbox__')); ?>';
        url = url.replace('__searchQ__',x);
        url = url.replace('__sbox__',sb);
        //url = url.replace('__click__',ctab);

        window.location.href = url;
    }

    function resetSearch()
    {//var ctab=$('.nav-tabs').find('li[class="active"] a').attr('href');
       // ctab=ctab.replace('#','');

        var url='<?php echo Yii::app()->createUrl('dispatch/index'); ?>';
       // url = url.replace('__click__',ctab);


        window.location.href = url;
    }

    function checkAllA()
    {
        if($('#allA').is(":checked"))
        {
            selectAllA();
        }
        else{
            unSelectAllA();
        }
    }

    function unSelectAllA() {
        $('#global-tracker-order-grid').find('input[type="checkbox"]').removeAttr('checked');
    }

    function selectAllA() {
        $('#global-tracker-order-grid').find('input[type="checkbox"]').prop('checked', 'checked');
        /*$('#dot-tracker-quote-grid-followup').find('input[type="checkbox"]').removeAttr('checked');
        $('#dot-tracker-quote-grid-quote').find('input[type="checkbox"]').removeAttr('checked');
        $('#dot-tracker-quote-grid-hold').find('input[type="checkbox"]').removeAttr('checked');*/
    }
</script>