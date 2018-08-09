<?php
/* @var $this QuoteFormController */
/* @var $model GlobalTrackerQuote */

$this->breadcrumbs=array(
    'Quotes'=>array('index'),
    $model->id,
);


?>


<div class="row">

    <!-- Content Column -->
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 10px;">
                <center><img src="http://www.globalautotransportation.com/wp-content/themes/global%20auto%20transportation/images/logo2.png" class="img img-responsive"><h2 style=" ">Or FORM (quote# : <?php echo FilingGenerics::showQuoteId($model->id); ?>) </h2></center>

            </div>
            <!-- Contact Form -->
            <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">SHIPPER INFORMATION</div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group" style="display: none;">
                                        <label for="nameon_card">Select Shipper: </label>
                                        <select name="shipper" class="form-control">
                                            <option value="">Select</option>
                                            <option value="New Shipper">New Shipper</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="nameon_card">First Name: </label>
                                        <?php echo $model->fname; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="nameon_card">Last Name: </label>
                                        <?php echo $model->lname; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">Company: </label>
                                        <?php echo $model->company; ?>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="nameon_card">Email: </label>
                                        <?php echo $model->email; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="nameon_card">Phone 1: </label>
                                        <?php echo $model->phone1; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="nameon_card">Phone 2: </label>
                                        <?php echo $model->phone2; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">Mobile: </label>
                                        <?php echo $model->mobile; ?>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="nameon_card">Address: </label>
                                        <?php echo $model->address1; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="nameon_card">City: </label>
                                        <?php echo $model->fax; ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="nameon_card">State: </label>
                                                <?php echo $model->state; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="nameon_card">Zip: </label>
                                                <?php echo $model->zip; ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="nameon_card">Fax: </label>
                                                <?php echo $model->fax; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <!--Pickup Contact and location -->
                <div class="panel panel-default">
                    <div class="panel-heading">PICKUP CONTACT & LOCATION</div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="row">
                                <div class="col-sm-4" style="display: none;">
                                    <div class="form-group">
                                        <label for="nameon_card">Select Contact: </label>
                                        <select name="select-contact" class="form-control">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row" style="display: none;">
                                        <div class="col-sm-3 col-xs-6" >
                                            <label for="nameon_card">Select Terminal: </label>
                                            <select name="select-terminal" class="form-control">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2 col-xs-6">
                                            <div class="checkbox" style="margin-top: 28px;">
                                                <label><input type="checkbox" value="" name="asContact">Use as contact: </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="nameon_card">Address: </label>
                                        <?php echo $model->p_address1; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="nameon_card">Company: </label>
                                        <?php echo $model->p_companyname; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="nameon_card">City: </label>
                                        <?php echo $model->p_city; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="nameon_card">Zip: </label>
                                        <?php echo $model->p_zip; ?>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="nameon_card">Contact Name: </label>
                                        <?php echo $model->p_contactname; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="nameon_card">Phone Number 2: </label>
                                        <?php echo $model->p_phone2; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="nameon_card">Buyer Number: </label>
                                        <?php echo $model->p_buyernumber; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">State: </label>
                                        <?php echo $model->p_state; ?>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="nameon_card">Phone Numbmer: </label>
                                        <?php echo $model->p_phone1; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">Phone Number 3: </label>
                                        <?php echo $model->p_phone3; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">Mobile: </label>
                                        <?php echo $model->p_mobile; ?>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <!-- Delivery Information & Location -->


                <!-- Shipping Information -->
                <div class="panel panel-default">
                    <div class="panel-heading">SHIPPING INFORMATION</div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="nameon_card">1st Avail. Pickup Date *: </label>
                                        <?php echo $model->s_date; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="nameon_card">Vehicle(s) Run *: </label>


                                        <?php
                                        if(!empty($model->s_vrun) && array_key_exists($model->s_vrun,GlobalTrackerQuote::$arrVRun))
                                        {
                                            echo GlobalTrackerQuote::$arrVRun[$model->s_vrun];
                                        }
                                        else{
                                            echo '--';
                                        }

                                        //echo GlobalTrackerQuote::$arrVRun[$model->s_vrun]; ?>

                                    </div>

                                    <div class="form-group">
                                        <label for="nameon_card">Ship Via *: </label>
                                        <?php
                                        if(!empty($model->s_via) && array_key_exists($model->s_via,GlobalTrackerQuote::$enumShipVia))
                                        {
                                            echo GlobalTrackerQuote::$enumShipVia[$model->s_via];
                                        }
                                        else{
                                            echo '--';
                                        }
                                        //echo GlobalTrackerQuote::$enumShipVia[$model->s_via]; ?>

                                    </div>
                                </div>
                                <div class="col-sm-2 col-xs-hidden">&nbsp;</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nameon_card">Information for shipper: </label>
                                        <?php echo $model->info_forShipper; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">Notes from Shipper: </label>
                                        <?php echo $model->notes_shipper; ?>
                                    </div>
                                    <!--<div class="checkbox">
                                        <label><input type="checkbox" value="">Include Shipper Comment on Dispatch Sheet: </label>
                                        <?php /*echo $form->textField($model,'extra',array('class'=>'form-control')); */?>
                                    </div>-->
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>


                <!-- Vehicle Information -->
                <div class="panel panel-default">
                    <div class="panel-heading">VEHICLE INFORMATION</div>
                    <?php //echo $model->vehicle_info; ?>
                    <div class="panel-body" style="">
                        <?php echo FilingGenerics::getVehicleInfoforQuoteReceipt($model->id); ?>
                    </div>
                </div>


                <!-- PRICING Information -->
                <div class="panel panel-default">
                    <div class="panel-heading">PRICING INFORMATION</div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="row">

                                <div class="col-sm-8">
                                    <div class="row m-b-sm">
                                        <div class="col-sm-4">Total :</div>
                                        <div class="col-sm-2" id="tariffVal"><?php echo '$'.$model->extra5; ?></div>
                                        <div class="col-sm-6">(Edit under the Vehicle Information section)</div>
                                    </div>
                                    <div class="row m-b-sm">
                                        <div class="col-sm-4">Required Deposit :</div>
                                        <div class="col-sm-2" id="depositVal"><?php echo '$'.$model->extra6; ?></div>
                                        <div class="col-sm-6">(Edit deposit under the Vehicle Information section)</div>
                                    </div>
                                    <div class="row m-b-sm">
                                        <div class="col-sm-4">Carrier Pay :</div>
                                        <div class="col-sm-2"><?php echo '$'.$model->carrier_pay; ?></div>
                                        <div class="col-sm-6">(Edit deposit under the Vehicle Information section)</div>
                                    </div>

                                    <div class="row m-b-sm">
                                        <div class="col-sm-4">Balance Paid By *</div>
                                        <div class="col-sm-3">
                                            <?php //echo GlobalTrackerQuote::$enumPaidBy[$model->bal_paid_by]; ?>
                                        </div>
                                    </div>
                                    <div class="row m-b-sm">
                                        <div class="col-sm-4">Pickup Terminal Fee :</div>
                                        <div class="col-sm-2"><?php echo '$'.$model->pickup_terminal_fee; ?> </div>
                                        <div class="col-sm-6">(Do not include fees paid directly by shipper to terminal)</div>
                                    </div>

                                    <div class="row m-b-sm">
                                        <div class="col-sm-4">Delivery Terminal Fee :</div>
                                        <div class="col-sm-2"><?php echo '$'.$model->delivery_terminal_fee; ?> </div>
                                        <div class="col-sm-6">(Do not include fees paid directly by shipper to terminal)</div>
                                    </div>
                                    <!--<div class="row m-b-sm">
                                        <div class="col-sm-4">Delivery Terminal Fee :</div>
                                        <div class="col-sm-2"<?php /*echo '$'.$model->delivery_terminal_fee; */?> </div>
                                        <div class="col-sm-6">(Do not include fees paid directly by shipper to terminal)</div>
                                    </div>-->
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">REFERRAL INFORMATION</div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="city">Referred by: </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <?php if(!empty($model->referred_by) && array_key_exists($model->referred_by,GlobalTrackerQuote::$enumReferBy)) {
                                            echo GlobalTrackerQuote::$enumReferBy[$model->referred_by];
                                        } else {
                                            echo '--';
                                        }
                                    ?>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <!-- <div class="panel panel-default">
                    <div class="panel-heading" ><h5 id="autho">AUTHORIZE SIGNATURE</h5></div>
                    <div class="panel-body">
                        <div id="errorMsg" style="display: none"></div>
                        <fieldset>


                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="signature">SIGNATURE: </label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div id="signBoard"></div>
                                        <p style="max-width: 300px; word-break: break-word; text-align: center">Sign inside the above box and click on "Submit Form" to update your signature.</p>
                                        <div onclick="clearCanvas();" style="max-width: 300px;text-align: center;cursor: pointer;text-decoration: underline;">Clear</div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group"><label for="signature">DATE: </label></div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <?php //echo $model->extra2; ?>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                </div> -->



            </div>
        </div>
    </div>


    <!-- /.row -->
</div>
<input class="btn btn-success " type="button" value="Submit Form" onclick="onSaveclick();" style="float: right;">

<div id="myModal" class="modal fade" role="dialog" style="margin-top: 100px;">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body">
                <p style="text-align:center;font-size: large; color:green;"><i class="fa fa-check"></i> Authorization Form has been submitted successfully.</p>
            </div>

        </div>

    </div>
</div>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/simple-undo/lib/simple-undo.js"></script>

<!-- in a production environment, just include the minified script. It contains the board and the default controls (size, nav, colors, download): -->
<!--<script src="../dist/drawingboard.min.js"></script>-->

<script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/drawingboard.js/js/utils.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/drawingboard.js/js/board.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/drawingboard.js/js/controls/control.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/drawingboard.js/js/controls/color.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/drawingboard.js/js/controls/drawingmode.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/drawingboard.js/js/controls/navigation.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/drawingboard.js/js/controls/size.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/drawingboard.js/js/controls/download.js"></script>


<style>
    #signBoard {
        width: 300px;
        height: 100px;
        border:none;
    }

    #signBoard1
    {
        width: 300px;
        height: 100px;
        border:none;
    }

    #errorMsg
    {
        color: red;
        padding: 18px;
    }
</style>

<script type="application/javascript">
    var simpleBoard = new DrawingBoard.Board('signBoard', {
        controls: false,
        webStorage: false,
        size: 5,

    });


    function clearCanvas() {
        $('#signBoard').html('');
        var simpleBoard = new DrawingBoard.Board('signBoard', {
            controls: false,
            webStorage: false,
            size: 5,

        });
    }


    function onSaveclick(){
        var successF=true;
        var failM='';

        html2canvas($("#signBoard"), {
            onrendered: function(canvas) {
                var myImage = canvas.toDataURL("image/png");
                var myImage = myImage.replace(/^data:image\/(png|jpg);base64,/, "");
                //alert(myImage.length);
                if(myImage.length <= 1144)
                {
                    successF=false;
                    failM= failM + '<li>Please sign the Authorization Form.</li>';
                }


                if(!successF)
                {
                    $('#errorMsg').show();
                    $('#errorMsg').html(failM);

                    $("html, body").animate({ scrollTop: ($('#autho').offset().top-20) }, 1000);
                    // $(window).scrollTop($('#autho').offset().top)
                    return false;
                } else {
                    $('#errorMsg').hide();
                }

                var sendUrl= '<?php echo $this->createUrl('/quoteForm/saveScr',array('id'=>$model->id)); ?>';
                $.ajax({
                    type:'POST',
                    url: sendUrl,
                    data:{'imgData': myImage},
                    dataType: 'JSON',
                    success:function(jsonResp) {
                        console.log(jsonResp);
                        $('#myModal').modal('show');
                        setTimeout(function(){
                            $('#myModal').modal('hide');
                            window.close();
                        },2000);
                    },
                    error:function(err)
                    {
                        console.log('error in updating data');
                        $('#myModal').modal('show');
                        setTimeout(function(){
                            $('#myModal').modal('hide');
                            //window.close();
                        },2000);
                    }

                });

            }
        });
    }
</script>
