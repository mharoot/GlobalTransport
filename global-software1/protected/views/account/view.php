<?php
/* @var $this AccountController */
/* @var $model GlobalTrackerShipper */

$this->breadcrumbs=array(
    GlobalTrackerShipper::$enumType[$_GET['type']]=>array('admin&type='.$_GET['type']),
	$model->id,
);

/*$this->menu=array(
	array('label'=>'List GlobalTrackerShipper', 'url'=>array('index')),
	array('label'=>'Create GlobalTrackerShipper', 'url'=>array('create')),
	array('label'=>'Update GlobalTrackerShipper', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GlobalTrackerShipper', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GlobalTrackerShipper', 'url'=>array('admin')),
);*/
?>

<h1>Account <?php echo $model->id; ?> <?php echo $model->company_name; ?></h1>
<div class="row">
<div class="col-md-12">
    <div class="row">

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">ACCOUNT INFORMATION</div>
                <div class="panel-body">
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nameon_card">Company Name:</label>
                                    <span><?php echo $model->company_name; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="name">First/Last:</label>
                                    <span><?php echo $model->fname.' '.$model->lname; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <span><?php echo GlobalTrackerShipper::$enumStatus[$model->status]; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="type">Type:</label>
                                    <span><?php echo GlobalTrackerShipper::$enumType[$model->type]; ?></span>
                                </div>
                                <!--<div class="form-group">
                                    <label for="type">Notes:</label>
                                    <span>XYZ</span>
                                </div>-->
                            </div>

                            <div class="col-sm-6">
                                <div>
                                    <label for="name">Rating</label>
                                    <span>****</span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">RECENTLY CREATED ORDER</div>
                <div class="panel-body">
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    No recent orders.
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">NOTE TO SHIPPER</div>
                <div class="panel-body">
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nameon_card">Contact #1:</label>
                                    <span><?php echo $model->contact1; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="name">Contact #2:</label>
                                    <span><?php echo $model->contact2; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="status">Phone 1:</label>
                                    <span><?php echo $model->phone2; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="type">Phone 2:</label>
                                    <span><?php echo $model->phone2; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="type">Cell Phone:</label>
                                    <span><?php echo $model->cell_phone; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="type">Fax:</label>
                                    <span><?php echo $model->fax; ?></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nameon_card">Email:</label>
                                    <span><?php echo $model->email; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="name">Address:</label>
                                    <span><?php echo $model->address; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="status">City:</label>
                                    <span><?php echo $model->city; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="type">State:</label>
                                    <span><?php echo $model->state; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="type">Zip Code:</label>
                                    <span><?php echo $model->zip; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="type">Country:</label>
                                    <span><?php echo $model->country; ?></span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>


