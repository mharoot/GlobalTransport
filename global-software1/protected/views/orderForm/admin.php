<?php
/* @var $this OrderFormController */
/* @var $model GlobalTrackerOrder */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Manage',
);

$username = Yii::app()->user->id;
$user = DotTrackerUser::model()->findByAttributes(array('username' => $username));
$id = $user->id;
$pageSize = $user->pageSize;

/*$this->menu=array(
	array('label'=>'List GlobalTrackerOrder', 'url'=>array('index')),
	array('label'=>'Create GlobalTrackerOrder', 'url'=>array('create')),
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

<h1>Manage Orders</h1>

<div class="row">
    <div class="col-lg-12">
        <div style="float:left;">
            <select name="searchQ" id="searchQ">
                <option value="id">Order ID</option>
                <option value="email">Email</option>
                <option value="fname">Customer First Name</option>
                <option value="lname">Customer Last Name</option>
                <option value="mobile">Mobile Number</option>
                <option value="company">Company</option>
                <option value="p_city">Origin</option>
                <option value="d_city">Destination</option>
                <option value="vehicle_info">Vehicle</option>
                <option value="carrier_name">Carrier</option>
            </select>
            <input type="text" name="sBox"  id="sBox" placeholder="Enter Search Query">
            <span class="btn btn-info" onclick="searchText()"><i class="fa fa-search"></i> Search</span>
            <span class="btn btn-info" onclick="resetSearch()"><i class="fa fa-undo"></i> Reset</span>
        </div>
        <br><br><br>

        <p id="processingReq" class="alert alert-warning" style="display: none;"><i class="fa fa-spinner"></i>Processing your request. </p>
        <a style="float: right;" class="btn btn-success" href="<?php echo Yii::app()->createUrl('orderForm/create');?>"><i class="fa fa-add"></i> Create Order</a>

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Orders
                (<?php echo $model->search(GlobalTrackerOrder::$enumStatus['order'], $pageSize)->getTotalItemCount(); ?>)</a></li>
            <li><a data-toggle="tab" href="#menu5">Not Signed
                (<?php echo $model->search(GlobalTrackerOrder::$enumStatus['not_signed'], $pageSize)->getTotalItemCount(); ?>)</a></li>
            <li><a data-toggle="tab" href="#menu6">Dispatched
                (<?php echo $model->search(GlobalTrackerOrder::$enumStatus['dispatched'], $pageSize)->getTotalItemCount(); ?>)</a></li>
            <li><a data-toggle="tab" href="#menu7">Issues
                (<?php echo $model->search(GlobalTrackerOrder::$enumStatus['issues'], $pageSize)->getTotalItemCount(); ?>)</a></li>
            <li><a data-toggle="tab" href="#menu2">Hold
                (<?php echo $model->search(GlobalTrackerOrder::$enumStatus['hold'], $pageSize)->getTotalItemCount(); ?>)</a></li>
            <li><a data-toggle="tab" href="#menu3">Archived
                (<?php echo $model->search(GlobalTrackerOrder::$enumStatus['archived'], $pageSize)->getTotalItemCount(); ?>)</a></li>
            <li><a data-toggle="tab" href="#menu4">Result
                (<?php echo $model->result($pageSize)->getTotalItemCount(); ?>)</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'global-tracker-order-grid-order',
                    'dataProvider' => $model->search(GlobalTrackerOrder::$enumStatus['order'], $pageSize),
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
                                echo '<a href="'.Yii::app()->createUrl('orderForm/view',array('id'=>$data->id)).'">'.FilingGenerics::showOrderId($data->id).'</a>';
                            },
                            'htmlOptions' => array('width' => '5%', 'style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'creationdatetime',
                            'header'=>'Created',
                            'value'=>function($data)
                            {
                                echo FilingGenerics::showDate($data->creationdatetime);
                            },
                            'htmlOptions' => array('width' => '8%', 'style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'fname',
                            'header'=>'Shipper',
                            'value'=>function($data)
                            {
                                echo $data->fname.' '.$data->lname;
                                echo '<br>'.FilingGenerics::showPhone($data->mobile);
                                echo '<br><a href="mailto:'.$data->email.'">'.$data->email.'</a>';
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'vehicle_info',
                            'header'=>'Vehicle',
                            'value'=>function($data)
                            {
                               print_r(FilingGenerics::getVehicleInfoforView($data->id));
                            },
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'city',
                            'header'=>'Orig/Dest',
                            'value'=>function($data)
                            {
                                echo '<div>'.$data->p_city . ', ' . $data->p_state . '/<br/>'.$data->d_city . ', ' . $data->d_state.'</div>';
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'extra5',
                            'header'=>'Tariff',
                            'value'=>function($data)
                            {
                                echo '$'.$data->extra5;
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'s_date',
                            'header'=>'1st Avail',
                            'value'=>function($data)
                            {
                                echo FilingGenerics::showYMD($data->s_date);
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'created_by',
                            'visible'=>FilingGenerics::getuserRole(Yii::app()->user->id)==LoginForm::$allowedRole?true:false,
                            'filter'=> CHtml::activeDropDownList($model, 'created_by',FilingGenerics::getUserList(), array('empty' => 'All Users')),
                            'htmlOptions' => array('style' => 'text-align:center'),
                        ),
                        array(
                            'name'=>'carrier_pay',
                            'value'=>function($data)
                            {
                                if($data->carrier_pay != '') {
                                    echo '$'.$data->carrier_pay;
                                } else {
                                    echo '(none)';
                                }
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'Status',
                            'filter'=>'',
                            'value'=>function($data)
                            {
                                echo GlobalTrackerOrder::$arrStatus[$data->status];
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                        ),
                        array(
                            'class'=>'CButtonColumn',
                            'template'=>'{view} {update}'
                        ),
                    ),
                )); ?>

                <span>Select : <input type="checkbox" id="allO" style="margin-right:10px;" onclick="checkAllO();"><span onclick="selectAllO();">All</span> / <span
                            onclick="unSelectAllO();">None</span> </span>
            </div>

            <div id="menu2" class="tab-pane fade">
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'global-tracker-order-grid-hold',
                    'dataProvider' => $model->search(GlobalTrackerOrder::$enumStatus['hold'], $pageSize),
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
                                echo '<a href="'.Yii::app()->createUrl('orderForm/view',array('id'=>$data->id)).'">'.FilingGenerics::showOrderId($data->id).'</a>';
                            },
                            'htmlOptions' => array('width' => '5%', 'style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'creationdatetime',
                            'header'=>'Created',
                            'value'=>function($data)
                            {
                                echo FilingGenerics::showDate($data->creationdatetime);
                            },
                            'htmlOptions' => array('width' => '8%', 'style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'fname',
                            'header'=>'Shipper',
                            'value'=>function($data)
                            {
                                echo $data->fname.' '.$data->lname;
                                echo '<br>'.FilingGenerics::showPhone($data->mobile);
                                echo '<br><a href="mailto:'.$data->email.'">'.$data->email.'</a>';
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'vehicle_info',
                            'header'=>'Vehicle',
                            'value'=>function($data)
                            {
                               print_r(FilingGenerics::getVehicleInfoforView($data->id));
                            },
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'city',
                            'header'=>'Orig/Dest',
                            'value'=>function($data)
                            {
                                echo '<div>'.$data->p_city . ', ' . $data->p_state . '/<br/>'.$data->d_city . ', ' . $data->d_state.'</div>';
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'extra5',
                            'header'=>'Tariff',
                            'value'=>function($data)
                            {
                                echo '$'.$data->extra5;
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'s_date',
                            'header'=>'1st Avail',
                            'value'=>function($data)
                            {
                                echo FilingGenerics::showYMD($data->s_date);
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'created_by',
                            'visible'=>FilingGenerics::getuserRole(Yii::app()->user->id)==LoginForm::$allowedRole?true:false,
                            'filter'=> CHtml::activeDropDownList($model, 'created_by',FilingGenerics::getUserList(), array('empty' => 'All Users')),
                            'htmlOptions' => array('style' => 'text-align:center'),
                        ),
                        array(
                            'name'=>'carrier_pay',
                            'value'=>function($data)
                            {
                                if($data->carrier_pay != '') {
                                    echo '$'.$data->carrier_pay;
                                } else {
                                    echo '(none)';
                                }
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'Status',
                            'filter'=>'',
                            'value'=>function($data)
                            {
                                echo GlobalTrackerOrder::$arrStatus[$data->status];
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                        ),
                        array(
                            'class'=>'CButtonColumn',
                            'template'=>'{view} {update}'
                        ),
                    ),
                )); ?>

                <span>Select : <input type="checkbox" id="allH" style="margin-right:10px;" onclick="checkAllH();"><span onclick="selectAllH();">All</span> / <span
                            onclick="unSelectAllH();">None</span> </span>
            </div>

            <div id="menu3" class="tab-pane fade">
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'global-tracker-order-grid-archive',
                    'dataProvider' => $model->search(GlobalTrackerOrder::$enumStatus['archived'], $pageSize),
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
                                echo '<a href="'.Yii::app()->createUrl('orderForm/view',array('id'=>$data->id)).'">'.FilingGenerics::showOrderId($data->id).'</a>';
                            },
                            'htmlOptions' => array('width' => '5%', 'style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'creationdatetime',
                            'header'=>'Created',
                            'value'=>function($data)
                            {
                                echo FilingGenerics::showDate($data->creationdatetime);
                            },
                            'htmlOptions' => array('width' => '8%', 'style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'fname',
                            'header'=>'Shipper',
                            'value'=>function($data)
                            {
                                echo $data->fname.' '.$data->lname;
                                echo '<br>'.FilingGenerics::showPhone($data->mobile);
                                echo '<br><a href="mailto:'.$data->email.'">'.$data->email.'</a>';
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'vehicle_info',
                            'header'=>'Vehicle',
                            'value'=>function($data)
                            {
                               print_r(FilingGenerics::getVehicleInfoforView($data->id));
                            },
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'city',
                            'header'=>'Orig/Dest',
                            'value'=>function($data)
                            {
                                echo '<div>'.$data->p_city . ', ' . $data->p_state . '/<br/>'.$data->d_city . ', ' . $data->d_state.'</div>';
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'extra5',
                            'header'=>'Tariff',
                            'value'=>function($data)
                            {
                                echo '$'.$data->extra5;
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'s_date',
                            'header'=>'1st Avail',
                            'value'=>function($data)
                            {
                                echo FilingGenerics::showYMD($data->s_date);
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'created_by',
                            'visible'=>FilingGenerics::getuserRole(Yii::app()->user->id)==LoginForm::$allowedRole?true:false,
                            'filter'=> CHtml::activeDropDownList($model, 'created_by',FilingGenerics::getUserList(), array('empty' => 'All Users')),
                            'htmlOptions' => array('style' => 'text-align:center'),
                        ),
                        array(
                            'name'=>'carrier_pay',
                            'value'=>function($data)
                            {
                                if($data->carrier_pay != '') {
                                    echo '$'.$data->carrier_pay;
                                } else {
                                    echo '(none)';
                                }
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'Status',
                            'filter'=>'',
                            'value'=>function($data)
                            {
                                echo GlobalTrackerOrder::$arrStatus[$data->status];
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                        ),
                        array(
                            'class'=>'CButtonColumn',
                            'template'=>'{view} {update}'
                        ),
                    ),
                )); ?>

                <span>Select : <input type="checkbox" id="allA" style="margin-right:10px;" onclick="checkAllA();"><span onclick="selectAllA();">All</span> / <span
                            onclick="unSelectAllA();">None</span> </span>
            </div>

            <div id="menu5" class="tab-pane fade">
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'global-tracker-order-grid-not_signed',
                    'dataProvider'=>$model->search(GlobalTrackerOrder::$enumStatus['not_signed'], $pageSize),
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
                                echo '<a href="'.Yii::app()->createUrl('orderForm/view',array('id'=>$data->id)).'">'.FilingGenerics::showOrderId($data->id).'</a>';
                            },
                            'htmlOptions' => array('width' => '5%', 'style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'creationdatetime',
                            'header'=>'Created',
                            'value'=>function($data)
                            {
                                echo FilingGenerics::showDate($data->creationdatetime);
                            },
                            'htmlOptions' => array('width' => '8%', 'style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'fname',
                            'header'=>'Shipper',
                            'value'=>function($data)
                            {
                                echo $data->fname.' '.$data->lname;
                                echo '<br>'.FilingGenerics::showPhone($data->mobile);
                                echo '<br><a href="mailto:'.$data->email.'">'.$data->email.'</a>';
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'vehicle_info',
                            'header'=>'Vehicle',
                            'value'=>function($data)
                            {
                               print_r(FilingGenerics::getVehicleInfoforView($data->id));
                            },
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'city',
                            'header'=>'Orig/Dest',
                            'value'=>function($data)
                            {
                                echo '<div>'.$data->p_city . ', ' . $data->p_state . '/<br/>'.$data->d_city . ', ' . $data->d_state.'</div>';
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'extra5',
                            'header'=>'Tariff',
                            'value'=>function($data)
                            {
                                echo '$'.$data->extra5;
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'s_date',
                            'header'=>'1st Avail',
                            'value'=>function($data)
                            {
                                echo FilingGenerics::showYMD($data->s_date);
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'created_by',
                            'visible'=>FilingGenerics::getuserRole(Yii::app()->user->id)==LoginForm::$allowedRole ? true : false,
                            'filter'=> CHtml::activeDropDownList($model, 'created_by',FilingGenerics::getUserList(), array('empty' => 'All Users')),
                            'htmlOptions' => array('style' => 'text-align:center'),
                        ),
                        array(
                            'name'=>'carrier_pay',
                            'value'=>function($data) {
                                $carrier = FilingGenerics::getCarrierInfo($data->carrier_name);
                                echo '<label>Carrier:</label><a href="'.Yii::app()->createUrl('account/view&type=2',array('id'=>$carrier->id)).'">'.$carrier->company_name.'</a><br/><label>Phone:</label>' . FilingGenerics::showPhone($carrier->phone1) . '<br/>';
                                if($data->carrier_pay != '') {
                                    echo '<label>Carrier Pay:</label>$'.$data->carrier_pay;
                                } else {
                                    echo '<label>Carrier Pay:</label>(none)';
                                }
                            },
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'Status',
                            'filter'=>'',
                            'value'=>function($data) {
                                echo GlobalTrackerOrder::$arrStatus[$data->status];
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                        ),
                        array(
                            'class'=>'CButtonColumn',
                            'template'=>'{view} {update}'
                        ),
                    ),
                )); ?>

                <span>Select : <input type="checkbox" id="allA" style="margin-right:10px;" onclick="checkAllA();"><span onclick="selectAllA();">All</span> / <span
                            onclick="unSelectAllA();">None</span> </span>
            </div>

            <div id="menu6" class="tab-pane fade">
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'global-tracker-order-grid-dispatched',
                    'dataProvider' => $model->search(GlobalTrackerOrder::$enumStatus['dispatched'], $pageSize),
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
                            'value'=>function($data) {
                                echo '<a href="'.Yii::app()->createUrl('orderForm/view',array('id'=>$data->id)).'">'.FilingGenerics::showOrderId($data->id).'</a>';
                            },
                            'htmlOptions' => array('width' => '5%', 'style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'creationdatetime',
                            'header'=>'Created',
                            'value'=>function($data) {
                                echo FilingGenerics::showDate($data->creationdatetime);
                            },
                            'htmlOptions' => array('width' => '8%', 'style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'fname',
                            'header'=>'Shipper',
                            'value'=>function($data) {
                                echo $data->fname.' '.$data->lname;
                                echo '<br>'.FilingGenerics::showPhone($data->mobile);
                                echo '<br><a href="mailto:'.$data->email.'">'.$data->email.'</a>';
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'vehicle_info',
                            'header'=>'Vehicle',
                            'value'=>function($data) {
                               print_r(FilingGenerics::getVehicleInfoforView($data->id));
                            },
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'city',
                            'header'=>'Orig/Dest',
                            'value'=>function($data) {
                                echo '<div>'.$data->p_city . ', ' . $data->p_state . '/<br/>'.$data->d_city . ', ' . $data->d_state.'</div>';
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'extra5',
                            'header'=>'Tariff',
                            'value'=>function($data) {
                                echo '$'.$data->extra5;
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'s_date',
                            'header'=>'1st Avail',
                            'value'=>function($data) {
                                echo FilingGenerics::showYMD($data->s_date);
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'created_by',
                            'visible'=>FilingGenerics::getuserRole(Yii::app()->user->id)==LoginForm::$allowedRole?true:false,
                            'filter'=> CHtml::activeDropDownList($model, 'created_by',FilingGenerics::getUserList(), array('empty' => 'All Users')),
                            'htmlOptions' => array('style' => 'text-align:center'),
                        ),
                        array(
                            'name'=>'carrier_pay',
                            'value'=>function($data) {
                                $carrier = FilingGenerics::getCarrierInfo($data->carrier_name);
                                echo '<label>Carrier:</label><a href="'.Yii::app()->createUrl('account/view&type=2',array('id'=>$carrier->id)).'">'.$carrier->company_name.'</a><br/><label>Phone:</label>' . FilingGenerics::showPhone($carrier->phone1) . '<br/>';
                                if($data->carrier_pay != '') {
                                    echo '<label>Carrier Pay:</label>$'.$data->carrier_pay;
                                } else {
                                    echo '<label>Carrier Pay:</label>(none)';
                                }
                            },
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'Status',
                            'filter'=>'',
                            'value'=>function($data) {
                                echo GlobalTrackerOrder::$arrStatus[$data->status];
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                        ),
                        array(
                            'class'=>'CButtonColumn',
                            'template'=>'{view} {update}'
                        ),
                    ),
                )); ?>

                <span>Select : <input type="checkbox" id="allA" style="margin-right:10px;" onclick="checkAllA();"><span onclick="selectAllA();">All</span> / <span
                            onclick="unSelectAllA();">None</span> </span>
            </div>

            <div id="menu7" class="tab-pane fade">
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'global-tracker-order-grid-issues',
                    'dataProvider' => $model->search(GlobalTrackerOrder::$enumStatus['issues'], $pageSize),
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
                            'value'=>function($data) {
                                echo '<a href="'.Yii::app()->createUrl('orderForm/view',array('id'=>$data->id)).'">'.FilingGenerics::showOrderId($data->id).'</a>';
                            },
                            'htmlOptions' => array('width' => '5%', 'style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'creationdatetime',
                            'header'=>'Created',
                            'value'=>function($data)
                            {
                                echo FilingGenerics::showDate($data->creationdatetime);
                            },
                            'htmlOptions' => array('width' => '8%', 'style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'fname',
                            'header'=>'Shipper',
                            'value'=>function($data)
                            {
                                echo $data->fname.' '.$data->lname;
                                echo '<br>'.FilingGenerics::showPhone($data->mobile);
                                echo '<br><a href="mailto:'.$data->email.'">'.$data->email.'</a>';
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'vehicle_info',
                            'header'=>'Vehicle',
                            'value'=>function($data)
                            {
                               print_r(FilingGenerics::getVehicleInfoforView($data->id));
                            },
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'city',
                            'header'=>'Orig/Dest',
                            'value'=>function($data)
                            {
                                echo '<div>'.$data->p_city . ', ' . $data->p_state . '/<br/>'.$data->d_city . ', ' . $data->d_state.'</div>';
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'extra5',
                            'header'=>'Tariff',
                            'value'=>function($data)
                            {
                                echo '$'.$data->extra5;
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'s_date',
                            'header'=>'1st Avail',
                            'value'=>function($data)
                            {
                                echo FilingGenerics::showYMD($data->s_date);
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'created_by',
                            'visible'=>FilingGenerics::getuserRole(Yii::app()->user->id)==LoginForm::$allowedRole?true:false,
                            'filter'=> CHtml::activeDropDownList($model, 'created_by',FilingGenerics::getUserList(), array('empty' => 'All Users')),
                            'htmlOptions' => array('style' => 'text-align:center'),
                        ),
                        array(
                            'name'=>'carrier_pay',
                            'value'=>function($data)
                            {
                                if($data->carrier_pay != '') {
                                    echo '$'.$data->carrier_pay;
                                } else {
                                    echo '(none)';
                                }
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'Status',
                            'filter'=>'',
                            'value'=>function($data)
                            {
                                echo GlobalTrackerOrder::$arrStatus[$data->status];
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                        ),
                        array(
                            'class'=>'CButtonColumn',
                            'template'=>'{view} {update}'
                        ),
                    ),
                )); ?>

                <span>Select : <input type="checkbox" id="allA" style="margin-right:10px;" onclick="checkAllA();"><span onclick="selectAllA();">All</span> / <span
                            onclick="unSelectAllA();">None</span> </span>
            </div>

            <div id="menu4" class="tab-pane fade">
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'global-tracker-order-grid-result',
                    //'dataProvider'=>$model->search(),
                    'dataProvider' => $model->result($pageSize),
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
                                echo '<a href="'.Yii::app()->createUrl('orderForm/view',array('id'=>$data->id)).'">'.FilingGenerics::showOrderId($data->id).'</a>';
                            },
                            'htmlOptions' => array('width' => '5%', 'style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'creationdatetime',
                            'header'=>'Created',
                            'value'=>function($data)
                            {
                                echo FilingGenerics::showDate($data->creationdatetime);
                            },
                            'htmlOptions' => array('width' => '8%', 'style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'fname',
                            'header'=>'Shipper',
                            'value'=>function($data)
                            {
                                echo $data->fname.' '.$data->lname;
                                echo '<br>'.FilingGenerics::showPhone($data->mobile);
                                echo '<br><a href="mailto:'.$data->email.'">'.$data->email.'</a>';
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'vehicle_info',
                            'header'=>'Vehicle',
                            'value'=>function($data)
                            {
                               print_r(FilingGenerics::getVehicleInfoforView($data->id));
                            },
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'city',
                            'header'=>'Orig/Dest',
                            'value'=>function($data)
                            {
                                echo '<div>'.$data->p_city . ', ' . $data->p_state . '/<br/>'.$data->d_city . ', ' . $data->d_state.'</div>';
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'extra5',
                            'header'=>'Tariff',
                            'value'=>function($data)
                            {
                                echo '$'.$data->extra5;
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'s_date',
                            'header'=>'1st Avail',
                            'value'=>function($data)
                            {
                                echo FilingGenerics::showYMD($data->s_date);
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'created_by',
                            'visible'=>FilingGenerics::getuserRole(Yii::app()->user->id)==LoginForm::$allowedRole?true:false,
                            'filter'=> CHtml::activeDropDownList($model, 'created_by',FilingGenerics::getUserList(), array('empty' => 'All Users')),
                            'htmlOptions' => array('style' => 'text-align:center'),
                        ),
                        array(
                            'name'=>'carrier_pay',
                            'value'=>function($data)
                            {
                                if($data->carrier_pay != '') {
                                    echo '$'.$data->carrier_pay;
                                } else {
                                    echo '(none)';
                                }
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'Status',
                            'filter'=>'',
                            'value'=>function($data)
                            {
                                echo GlobalTrackerOrder::$arrStatus[$data->status];
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                        ),
                        array(
                            'class'=>'CButtonColumn',
                            'template'=>'{view} {update}'
                        ),
                    ),
                )); ?>
            </div>
        </div>

        <span style="float:left;">Show:
            <select name="pagen" id="pagen" style="">
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="250">250</option>
                <option value="500">500</option>
            </select>
        </span>

        <?php if (FilingGenerics::getuserRole(Yii::app()->user->id)==LoginForm::$allowedRole) { ?>
        <span  style="margin:10px; float: right;">
            <?php 
                $models = DotTrackerUser::model()->findAll(array('order' => 'username DESC'));
                $list = CHtml::listData($models, 'username', 'username');
                echo CHtml::dropDownList('username', '', $list, array('empty' => 'Select an user'));
            ?> 
            <a id="userBtnO" onclick="moveToUser();" class="btn btn-info"><i class="fa fa-user"></i> Reassign Salesperson</a>
        </span>
        <?php } ?>
    </div>
</div>
<hr>

<style>
    .nav-tabs > li > a {
        background-color: #f5f5f5;
    }
    .summary
    {
        float:left !important;
    }
</style>

<script>
$(document).ready(function() {
    $("#pagen").val(<?php echo $pageSize; ?>);
    $("#pagen").change(function() {
        var pageSize = $("#pagen").val();
        var url = '<?php echo Yii::app()->createUrl('dotTrackerUser/changePageSize', array('id' => $id,'pageSize' => '__pageSize__'));?>';
        url = url.replace('__pageSize__', pageSize);
        $.ajax({
            type: "POST",
            url: url,
            data: {
                'passKey': '2424324242dsfsdfs',
            },
            success: function (data) {
                // alert(data);
            }
        });
        sleep(300);
        var path = '<?php echo Yii::app()->createurl('orderForm/admin',array('click'=>'__clicked__'))?>';
        path = path.replace('__clicked__',$('a[data-toggle="tab"][aria-expanded="true"]').attr('href'));
        path = path.replace('#','');
        window.location.href = path;
    });

    $('a[href="#<?php echo isset($_GET['click']) ? $_GET['click'] : 'home'; ?>"]').trigger('click');

    $('#global-tracker-order-grid-order td').on('dblclick', function() {
        console.log(this);
        var url=$(this).parent().find('.button-column .update').attr('href');
        if(typeof url !== 'undefined')
            window.location= url;
    });
    $('#global-tracker-order-grid-posted_cd td').on('dblclick', function() {
        console.log(this);
        var url=$(this).parent().find('.button-column .update').attr('href');
        if(typeof url !== 'undefined')
            window.location= url;
    });
    $('#global-tracker-order-grid-not_signed td').on('dblclick', function() {
        console.log(this);
        var url=$(this).parent().find('.button-column .update').attr('href');
        if(typeof url !== 'undefined')
            window.location= url;
    });
    $('#global-tracker-order-grid-dispatched td').on('dblclick', function() {
        console.log(this);
        var url=$(this).parent().find('.button-column .update').attr('href');
        if(typeof url !== 'undefined')
            window.location= url;
    });
    $('#global-tracker-order-grid-issues td').on('dblclick', function() {
        console.log(this);
        var url=$(this).parent().find('.button-column .update').attr('href');
        if(typeof url !== 'undefined')
            window.location= url;
    });
    $('#global-tracker-order-grid-hold td').on('dblclick', function() {
        console.log(this);
        var url=$(this).parent().find('.button-column .update').attr('href');
        if(typeof url !== 'undefined')
            window.location= url;
    });
    $('#global-tracker-order-grid-archive td').on('dblclick', function() {
        console.log(this);
        var url=$(this).parent().find('.button-column .update').attr('href');
        if(typeof url !== 'undefined')
            window.location= url;
    });
    $('#global-tracker-order-grid-result td').on('dblclick', function() {
        console.log(this);
        var url=$(this).parent().find('.button-column .update').attr('href');
        if(typeof url !== 'undefined')
            window.location= url;
    });
});

/*function moveTohold() {
    $('#holdBtnO').html('Processing');
    $('#processingReq').show();
    $('input[type=checkbox]:checked').each(function (index, val) {
        console.log(val);
        console.log($(val).attr('value'));
        var idVal = $(val).attr('value');
        var url = '<?php //echo Yii::app()->createUrl('orderForm/changeStatus', array('id' => '__id__', 'status' => FilingGenerics::encryptKey(GlobalTrackerOrder::$enumStatus['hold'])));?>';
        alert
        url = url.replace('__id__', idVal);
        $.ajax({
            type: "POST",
            url: url,
            data: {
                'passKey': '2424324242dsfsdfs',
            },
            success: function (data) {
                // alert(data);
            }
        });
        sleep(300);
    });
    window.location.href = '<?php //echo Yii::app()->createurl('orderForm/admin', array('click' => 'menu2'))?>';
}*/

function moveToUser() {
    $('#userBtnO').html('Processing');
    $('#processingReq').show();
    var username = $('#username').val();
    $('input[type=checkbox]:checked').each(function(index, val) {
        //console.log(val);
        //console.log($(val).attr('value'));
        var idVal = $(val).attr('value');
        var url = '<?php echo Yii::app()->createUrl('orderForm/changeUser', array('id' => '__id__', 'username' => '__username__'));?>';
        url = url.replace('__id__', idVal);
        url = url.replace('__username__', username);
        $.ajax({
            type: "POST",
            url: url,
            data: {
                'passKey': '2424324242dsfsdfs',
            },
            success: function (data) {
                // alert(data);
            }
        });
        sleep(300);
    });
    var path = '<?php echo Yii::app()->createurl('orderForm/admin',array('click'=>'__clicked__'))?>';
    path = path.replace('__clicked__',$('a[data-toggle="tab"][aria-expanded="true"]').attr('href'));
    path = path.replace('#','');
    window.location.href = path;
}

/*function moveToArchive() {
    $('#archiveBtnO').html('Processing');
    $('#processingReq').show();
    $('input[type=checkbox]:checked').each(function (index, val) {
        console.log(val);
        console.log($(val).attr('value'));
        var idVal = $(val).attr('value');
        archiveProcess(idVal);
        sleep(300);
    });
    window.location.href = '<?php //echo Yii::app()->createurl('orderForm/admin', array('click' => 'menu3'))?>';
}

function archiveProcess(idVal) {
    //alert('inarchive');
    var url = '<?php //echo Yii::app()->createUrl('orderForm/changeStatus', array('id' => '__id__', 'status' => FilingGenerics::encryptKey(GlobalTrackerOrder::$enumStatus['archived'])));?>';
    url = url.replace('__id__', idVal);
    $.ajax({
        type: "POST",
        url: url,
        data: {
            'passKey': '2424324242dsfsdfs',
        },
        success: function (data) {
            // alert(data);
            // $('#processingReq').fadeOut(500);
        }
    });
}*/

function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds) {
            break;
        }
    }
}

function searchText() {
    var s=$('#searchQ').val();
    var sb=$('#sBox').val();
    if(s=='phone') {
        console.log('in s');
        sb=sb.replace('(','');
        sb=sb.replace(')','');
        sb=sb.replace('-','');
        sb=sb.replace(' ','');
        sb=sb.trim();
        console.log(sb);
    }
    var ctab=$('.nav-tabs').find('li[class="active"] a').attr('href');
    ctab=ctab.replace('#','');
    var x='GlobalTrackerOrder['+s+']';
    var url='<?php echo Yii::app()->createUrl('orderForm/admin',array('__searchQ__'=>'__sbox__','click'=>'__click__')); ?>';
        url = url.replace('__searchQ__',x);
        url = url.replace('__sbox__',sb);
        url = url.replace('__click__',ctab);

    window.location.href = url;
}

function resetSearch() {
    var ctab=$('.nav-tabs').find('li[class="active"] a').attr('href');
    ctab=ctab.replace('#','');

    var url='<?php echo Yii::app()->createUrl('orderForm/admin',array('click'=>'__click__')); ?>';
    url = url.replace('__click__',ctab);
    window.location.href = url;
}

function checkAllO() {
    if($('#allO').is(":checked")) {
        selectAllO();
    } else {
        unSelectAllO();
    }
}

function checkAllH() {
    if($('#allH').is(":checked")) {
        selectAllH();
    } else {
        unSelectAllH();
    }
}

function checkAllA() {
    if($('#allA').is(":checked")) {
        selectAllA();
    } else {
        unSelectAllA();
    }
}

function selectAllO() {
    $('#global-tracker-order-grid-order').find('input[type="checkbox"]').prop('checked', 'checked');
    $('#global-tracker-order-grid-hold').find('input[type="checkbox"]').removeAttr('checked');
    $('#global-tracker-order-grid-archive').find('input[type="checkbox"]').removeAttr('checked');
}

function selectAllH() {
    $('#global-tracker-order-grid-hold').find('input[type="checkbox"]').prop('checked', 'checked');
    $('#global-tracker-order-grid-followup').find('input[type="checkbox"]').removeAttr('checked');
    $('#global-tracker-order-grid-archive').find('input[type="checkbox"]').removeAttr('checked');
}
function selectAllA() {
    $('#global-tracker-order-grid-archive').find('input[type="checkbox"]').prop('checked', 'checked');
    $('#global-tracker-order-grid-order').find('input[type="checkbox"]').removeAttr('checked');
    $('#global-tracker-order-grid-hold').find('input[type="checkbox"]').removeAttr('checked');
}

function unSelectAllO() {
    $('#global-tracker-order-grid-order').find('input[type="checkbox"]').removeAttr('checked');
}
function unSelectAllH() {
    $('#global-tracker-order-grid-hold').find('input[type="checkbox"]').removeAttr('checked');
}
function unSelectAllA() {
    $('#global-tracker-order-grid-archive').find('input[type="checkbox"]').removeAttr('checked');
}
</script>