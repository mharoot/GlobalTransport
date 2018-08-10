<?php
/* @var $this AccountController */
/* @var $model GlobalTrackerShipper */

$this->breadcrumbs=array(
    GlobalTrackerShipper::$enumType[$_GET['type']]=>array('admin&type='.$_GET['type']),
	'Manage',
);
/*
$this->menu=array(
	array('label'=>'List GlobalTrackerShipper', 'url'=>array('index')),
	array('label'=>'Create GlobalTrackerShipper', 'url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#global-tracker-shipper-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage <?php echo GlobalTrackerShipper::$enumType[$_GET['type']];?></h1>

<div class="col-lg-12" style="padding-bottom: 20px;">

    <a href="<?php echo Yii::app()->createUrl('account/create',array('type'=>$_GET['type']))?>">  <span class="btn btn-info" style="float: right;"><i class="fa fa-plus"></i> Create <?php echo GlobalTrackerShipper::$enumTypeSngle[$_GET['type']]; ?></span></a>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'global-tracker-shipper-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
            'name'=>'id',
            'value'=>function($data)
            {
                echo '<a href="'.Yii::app()->createUrl('account/view&type=1&',array('id'=>$data->id)).'">'.$data->id.'</a>';
            },
            'htmlOptions' => array('width' => '5%', 'style' => 'text-align:center'),
        ),
        array(
            'name'=>'company_name',
            'htmlOptions' => array('style' => 'text-align:center'),
        ),
		array(
		        'name'=>'fname',
                'header'=>'Shipper Name',
                'value'=>function($data)
                {
                    echo $data->fname.' '.$data->lname;
                },
                'htmlOptions' => array('style' => 'text-align:center'),
        ),
        array(
            'name'=>'contact1',
            'header'=>'Contact',
            'value'=>function($data)
            {
                echo $data->contact1;
            },
            'htmlOptions' => array('style' => 'text-align:center'),
        ),
        array(
            'name'=>'address',
            'header'=>'Address',
            'value'=>function($data)
            {
                echo $data->address.' '.$data->address2.',<br>';
                echo $data->city.', '.$data->state.', '.$data->zip;
            },
            'htmlOptions' => array('style' => 'text-align:center'),
        ),
        array(
            'name'=>'phone1',
            'header'=>'Phone/Email',
            'value'=>function($data)
            {
                if(empty($data->phone1)) {
                    $data->phone1 = 'none';
                }
                if(empty($data->email)) {
                    $data->email = 'none';
                }
                echo FilingGenerics::showPhone($data->phone1).'<br>'.$data->email;
            },
            'htmlOptions' => array('style' => 'text-align:center'),
        ),
        array(
            'name'=>'type',
            'header'=>'Type',
            'value'=>function($data)
            {
                echo GlobalTrackerShipper::$enumType[$data->type];
            },
            'htmlOptions' => array('style' => 'text-align:center'),
        ),
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view} {update}',
            'buttons'=>array(
                'view'=>array(
                        'url'=>'Yii::app()->createUrl(\'account/view\',array(\'type\'=>$data->type,\'id\'=>$data->id))',
                ),
                'update'=>array(
                    'url'=>'Yii::app()->createUrl(\'account/update\',array(\'type\'=>$data->type,\'id\'=>$data->id))',
                ),
            ),
		),
	),
)); ?>
