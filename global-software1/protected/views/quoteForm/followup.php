<?php
/* @var $this QuoteFormController */
/* @var $model GlobalTrackerQuote */

$this->breadcrumbs=array(
	'Quotes'=>array('index'),
	'Manage',
);

/*$this->menu=array(
	array('label'=>'List GlobalTrackerQuote', 'url'=>array('index')),
	array('label'=>'Create GlobalTrackerQuote', 'url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#global-tracker-quote-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Follow-ups</h1>

<div class="row">
    <div class="col-lg-12">
        <span><a style="float: right;" class="btn btn-success" href="<?php echo Yii::app()->createUrl('quoteForm/create');?>"><i class="fa fa-add"></i> Create Quote</a></span>
    </div>
</div>
<div style="float:left;">
    <select name="searchQ" id="searchQ">
        <option value="id">Quote ID</option>
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
<?php /*$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'global-tracker-quote-grid',
	//'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(

        array(
            'class' => 'CCheckBoxColumn',
            'selectableRows' => 2,
            'value' => 'FilingGenerics::encryptKey($data->id)',
            'htmlOptions' => array('width' => '3%'),
        ),


	        array(
	           'name'=>'id',
                'value'=>function($data)
                {
                    echo '<a href="'.Yii::app()->createUrl('quoteForm/view',array('id'=>$data->id)).'">'.FilingGenerics::showQuoteId($data->id).'</a>';
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
        array(
            'name'=>'vehicle_info',
            'header'=>'Vehicle Information',
            'value'=>function($data)
            {
               print_r(FilingGenerics::getVehicleInfoforViewQ($data->id));
            }
        ),

        's_date',
        array(
          'name'=>'created_by',
            'value'=>function($data)
            {
                echo FilingGenerics::getUserName($data->created_by).' ( '.$data->created_by.' )';
            }
        ),array(
          'name'=>'creationdatetime',
            'header'=>'Created On',
            'value'=>function($data)
            {
                echo FilingGenerics::showDate($data->creationdatetime);
            }
        ),
        array(
          'name'=>'id',
            'header'=>'Status',
            'value'=>function($data)
            {
                echo 'Quoted';
            }
        ),
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view} {update}'
		),
	),
)); */?>

<span>Select : <input type="checkbox" id="allA" style="margin-right:10px;" onclick="checkAllA();"><span onclick="selectAllA();">All</span> / <span
            onclick="unSelectAllA();">None</span> </span>

<style>
    .filters
    {
        display: none !important;
    }
</style>

<script>
    $(document).ready(function(){
        $('#global-tracker-quote-grid td').on('dblclick',function()
        {
            console.log(this);
            var url=$(this).parent().find('.button-column .update').attr('href');
            if(typeof url !== 'undefined')
                window.location= url;
        });
    });

    function searchText()
    {
        var s=$('#searchQ').val();

        var sb=$('#sBox').val();
        if(s=='mobile')
        {console.log('in s');
            sb=sb.replace('(','');
            sb=sb.replace(')','');
            sb=sb.replace('-','');
            sb=sb.replace(' ','');
            sb=sb.trim();
            console.log(sb);
        }
     //   var ctab=$('.nav-tabs').find('li[class="active"] a').attr('href');
      //  ctab=ctab.replace('#','');
        var x='GlobalTrackerQuote['+s+']';

        var url='<?php echo Yii::app()->createUrl('quoteForm/index',array('__searchQ__'=>'__sbox__')); ?>';
        url = url.replace('__searchQ__',x);
        url = url.replace('__sbox__',sb);
        //url = url.replace('__click__',ctab);

        window.location.href = url;
    }

    function resetSearch()
    {//var ctab=$('.nav-tabs').find('li[class="active"] a').attr('href');
       // ctab=ctab.replace('#','');

        var url='<?php echo Yii::app()->createUrl('quoteForm/index'); ?>';
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
        $('#global-tracker-quote-grid').find('input[type="checkbox"]').removeAttr('checked');
    }

    function selectAllA() {
        $('#global-tracker-quote-grid').find('input[type="checkbox"]').prop('checked', 'checked');
        /*$('#dot-tracker-quote-grid-followup').find('input[type="checkbox"]').removeAttr('checked');
        $('#dot-tracker-quote-grid-quote').find('input[type="checkbox"]').removeAttr('checked');
        $('#dot-tracker-quote-grid-hold').find('input[type="checkbox"]').removeAttr('checked');*/
    }
</script>