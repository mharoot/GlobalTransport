<?php
/* @var $this AccountController */
/* @var $model GlobalTrackerShipper */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'global-tracker-shipper-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
    <div class="col-md-12">

            <div class="col-md-12" style="display: none;">
                <h4>NEW ACCOUNT</h4>
                <p>Complete the form below and click "Save Account" when finished.</p>
            </div>

            <div class="col-md-12" style="display: none">
                <div class="panel panel-default">
                    <div class="panel-heading">Acquire Account from Central Dispatch</div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="row">
                                <div class="col-sm-12" style="text-align: center;">
                                    Connect to Central Dispatch to import an account: <button class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Account Information</div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nameon_card">Company Name</label>
                                        <?php echo $form->textField($model,'company_name',array('class'=>'form-control')); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">Type</label>
                                        <br />
                                        <label class="checkbox-inline">
                                            <input type="checkbox" class="cbox" name="class" data-name="Carrier" value="1" disabled>Carrier
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" class="cbox" name="shipper" data-name="Shipper"  value="2" disabled>Shipper
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" class="cbox" name="terminal" data-name="Terminal" value="3" disabled>Terminal
                                        </label>
                                        <?php echo $form->hiddenField($model,'type',array('class'=>'form-control','value'=>$_GET['type'])); ?>
                                    </div>
                                </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nameon_card">Status</label>
                                        <?php echo $form->dropDownList($model,'status',GlobalTrackerShipper::$enumStatus,array('class'=>'form-control','prompt'=>'- Select Status - ')); ?>
                                    </div>



                                </div>
                                <div class="col-sm-6" style="display: none;">
                                    <div class="form-group">
                                        <label for="nameon_card">Notes</label>
                                        <textarea class="form-control" name="notes" style="height: 110px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Contact Information</div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="nameon_card">Contact 1</label>
                                        <?php echo $form->textField($model,'contact1',array('class'=>'form-control')); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="nameon_card">Contact 2</label>
                                        <?php echo $form->textField($model,'contact2',array('class'=>'form-control')); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">Phone 1</label>
                                        <?php echo $form->textField($model,'phone1',array('class'=>'form-control')); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">Phone 2</label>
                                        <?php echo $form->textField($model,'phone2',array('class'=>'form-control')); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">Cell Phone</label>
                                        <?php echo $form->textField($model,'cell_phone',array('class'=>'form-control')); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">Fax</label>
                                        <?php echo $form->textField($model,'fax',array('class'=>'form-control')); ?>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nameon_card">Email</label>
                                        <?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="nameon_card">Address 1</label>
                                        <?php echo $form->textField($model,'address',array('class'=>'form-control')); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">Address 2</label>
                                        <?php echo $form->textField($model,'address2',array('class'=>'form-control')); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="nameon_card">City</label>
                                        <?php echo $form->textField($model,'city',array('class'=>'form-control')); ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="nameon_card">State</label>
                                                <?php echo $form->textField($model,'state',array('class'=>'form-control')); ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="nameon_card">Zip</label>
                                                <?php echo $form->textField($model,'zip',array('class'=>'form-control')); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">Country</label>
                                        <?php echo $form->textField($model,'country',array('class'=>'form-control','value'=>'United States')); ?>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group" style="float: right;">
                        <button type="submit" class="btn btn-primary">Save Account</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>







	<!-- <div class="row buttons">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div> -->

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>

    $(document).ready(function(){
        $('.cbox[value="'+$('#GlobalTrackerShipper_type').val()+'"]').attr('checked','checked');
    });
</script>