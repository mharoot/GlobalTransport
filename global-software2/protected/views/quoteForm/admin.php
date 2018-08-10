<?php
/* @var $this QuoteFormController */
/* @var $model GlobalTrackerQuote */

$this->breadcrumbs=array(
	'Quotes'=>array('index'),
	'Manage',
);

$username = Yii::app()->user->id;
$user = DotTrackerUser::model()->findByAttributes(array('username' => $username));
$id = $user->id;
$pageSize = $user->pageSize;

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

<h1>Manage Quotes</h1>

<div class="row">
    <div class="col-lg-12">
        <div style="float:left;">
            <select name="searchQ" id="searchQ">
                <option value="id">Quote ID</option>
                <option value="email">Email</option>
                <option value="fname">Customer First Name</option>
                <option value="lname">Customer Last Name</option>
                <option value="mobile">Mobile Number</option>
                <option value="company">Company</option>
                <option value="p_city">Origin</option>
                <option value="d_city">Destination</option>
                <option value="vehicle_info">Vehicle</option>
            </select>
            <input type="text" name="sBox"  id="sBox" placeholder="Enter Search Query">
            <span class="btn btn-info" onclick="searchText()"><i class="fa fa-search"></i> Search</span>
            <span class="btn btn-info" onclick="resetSearch()"><i class="fa fa-undo"></i> Reset</span>
        </div>
        <br><br><br>

        <p id="processingReq" class="alert alert-warning" style="display: none;"><i class="fa fa-spinner"></i>Processing your request. </p>
        <a href="<?php echo Yii::app()->createUrl('quoteForm/create'); ?>" class="btn btn-success" style="float: right;"><i class="fa fa-plus"></i> Create Quote</a>

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Follow Up
                (<?php echo $model->search(GlobalTrackerQuote::$enumStatus['followup'], $pageSize)->getTotalItemCount(); ?>)</a>
            </li>
            <li><a data-toggle="tab" href="#menu1">Quotes
                (<?php echo $model->search(GlobalTrackerQuote::$enumStatus['quote'], $pageSize)->getTotalItemCount(); ?>)</a>
            </li>
            <li><a data-toggle="tab" href="#menu2">Hold
                (<?php echo $model->search(GlobalTrackerQuote::$enumStatus['hold'], $pageSize)->getTotalItemCount(); ?>)</a>
            </li>
            <li><a data-toggle="tab" href="#menu3">Archived
                (<?php echo $model->search(GlobalTrackerQuote::$enumStatus['archived'], $pageSize)->getTotalItemCount(); ?>)</a>
            </li>
            <li><a data-toggle="tab" href="#menu4">Results
                (<?php echo $model->result($pageSize)->getTotalItemCount(); ?>)</a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                	'id'=>'global-tracker-quote-grid-followup',
                    'dataProvider' => $model->search(GlobalTrackerQuote::$enumStatus['followup'], $pageSize),
                    'filter'=>$model,
                	'columns'=>array(
                        array(
                            'class' => 'CCheckBoxColumn',
                            'selectableRows' => 2,
                            'value' => 'FilingGenerics::encryptKey($data->id)',
                            'htmlOptions' => array('width' => '3%', 'style' => 'text-align:center'),
                        ),
                        array(
                           'name'=>'id',
                            'value'=>function($data)
                            {
                                echo '<a href="'.Yii::app()->createUrl('quoteForm/view',array('id'=>$data->id)).'">'.FilingGenerics::showQuoteId($data->id).'</a>';
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
                               print_r(FilingGenerics::getVehicleInfoforViewQ($data->id));
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
                            'htmlOptions' => array('width' => '15%', 'style' => 'text-align:center'),
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
                            'header'=>'Est.Ship',
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
                            'name'=>'Status',
                            'filter'=>'',
                            'value'=>function($data)
                            {
                                echo GlobalTrackerQuote::$arrStatus[$data->status];
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                        ),
                        array(
                            'class'=>'CButtonColumn',
                            'template'=>'{view} {update}'
                        ),
                    ),
                )); ?>

                <span>Select : <input type="checkbox" id="allF" style="margin-right:10px;" onclick="checkAllF();"><span onclick="selectAllF();">All</span> / <span
                            onclick="unSelectAllF();">None</span> </span>


                <select name="followupAction" id="followupAction" style="margin-left:20px;">
                    <option value="email"> Email Now</option>
                    <option value="sms"> SMS Now</option>
                    <option value="both"> Email and SMS Now</option>
                </select>
                <a id="followUpBtn" onclick="onFollowup();" class="btn btn-info" style="><i class="fa fa-hand-paper"></i> Take Action</a>
            </div>

            <div id="menu1" class="tab-pane fade">
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'global-tracker-quote-grid-quote',
                    'dataProvider'=>$model->search(GlobalTrackerQuote::$enumStatus['quote'], $pageSize),
                    'filter'=>$model,
                    'columns'=>array(
                        array(
                            'class' => 'CCheckBoxColumn',
                            'selectableRows' => 2,
                            'value' => 'FilingGenerics::encryptKey($data->id)',
                            'htmlOptions' => array('width' => '3%', 'style' => 'text-align:center'),
                        ),
                        array(
                           'name'=>'id',
                            'value'=>function($data)
                            {
                                echo '<a href="'.Yii::app()->createUrl('quoteForm/view',array('id'=>$data->id)).'">'.FilingGenerics::showQuoteId($data->id).'</a>';
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
                               print_r(FilingGenerics::getVehicleInfoforViewQ($data->id));
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
                            'htmlOptions' => array('width' => '15%', 'style' => 'text-align:center'),
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
                            'header'=>'Est.Ship',
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
                            'filter'=> CHtml::activeDropDownList($model, 'created_by',FilingGenerics::getUserList(),
                                        array('empty' => 'All Users')),
                            //'htmlOptions' => array('style' => 'text-align:center'),
                        ),
                        array(
                            'name'=>'Status',
                            'filter'=>'',
                            'value'=>function($data)
                            {
                                echo GlobalTrackerQuote::$arrStatus[$data->status];
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                        ),
                        array(
                            'class'=>'CButtonColumn',
                            'template'=>'{view} {update}'
                        ),
                    ),
                )); ?>
                <span>Select : <input type="checkbox" id="allQ" style="margin-right:10px;" onclick="checkAllQ();"><span onclick="selectAllQ();">All</span> / <span
                            onclick="unSelectAllQ();">None</span> </span>


                <select name="followupAction" id="followupAction" style="margin-left:20px;">
                            <option value="email"> Email Now</option>
                            <option value="sms"> SMS Now</option>
                            <option value="both"> Email and SMS Now</option>
                        </select>
                        <a id="followUpBtn" onclick="onFollowup();" class="btn btn-info"
                           style="><i class="fa fa-hand-paper"></i> Take Action</a>
            </div>

            <div id="menu2" class="tab-pane fade">
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'global-tracker-quote-grid-hold',
                    'dataProvider' => $model->search(GlobalTrackerQuote::$enumStatus['hold'], $pageSize),
                    'filter'=>$model,
                    'columns'=>array(
                        array(
                            'class' => 'CCheckBoxColumn',
                            'selectableRows' => 2,
                            'value' => 'FilingGenerics::encryptKey($data->id)',
                            'htmlOptions' => array('width' => '3%', 'style' => 'text-align:center'),
                        ),
                        array(
                           'name'=>'id',
                            'value'=>function($data)
                            {
                                echo '<a href="'.Yii::app()->createUrl('quoteForm/view',array('id'=>$data->id)).'">'.FilingGenerics::showQuoteId($data->id).'</a>';
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
                               print_r(FilingGenerics::getVehicleInfoforViewQ($data->id));
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
                            'htmlOptions' => array('width' => '15%', 'style' => 'text-align:center'),
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
                            'header'=>'Est.Ship',
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
                            'filter'=> CHtml::activeDropDownList($model, 'created_by',FilingGenerics::getUserList(),
                                        array('empty' => 'All Users')),
                        ),
                        array(
                            'name'=>'Status',
                            'filter'=>'',
                            'value'=>function($data)
                            {
                                echo GlobalTrackerQuote::$arrStatus[$data->status];
                            },
                            'htmlOptions' => array('style' => 'text-align:center'),
                        ),
                        array(
                            'class'=>'CButtonColumn',
                            'template'=>'{view} {update}'
                        ),
                    ),
                )); ?>
                <span>Select : <input type="checkbox" id="allH" style="margin-right:10px;" onclick="checkAllH();"><span onclick="selectAllH();">All</span> / <span onclick="unSelectAllH();">None</span></span>


                <select name="followupAction" id="followupAction" style="margin-left:20px;">
                            <option value="email"> Email Now</option>
                            <option value="sms"> SMS Now</option>
                            <option value="both"> Email and SMS Now</option>
                        </select>
                        <a id="followUpBtn" onclick="onFollowup();" class="btn btn-info"
                           style="><i class="fa fa-hand-paper"></i> Take Action</a>
            </div>

            <div id="menu3" class="tab-pane fade">
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'global-tracker-quote-grid-archive',
                    'dataProvider' => $model->search(GlobalTrackerQuote::$enumStatus['archived'], $pageSize),
                    'filter'=>$model,
                    'columns'=>array(
                        array(
                            'class' => 'CCheckBoxColumn',
                            'selectableRows' => 2,
                            'value' => 'FilingGenerics::encryptKey($data->id)',
                            'htmlOptions' => array('width' => '3%', 'style' => 'text-align:center'),
                        ),
                        array(
                           'name'=>'id',
                            'value'=>function($data)
                            {
                                echo '<a href="'.Yii::app()->createUrl('quoteForm/view',array('id'=>$data->id)).'">'.FilingGenerics::showQuoteId($data->id).'</a>';
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
                               print_r(FilingGenerics::getVehicleInfoforViewQ($data->id));
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
                            'htmlOptions' => array('width' => '15%', 'style' => 'text-align:center'),
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
                            'header'=>'Est.Ship',
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
                            'filter'=> CHtml::activeDropDownList($model, 'created_by',FilingGenerics::getUserList(),
                                        array('empty' => 'All Users')),
                        ),
                        array(
                            'name'=>'Status',
                            'filter'=>'',
                            'value'=>function($data)
                            {
                                echo GlobalTrackerQuote::$arrStatus[$data->status];
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


                <select name="followupAction" id="followupAction" style="margin-left:20px;">
                            <option value="email"> Email Now</option>
                            <option value="sms"> SMS Now</option>
                            <option value="both"> Email and SMS Now</option>
                        </select>
                        <a id="followUpBtn" onclick="onFollowup();" class="btn btn-info"
                           style="><i class="fa fa-hand-paper"></i> Take Action</a>
            </div>

            <div id="menu4" class="tab-pane fade">
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'global-tracker-quote-grid-result',
                    'dataProvider' => $model->result($pageSize),
                    'filter'=>$model,
                    'columns'=>array(
                        array(
                            'class' => 'CCheckBoxColumn',
                            'selectableRows' => 2,
                            'value' => 'FilingGenerics::encryptKey($data->id)',
                            'htmlOptions' => array('width' => '3%', 'style' => 'text-align:center'),
                        ),
                        array(
                           'name'=>'id',
                            'value'=>function($data)
                            {
                                echo '<a href="'.Yii::app()->createUrl('quoteForm/view',array('id'=>$data->id)).'">'.FilingGenerics::showQuoteId($data->id).'</a>';
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
                               print_r(FilingGenerics::getVehicleInfoforViewQ($data->id));
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
                            'htmlOptions' => array('width' => '15%', 'style' => 'text-align:center'),
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
                            'header'=>'Est.Ship',
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
                            'filter'=> CHtml::activeDropDownList($model, 'created_by', FilingGenerics::getUserList(), array('empty' => 'All Users')),
                            'htmlOptions' => array('style' => 'text-align:center'),
                        ),
                        array(
                            'name'=>'Status',
                            'filter'=>'',
                            'value'=>function($data)
                            {
                                echo GlobalTrackerQuote::$arrStatus[$data->status];
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

        <a id="archiveBtn" onclick="moveToArchive();" class="btn btn-info" style="margin: 10px;float: right;"><i class="fa fa-archive" style=""></i> Cancel Checked Quotes</a>
        <a id="holdBtn" onclick="moveTohold();" class="btn btn-info" style="margin:10px;float: right;"><i class="fa fa-stop"></i> Place On Hold</a>
        <?php if (FilingGenerics::getuserRole(Yii::app()->user->id)==LoginForm::$allowedRole) { ?>
        <span  style="margin:10px; float: right;">
            <?php 
                $models = DotTrackerUser::model()->findAll(array('order' => 'username DESC'));
                $list = CHtml::listData($models, 'username', 'username');
                echo CHtml::dropDownList('username', '', $list, array('empty' => 'Select an user'));
            ?> 
            <a id="userBtn" onclick="moveToUser();" class="btn btn-info"><i class="fa fa-user"></i>Reassign Quotes</a>
        </span>
        <?php } ?>
    </div>
</div>
<hr>

<style>
    .nav-tabs > li > a {
        background-color: #f5f5f5;
    }
    .summary {
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
        var path = '<?php echo Yii::app()->createurl('quoteForm/admin',array('click'=>'__clicked__'))?>';
        path = path.replace('__clicked__',$('a[data-toggle="tab"][aria-expanded="true"]').attr('href'));
        path = path.replace('#','');
        window.location.href = path;
    });

    $('a[href="#<?php echo isset($_GET['click']) ? $_GET['click'] : 'home'; ?>"]').trigger('click');

    $('#global-tracker-quote-grid-followup td').on('dblclick', function() {
        console.log(this);
        var url=$(this).parent().find('.button-column .update').attr('href');
        if(typeof url !== 'undefined')
            window.location = url;
    });
    $('#global-tracker-quote-grid-quote td').on('dblclick', function() {
        console.log(this);
        var url=$(this).parent().find('.button-column .update').attr('href');
        if(typeof url !== 'undefined')
            window.location = url;
    });
    $('#global-tracker-quote-grid-hold td').on('dblclick', function() {
        console.log(this);
        var url=$(this).parent().find('.button-column .update').attr('href');
        if(typeof url !== 'undefined')
            window.location = url;
    });
    $('#global-tracker-quote-grid-archive td').on('dblclick', function() {
        console.log(this);
        var url=$(this).parent().find('.button-column .update').attr('href');
        if(typeof url !== 'undefined')
            window.location = url;
    });
    $('#global-tracker-quote-grid-result td').on('dblclick', function() {
        console.log(this);
        var url=$(this).parent().find('.button-column .update').attr('href');
        if(typeof url !== 'undefined')
            window.location = url;
    });
});

function moveTohold() {
    $('#holdBtn').html('Processing');
    $('#processingReq').show();
    $('input[type=checkbox]:checked').each(function (index, val) {
        console.log(val);
        console.log($(val).attr('value'));
        var idVal = $(val).attr('value');
        var url = '<?php echo Yii::app()->createUrl('quoteForm/changeStatus', array('id' => '__id__', 'status' => FilingGenerics::encryptKey(GlobalTrackerQuote::$enumStatus['hold'])));?>';
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
    window.location.href='<?php echo Yii::app()->createurl('quoteForm/admin', array('click' => 'menu2'))?>';
}

function moveToUser() {
    $('#userBtn').html('Processing');
    $('#processingReq').show();
    var username = $('#username').val();
    $('input[type=checkbox]:checked').each(function (index, val) {
        var idVal = $(val).attr('value');
        var url = '<?php echo Yii::app()->createUrl('quoteForm/changeUser', array('id' => '__id__', 'username' => '__username__'));?>';
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
    var path = '<?php echo Yii::app()->createurl('quoteForm/admin',array('click'=>'__clicked__'))?>';
    path = path.replace('__clicked__',$('a[data-toggle="tab"][aria-expanded="true"]').attr('href'));
    path = path.replace('#','');
    window.location.href = path;
}

function moveToArchive() {
    $('#archiveBtn').html('Processing');
    $('#processingReq').show();
    $('input[type=checkbox]:checked').each(function(index, val) {
        console.log(val);
        console.log($(val).attr('value'));
        var idVal = $(val).attr('value');
        archiveProcess(idVal);
        sleep(300);
    });
    window.location.href = '<?php echo Yii::app()->createurl('quoteForm/admin', array('click'=>'menu4'))?>';
}

function archiveProcess(idVal) {
    var url = '<?php echo Yii::app()->createUrl('quoteForm/changeStatus', array('id'=>'__id__', 'status'=>FilingGenerics::encryptKey(GlobalTrackerQuote::$enumStatus['archived'])));?>';
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
}

/*function searchText()
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

    var url='<?php //echo Yii::app()->createUrl('quoteForm/index',array('__searchQ__'=>'__sbox__')); ?>';
    url = url.replace('__searchQ__',x);
    url = url.replace('__sbox__',sb);
    url = url.replace('__click__',ctab);

    window.location.href = url;
}*/

function onFollowup() {
    $('#followUpBtn').html('Processing');
    $('#processingReq').show();

    $('input[type=checkbox]:checked').each(function(index, val) {
        console.log(val);
        console.log($(val).attr('value'));
        var idVal = $(val).attr('value');
        var url = '<?php echo Yii::app()->createUrl('quoteForm/followup', array('id' => '__id__', 'actionF' => '__actionF__'));?>';
        url = url.replace('__id__', idVal);
        url = url.replace('__actionF__', $('#followupAction').val());
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
    var path = '<?php echo Yii::app()->createurl('quoteForm/admin',array('click'=>'__clicked__'))?>';
    path=path.replace('__clicked__',$('a[data-toggle="tab"][aria-expanded="true"]').attr('href'));
    path=path.replace('#','');
    window.location.href = path;
}

function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds) {
            break;
        }
    }
}

function searchText() {
    var s = $('#searchQ').val();
    var sb = $('#sBox').val();
    if(s == 'phone') {
        console.log('in s');
        sb = sb.replace('(','');
        sb = sb.replace(')','');
        sb = sb.replace('-','');
        sb = sb.replace(' ','');
        sb = sb.trim();
        console.log(sb);
    }
    var ctab = $('.nav-tabs').find('li[class="active"] a').attr('href');
    ctab = ctab.replace('#','');
    var x = 'GlobalTrackerQuote['+s+']';

    var url = '<?php echo Yii::app()->createUrl('quoteForm/admin',array('__searchQ__'=>'__sbox__','click'=>'__click__')); ?>';
    url = url.replace('__searchQ__',x);
    url = url.replace('__sbox__',sb);
    url = url.replace('__click__',ctab);

    window.location.href = url;
}

/*function resetSearch()
{//var ctab=$('.nav-tabs').find('li[class="active"] a').attr('href');
   // ctab=ctab.replace('#','');

    var url='<?php //echo Yii::app()->createUrl('quoteForm/index'); ?>';
   // url = url.replace('__click__',ctab);

    window.location.href = url;
}*/
function resetSearch() {
    var ctab=$('.nav-tabs').find('li[class="active"] a').attr('href');
    ctab=ctab.replace('#','');

    var url='<?php echo Yii::app()->createUrl('quoteForm/admin',array('click'=>'__click__')); ?>';
    url = url.replace('__click__',ctab);
    window.location.href = url;
}

function checkAllF() {
    if($('#allF').is(":checked")) {
        selectAllF();
    } else {
        unSelectAllF();
    }
}

function checkAllQ() {
    if($('#allQ').is(":checked")) {
        selectAllQ();
    } else {
        unSelectAllQ();
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

function selectAllF() {
    $('#global-tracker-quote-grid-followup').find('input[type="checkbox"]').prop('checked', 'checked');
    $('#global-tracker-quote-grid-quote').find('input[type="checkbox"]').removeAttr('checked');
    $('#global-tracker-quote-grid-hold').find('input[type="checkbox"]').removeAttr('checked');
    $('#global-tracker-quote-grid-archive').find('input[type="checkbox"]').removeAttr('checked');
}
function selectAllQ() {
    $('#global-tracker-quote-grid-quote').find('input[type="checkbox"]').prop('checked', 'checked');
    $('#global-tracker-quote-grid-followup').find('input[type="checkbox"]').removeAttr('checked');
    $('#global-tracker-quote-grid-hold').find('input[type="checkbox"]').removeAttr('checked');
    $('#global-tracker-quote-grid-archive').find('input[type="checkbox"]').removeAttr('checked');
}
function selectAllH() {
    $('#global-tracker-quote-grid-hold').find('input[type="checkbox"]').prop('checked', 'checked');
    $('#global-tracker-quote-grid-followup').find('input[type="checkbox"]').removeAttr('checked');
    $('#global-tracker-quote-grid-quote').find('input[type="checkbox"]').removeAttr('checked');
    $('#global-tracker-quote-grid-archive').find('input[type="checkbox"]').removeAttr('checked');
}
function selectAllA() {
    $('#global-tracker-quote-grid-archive').find('input[type="checkbox"]').prop('checked', 'checked');
    $('#global-tracker-quote-grid-followup').find('input[type="checkbox"]').removeAttr('checked');
    $('#global-tracker-quote-grid-quote').find('input[type="checkbox"]').removeAttr('checked');
    $('#global-tracker-quote-grid-hold').find('input[type="checkbox"]').removeAttr('checked');
}

function unSelectAllF() {
    $('#global-tracker-quote-grid-followup').find('input[type="checkbox"]').removeAttr('checked');
}
function unSelectAllQ() {
    $('#global-tracker-quote-grid-quote').find('input[type="checkbox"]').removeAttr('checked');
}
function unSelectAllH() {
    $('#global-tracker-quote-grid-hold').find('input[type="checkbox"]').removeAttr('checked');
}
function unSelectAllA() {
    $('#global-tracker-quote-grid-archive').find('input[type="checkbox"]').removeAttr('checked');
}
</script>