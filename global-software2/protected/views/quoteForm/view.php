<?php
/* @var $this QuoteFormController */
/* @var $model GlobalTrackerQuote */

$this->breadcrumbs=array(
	'Quotes'=>array('index'),
	$model->id,
);
?>

<div class="row" style="margin-top:30px;">

    <ul class="nav nav-tabs">
        <li class="active"><a href="?r=quoteForm/view&id=<?php echo $model->id; ?>">Quote Detail</a></li>
        <li><a href="?r=quoteForm/update&id=<?php echo $model->id; ?>">Edit Quote</a></li>
        <li><a href="?r=quoteForm/history&id=<?php echo $model->id; ?>">Quote History</a></li>
    </ul>

    <!-- Content Column -->
    <div class="col-md-9">
        <!-- /.row -->

        <!-- Marketing Icons Section -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Quote <?php echo FilingGenerics::showQuoteId($model->id); ?> Details</h4>
                    </div>
                    <br>
                    <!-- Contact Form -->
                    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
                    <div class="col-md-9">
                        <div class="panel panel-default">
                            <div class="panel-heading">ORDER INFORMATION</div>
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
                                                <label for="nameon_card" >Shipper Details</label>
                                            </div>
                                            <div class="form-group" style="padding-left: 20px;">
                                                <?php echo $model->fname;?> <?php echo $model->lname;?><br / >
                                                <a href="tel:<?php echo $model->mobile;?>"><?php echo !empty($model->mobile)?FilingGenerics::showPhone($model->mobile):'--';?></a><br/>
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
                                            <?php echo FilingGenerics::getVehicleInfoforViewQ($model->id);?>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">PAYMENT DUE</div>
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
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-heading">NOTE FROM SHIPPER</div>
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
            </div>
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading">DATES</div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div>
                                        <label for="nameon_card">Estimated Ship Date: </label>
                                        <span><?php echo $model->s_date; ?></span>
                                    </div>
                                    <div>
                                        <label for="nameon_card">Next Follow-up: </label>
                                        <span id="next_followup"></span>
                                    </div>
                                    <div>
                                        <label for="nameon_card">Quote Expires: </label>
                                        <span id="quote_expire"></span>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-sm-12">
                <!-- <div class="panel panel-default">
                    <div class="panel-heading">NOTE TO SHIPPER</div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="row" style="border-bottom: #ccc solid 1px; padding-bottom:5px;">
                                <div class="col-sm-2">Date</div>

                                <div class="col-sm-8">Note</div>
                                <div class="col-sm-2">User</div>
                            </div>
                            <div class="row" style="padding-top: 5px;">

                                <div class="col-lg-12">
                                    <i class="no-data"> No Notes available</i>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div> -->
                <div class="panel panel-default">
                    <div class="panel-heading">NOTE TO SHIPPER</div>
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
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">NOTES</div>
            <div class="panel-body">
                <div class="form-group">
                    <div id="noteArea">
                        <table id="noteTable " class="table table-striped" style="margin-top:30px;">
                            <tr>
                                <td width="25%">Date</td>
                                <td width="60%">Notes</td>
                                <td width="15%">Added By</td>
                            </tr>
                            <?php echo FilingGenerics::getNotes($model->id); ?>
                        </table>                    
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">NOTES</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="nameon_card">Enter Notes from Customer</label>
                            <br />
                            <div class="alert alert-success" id="successservicety33" style="display: none"></div>
                            <div class="alert alert-danger" id="errorservicety33" style="display: none"></div>
                            <div class="row">
                                <input class="form-control" id="quote_id" type="hidden" value="<?php //echo $model->id; ?>"> -->
                                <?php //if(!$model->isNewRecord) { ?>
                                    <!-- <div class="col-lg-11"><div class="form-group"> <?php //echo $form->textField($model,'shipper_notes',array('class'=>'form-control')); ?></div></div>
                                    <div class="col-lg-1"><div class="form-group"> <input type="button" class="form-control btn btn-info" value="Add" onclick="addNote();"></div></div> -->

                                <?php /*}
                                else{ */
                                    ?>
                                    <!-- <div class="col-lg-12"><div class="form-group"> <?php //echo $form->textField($model,'shipper_notes',array('class'=>'form-control')); ?></div></div> -->

                                <?php //}?>
                            <!-- </div>

                            <div id="noteArea"> -->
                                <?php  /*if(!$model->isNewRecord) {
                                    $criteria = new CDbCriteria();
                                    $criteria->addCondition("quote_id = ".$model->id);

                                    $noteModels=DotTrackerNotes::model()->findAll($criteria);*/

                                    /*cho '<pre>';print_r($noteModels->getAttributes); die;

                                    $noteAll=$noteModels->attributes;*/
                                    /*echo '<table id="noteTable " class="table table-striped" style="margin-top:30px;">';

                                    echo '<tr>
                            <td width="10%">Date</td>
                            <td width="75%">Notes</td>
                            <td width="15%">Added By</td>
                        </tr>';
                                    foreach ($noteModels as $notes)
                                    {
                                        $noteAttr=$notes->attributes;

                                        echo '<tr>
                            <td>'.FilingGenericsFollowup::showDate($noteAttr['date']).'</td>
                            <td>'.$noteAttr['note'].'</td>
                            <td>'.FilingGenericsFollowup::getUserName($noteAttr['created_by']).'<br>( '.$noteAttr['created_by'].' )  </td>
                        </tr>';


                                    }
                                    echo '</table>';

//

                                } */?>
                            <!-- </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> -->

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
        <hr>

    </div>
    <div class="col-md-3 noprint">
        <div class="list-group">
            <a href="#" class="list-group-item active"><i class="fa fa-cogs"></i> Actions</a>
            <a href="<?php echo Yii::app()->createUrl('quoteForm/create'); ?>" target="_blank" class="list-group-item"><i class="fa fa-eye" aria-hidden="true"></i>
                &nbsp;Create Quote </a>
            <a href="<?php echo Yii::app()->createUrl('quoteForm/admin'); ?>" class="list-group-item"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;&nbsp;Back to Follow-up</a>
            <a href="<?php echo Yii::app()->createUrl('quoteForm/update',array('id'=>$model->id)); ?>" class="list-group-item"><i class="fa fa-pencil" aria-hidden="true"></i> Update Quotes</a>
            <a href="<?php echo Yii::app()->createUrl('quoteForm/convert',array('id'=>$model->id)); ?>" class="list-group-item"><i class="fa fa-refresh" aria-hidden="true"></i> Convert to Order</a>
            <a style="display: none" href="<?php echo Yii::app()->createUrl('quoteForm/authorizeSignature',array('id'=>$model->id)); ?>" class="list-group-item"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;&nbsp;Authorize Quote</a>
            <a style="display: none;" href="<?php echo Yii::app()->createUrl('quoteForm/shipperInvoice',array('id'=>$model->id)); ?>" class="list-group-item"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;&nbsp;Print Shipper Invoice</a>
        </div>
    </div>
    <!-- /.row -->
</div>

<script>
    $(document).ready(function() {
        var interval1 = <?php echo $settings->first_followup ?>;
        var ff = showdate(interval1);
        //alert(date);
        document.getElementById('next_followup').innerHTML = ff;

        var interval2 = <?php echo $settings->quote_expired ?>;
        var qe = showExpire(interval2);
        document.getElementById('quote_expire').innerHTML = qe;
    });

    function showdate(n) { 
        var uom = new Date(new Date()-0+n*86400000); 
        var month = uom.getMonth() + 1;
        if(month < 10) {
            month = '0' + month;
        }
        var day = uom.getDate();
        if(day < 10) {
            day = '0' + day;
        }
        var out = month + "/" + day + "/" + uom.getFullYear(); 
        return out; 
    }

    function showExpire(n) {
        var str = "<?php echo $model->creationdatetime; ?>";
        var creationTime = convertDateFromString(str);
        var uom = new Date(creationTime-0+n*86400000);
        var month = uom.getMonth() + 1;
        if(month < 10) {
            month = '0' + month;
        }
        var day = uom.getDate();
        if(day < 10) {
            day = '0' + day;
        }
        var out = month + "/" + day + "/" + uom.getFullYear();
        return out;
    }

    function convertDateFromString(dateString) { 
        if (dateString) { 
            var arr1 = dateString.split(" "); 
            var sdate = arr1[0].split('-'); 
            var date = new Date(sdate[0], sdate[1]-1, sdate[2]); 
            return date;
        } 
    }
</script>

<style>
    .no-data
    {
        color: lightslategrey !important;
    }
</style>
