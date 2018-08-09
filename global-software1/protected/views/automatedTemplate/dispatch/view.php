<?php
/* @var $this OrderFormController */
/* @var $model GlobalTrackerOrder */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id,
);

?>

<div class="row" style="margin-top:30px;">

    <ul class="nav nav-tabs">
        <li class="active"><a href="?r=orderForm/view&id=<?php echo $model->id; ?>">Order Detail</a></li>
        <li><a href="?r=orderForm/update&id=<?php echo $model->id; ?>">Edit Order</a></li>
        <li><a href="?r=orderForm/history&id=<?php echo $model->id; ?>">Order History</a></li>
        <li><a href="?r=orderForm/payment&id=<?php echo $model->id; ?>">Payments</a></li>
        <?php if(!empty($model->dispatched_time)) { ?>
            <li><a href="?r=orderForm/dispatchSheet&id=<?php echo $model->id; ?>">Dispatch Sheet</a></li>
        <?php } ?>
    </ul>

    <h3>ORDER <?php echo FilingGenerics::showOrderId($model->id); ?> Details</h4>

    <!-- Content Column -->
    <div class="col-md-9">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Order Information</div>
                <div class="panel-body">
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="nameon_card">Assigned to:</label>
                                    <span><?php echo FilingGenerics::getUserName($model->created_by).' ('.$model->created_by.')'; ?></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <label for="nameon_card">Shipper Details</label>
                                </div>
                                <div class="form-group" style="padding-left: 20px;">
                                    <?php echo $model->fname;?> <?php echo $model->lname;?><br / >
                                    <a href="tel:<?php echo $model->mobile;?>"><?php echo !empty($model->mobile)?FilingGenerics::showPhone($model->mobile):'--';?></a>
                                    <a href="malto:<?php echo $model->email;?>"><?php echo FilingGenerics::breakEmail($model->email);?></a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <label for="origin">Origin:</label>
                                    <span><?php echo $model->p_city.', '.$model->p_state.' '.$model->p_zip;?></span>
                                </div>
                                <div>
                                    <label for="destination">Destination:</label>
                                    <span><?php echo $model->d_city.', '.$model->d_state.' '.$model->d_zip;?></span>
                                </div>
                                <?php echo FilingGenerics::getVehicleInfoforView($model->id);?>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Notes From Shipper</div>
                <div class="panel-body">
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <?php echo empty($model->notes_shipper)?'<i class="no-data">No Notes available.</i> ':'<p>'.$model->notes_shipper.'</p>'; ?>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Notes To Shipper</div>
                <div class="panel-body">
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <?php echo empty($model->info_forShipper)?'<i class="no-data">No Notes available.</i> ':'<p>'.$model->info_forShipper.'</p>'; ?>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Payments Due</div>
                <div class="panel-body">
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="nameon_card">Total Tariff:</label>
                                    <span><?php 
                                            if($model->extra5 != "") {
                                                echo '$'.$model->extra5;
                                            } else {
                                                echo '$0.00';
                                            } 
                                          ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="nameon_card">Deposit Required:</label>
                                    <span><?php 
                                            if($model->extra6 != "") {
                                                echo '$'.$model->extra6;
                                            } else {
                                                echo '$0.00';
                                            } 
                                          ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="nameon_card">Received Deposit:</label>
                                    <span style="color: red;"><?php echo '$0.00'; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="nameon_card">Carrier Pay:</label>
                                    <span><?php 
                                            if($model->carrier_pay != "") {
                                                echo '$'.$model->carrier_pay;
                                            } else {
                                                echo '$0.00';
                                            } 
                                          ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="nameon_card">Balance Paid By:</label>
                                    <span><?php echo $model->bal_paid_by; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="nameon_card">COD/COP Method: </label>
                                    <span><?php echo $model->cod_method;//echo GlobalTrackerOrder::$enumCodMethod[$model->cod_method]; ?></span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Dates</div>
                <div class="panel-body">
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="nameon_card">1st Avail. Pickup Date: </label>
                                <span><?php 
                                        if(!empty($model->s_date)) {
                                            echo $model->s_date;
                                        } else {
                                            echo '(none)';
                                        }
                                      ?></span>
                            </div>
                            <div class="col-sm-12">
                                <label for="nameon_card">Dispatched: </label>
                                <span><?php 
                                        if(!empty($model->dispatched_time)) {
                                            echo $model->dispatched_time;
                                        } else {
                                            echo '(none)';
                                        }
                                      ?></span>
                            </div>
                            <div class="col-sm-12">
                                <label for="nameon_card">Load Date: </label>
                                <span><?php 
                                        if(!empty($model->extra)) {
                                            echo $model->extra;
                                        } else {
                                            echo '(none)';
                                        }
                                      ?></span>
                            </div>
                            <div class="col-sm-12">
                                <label for="nameon_card">Delivery Date: </label>
                                <span><?php 
                                        if(!empty($model->extra1)) {
                                            echo $model->extra1;
                                        } else {
                                            echo '(none)';
                                        }
                                      ?></span>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <?php 
                if(!empty($model->dispatched_time) && $model->dispatched_time != '0000-00-00 00:00:00') {
                    $carrier = new GlobalTrackerShipper();
                    if(!empty($model->carrier_name)) {
                        $carrier = FilingGenerics::getCarrierInfo($model->carrier_name);
                    }
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">Dispatched To Carrier</div>
                <div class="panel-body">
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="nameon_card">Name: </label>
                                <span><?php 
                                        if(!empty($carrier->company_name)) {
                                            //echo $carrier->company_name;
                                            echo '<a href="'.Yii::app()->createUrl('account/view&type=2',array('id'=>$carrier->id)).'">'.$carrier->company_name.'</a>';
                                        } else {
                                            echo '(none)';
                                        }
                                      ?></span>
                            </div>
                            <div class="col-sm-12">
                                <label for="nameon_card">Contact: </label>
                                <span><?php 
                                        if(!empty($carrier->contact1)) {
                                            echo $carrier->contact1;
                                        } else {
                                            echo '(none)';
                                        }
                                      ?></span>
                            </div>
                            <div class="col-sm-12">
                                <label for="nameon_card">Phone: </label>
                                <span><?php 
                                        if(!empty($carrier->phone1)) {
                                            echo $carrier->phone1;
                                        } else {
                                            echo '(none)';
                                        }
                                      ?></span>
                            </div>
                            <div class="col-sm-12">
                                <label for="nameon_card">Email: </label>
                                <span><?php 
                                        if(!empty($carrier->email)) {
                                            echo $carrier->email;
                                        } else {
                                            echo '(none)';
                                        }
                                      ?></span>
                            </div>
                            <div class="col-sm-12">
                                <label for="nameon_card">Driver: </label>
                                <span><?php 
                                        if(!empty($model->driver_fname)) {
                                            echo $model->driver_fname;
                                        } else {
                                            echo '(none)';
                                        }
                                      ?></span>
                            </div>
                            <div class="col-sm-12">
                                <label for="nameon_card">Driver Phone: </label>
                                <span><?php 
                                        if(!empty($model->driver_phone)) {
                                            echo $model->driver_phone;
                                        } else {
                                            echo '(none)';
                                        }
                                      ?></span>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <?php } ?>
        </div>

        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Internal Notes</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div id="noteArea">
                            <table id="noteTable " class="table table-striped" style="margin-top:30px;">
                                <tr>
                                    <td width="20%">Date</td>
                                    <td width="70%">Notes</td>
                                    <td width="20%">Added By</td>
                                </tr>
                                <?php echo FilingGenerics::getNotes($model->quote_id); ?>     
                            </table>                    
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="display: none;">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">MY TASK</div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="row" style="margin:0 auto;">
                                <div class="col-sm-1"><input type="text" name="date" size="8" placeholder="date"></div>
                                <div class="col-sm-9"><input type="text" name="date" placeholder="date" style="width: 100%"></div>
                                <div class="col-sm-2"><button>Add Note</button></div>
                                <div>&nbsp;</div>
                                <div class="col-sm-2">12/05/2018 2:00am</div>
                                <div class="col-sm-8">Hi this is testing</div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 noprint" style="float:right;">
        <div class="list-group">
            <a href="#" class="list-group-item active"><i class="fa fa-cogs"></i> Actions</a>
            <a href="<?php echo Yii::app()->createUrl('orderForm/create'); ?>" target="_blank" class="list-group-item"><i class="fa fa-eye" aria-hidden="true"></i>
                &nbsp;Create Order </a>
            <a href="<?php echo Yii::app()->createUrl('orderForm/admin'); ?>" class="list-group-item"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;&nbsp;Manage Orders</a>
            <a href="<?php echo Yii::app()->createUrl('orderForm/update',array('id'=>$model->id)); ?>" class="list-group-item"><i class="fa fa-pencil" aria-hidden="true"></i> Update Orders</a>
            <a href="<?php echo Yii::app()->createUrl('orderForm/authorizeSignature',array('id'=>$model->id)); ?>" class="list-group-item"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;&nbsp;Authorize Order</a>

            <a target="_blank" href="<?php echo Yii::app()->createUrl('orderForm/orderReceipt',array('id'=>$model->id)); ?>" class="list-group-item"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;&nbsp;Print Order Receipt</a>
            <a style="display: none;" href="<?php echo Yii::app()->createUrl('orderForm/shipperInvoice',array('id'=>$model->id)); ?>" class="list-group-item"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;&nbsp;Print Shipper Invoice</a>
        </div>
    </div>
</div>

<style>

    .no-data
    {
        color: lightslategrey !important;
    }
</style>

