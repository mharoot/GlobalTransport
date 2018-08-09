<?php
/**
 * Created by PhpStorm.
 * User: Yan
 * Date: 5/28/18
 * Time: 10:09 PM
 */

?>
<h3 class="bold" style="text-align: center; width:667px;">Dispatch Sheet</h3>
<div class="row" style="width:667px;">

    <!-- Content Column -->
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6" style="display:inline-block; position:relative;">
            	<p>Order ID: <?php echo $model->id; ?></p>
                <p class="top-head">Global Auto Transport</p>
                <p>2009 West Burbank Blvd.</p>
                <p>Burbank, CA 91506</p>
            </div>
            <div class="col-lg-6" style="display:inline-block; position:relative;">
            	<div class="col-lg-12">
	                <div class="col-lg-6 text-right" style="display:inline-block;">Company Phone: </div>
	                <div class="col-lg-6" style="display:inline-block;">(818) 956-5666</div>
                </div>
                <div class="col-lg-12">
                	<div class="col-lg-6 text-right" style="display:inline-block;">Dispatch Contact: </div>
                	<div class="col-lg-6" style="display:inline-block;"><?php echo $model->dispatch_contact; ?></div>
                </div>
                <div class="col-lg-12">
                	<div class="col-lg-6 text-right" style="display:inline-block;">Dispatch Phone: </div>
                	<div class="col-lg-6" style="display:inline-block;"><?php echo $model->dispatch_phone; ?></div>
                </div>
                <div class="col-lg-12">
	                <div class="col-lg-6 text-right" style="display:inline-block;">Dispatch Fax: </div>
	                <div class="col-lg-6" style="display:inline-block;"><?php echo $model->dispatch_fax; ;?></div>
                </div>
                <div class="col-lg-12">
	                <div class="col-lg-6 text-right" style="display:inline-block;">Dispatch MC#: </div>
	                <div class="col-lg-6" style="display:inline-block;">722001</div>
                </div>
        	</div>

            <div class="col-lg-12">
                <div class="col-lg-12 boxTitle" style="text-align:center;">Carrier Information</div>
                <?php $carrier = FilingGenerics::getCarrierInfo($model->carrier_name); ?>
                <div class="row adjustMargin">
                    	<div class="col-lg-2" style="display:inline-block; width:110px;">Order ID:</div>
                    	<div class="col-lg-4 brd-btm" style="display:inline-block; width:200px;"><?php echo $model->id;?>-OD</div>
	                    <div class="col-lg-2" style="display:inline-block; width:130px;">Phone(1):</div>
	                    <div class="col-lg-4 brd-btm" style="display:inline-block; width:180px;"><?php echo FilingGenerics::showPhone($carrier->phone1);?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-2" style="display:inline-block; width:110px;">Carrier:</div>
                    <div class="col-lg-4 brd-btm" style="display:inline-block; width:200px;"><?php echo $model->carrier_name; ?></div>
                    <div class="col-lg-2" style="display:inline-block; width:130px;">Phone(2):</div>
                    <div class="col-lg-4 brd-btm" style="display:inline-block; width:180px;"><?php echo FilingGenerics::showPhone($carrier->phone2);?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-2" style="display:inline-block; width:110px;">Contact:</div>
                    <div class="col-lg-4 brd-btm" style="display:inline-block; width:200px;"><?php echo $carrier->contact1; ?></div>
                    <div class="col-lg-2" style="display:inline-block; width:130px;">Phone(Fax):</div>
                    <div class="col-lg-4 brd-btm" style="display:inline-block; width:180px;"><?php echo FilingGenerics::showPhone($carrier->fax);?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-2" style="display:inline-block; width:110px;">Address:</div>
                    <div class="col-lg-4 brd-btm" style="display:inline-block; width:200px;"><?php echo $carrier->address; ?></div>
                    <div class="col-lg-2" style="display:inline-block; width:130px;">Phone(Cell):</div>
                    <div class="col-lg-4 brd-btm" style="display:inline-block; width:180px;"><?php echo FilingGenerics::showPhone($carrier->cell_phone); ?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-2" style="display:inline-block; width:110px;">City:</div>
                    <div class="col-lg-4 brd-btm" style="display:inline-block; width:200px;"><?php echo $carrier->city; ?></div>
                    <div class="col-lg-2" style="display:inline-block; width:130px;">Driver:</div>
                    <div class="col-lg-4 brd-btm" style="display:inline-block; width:180px;"><?php echo $model->driver_fname;?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-2" style="display:inline-block; width:110px;">Email:</div>
                    <div class="col-lg-4 brd-btm" style="display:inline-block; width:200px;"><?php echo $carrier->email; ?></div>
                    <div class="col-lg-2" style="display:inline-block; width:130px;">Driver Phone:</div>
                    <div class="col-lg-4 brd-btm" style="display:inline-block; width:180px;"><?php echo FilingGenerics::showPhone($model->driver_phone);?></div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="col-lg-12 boxTitle" style="text-align:center;">Order Information</div>
                <div class="row adjustMargin">
                    <div class="col-lg-2" style="display:inline-block; width:130px;">Dispatch Date:</div>
                    <div class="col-lg-4 brd-btm" style="display:inline-block; width:180px;"><?php echo $model->dispatched_time;?></div>
                    <div class="col-lg-2" style="display:inline-block; width:200px;">Carrier Pay(total):</div>
                    <div class="col-lg-4 brd-btm" style="display:inline-block; width:110px;"><?php echo $model->carrier_pay;?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-2" style="display:inline-block; width:160px;">Pickup Estimated:</div>
                    <div class="col-lg-4 brd-btm" style="display:inline-block; width:150px;"><?php echo $model->s_date; ?></div>
                    <div class="col-lg-2" style="display:inline-block; width:200px;">On Delivery to Carrier:</div>
                    <div class="col-lg-4 brd-btm" style="display:inline-block; width:110px;">none</div>  
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-2" style="display:inline-block; width:160px;">Delivery Estimated:</div>
                    <div class="col-lg-4 brd-btm" style="display:inline-block; width:150px;"><?php echo $model->extra1; ?></div>
                    <div class="col-lg-2" style="display:inline-block; width:200px;">Company* owes Carrier:</div>
                    <div class="col-lg-4 brd-btm" style="display:inline-block; width:110px;"><?php echo $model->carrier_pay;?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-2" style="display:inline-block; width:160px;">Ship Via:</div>
                    <div class="col-lg-4 brd-btm" style="display:inline-block; width:150px;"><?php echo GlobalTrackerOrder::$enumShipVia[$model->s_via]; ?></div>
                    <div class="col-lg-2" style="display:inline-block; width:200px;">Vehicles Run:</div>
                    <div class="col-lg-4 brd-btm" style="display:inline-block; width:110px;"><?php echo GlobalTrackerOrder::$arrVRun[$model->s_vrun]; ?></div>
                </div>
            </div>
            <div class="col-lg-12">AMPM Auto Transport agrees to pay SEI Transport $1,200.00 within 2 business days (Quick Pay) of delivery. Payment will be made with Company Check.<br/>*The company (broker, dealer, auction, rental company, etc.) that originated this dispatch sheet.</div>

            <div class="col-lg-12">
                <div class="col-lg-12 boxTitle" style="text-align:center;">Vehicle Information</div>
                <?php echo FilingGenerics::getVehicleInfoforDispatchSheet($model->id);?>
            </div>

        	<div class="col-lg-6" style="display:inline-block; width:330px;">
                <div class="col-lg-12 boxTitle" style="text-align:center;">Pickup From</div>
                <div class="row adjustMargin">
                    <div class="col-lg-4" style="display:inline-block; width:90px;">LOCALE:</div>
                    <div class="col-lg-8 brd-btm" style="display:inline-block; width:200px;">SHIPPER SPECIFIC</div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-4" style="display:inline-block; width:90px;">Name:</div>
                    <div class="col-lg-8 brd-btm" style="display:inline-block; width:200px;"><?php echo $model->p_contactname ?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-4" style="display:inline-block; width:90px;">Address:</div>
                    <div class="col-lg-8 brd-btm" style="display:inline-block; width:200px;"><?php echo $model->p_address1; ?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-4" style="display:inline-block; width:90px;">City/State:</div>
                    <div class="col-lg-8 brd-btm" style="display:inline-block; width:200px;"><?php echo $model->p_city.' / '.$model->p_state; ?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-4" style="display:inline-block; width:90px;">Zip Code:</div>
                    <div class="col-lg-8 brd-btm" style="display:inline-block; width:200px;"><?php echo $model->p_zip; ?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-4" style="display:inline-block; width:90px;">Phone 1:</div>
                    <div class="col-lg-8 brd-btm" style="display:inline-block; width:200px;"><?php echo FilingGenerics::showPhone($model->p_phone1);?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-4" style="display:inline-block; width:90px;">Phone 2:</div>
                    <div class="col-lg-8 brd-btm" style="display:inline-block; width:200px;"><?php echo FilingGenerics::showPhone($model->p_phone2);?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-4" style="display:inline-block; width:90px;">Cell:</div>
                    <div class="col-lg-8 brd-btm" style="display:inline-block; width:200px;"><?php echo FilingGenerics::showPhone($model->p_mobile);?></div>
                </div>
            </div>
            <div class="col-lg-6" style="display:inline-block; width:330px;">
                <div class="col-lg-12 boxTitle" style="text-align:center;">Deliver To</div>
                <div class="row adjustMargin">
                    <div class="col-lg-4" style="display:inline-block; width:90px;">LOCALE:</div>
                    <div class="col-lg-8 brd-btm" style="display:inline-block; width:200px;">SHIPPER SPECIFIC</div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-4" style="display:inline-block; width:90px;">Name:</div>
                    <div class="col-lg-8 brd-btm" style="display:inline-block; width:200px;"><?php echo $model->d_contact_name ?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-4" style="display:inline-block; width:90px;">Address:</div>
                    <div class="col-lg-8 brd-btm" style="display:inline-block; width:200px;"><?php echo $model->d_address; ?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-4" style="display:inline-block; width:90px;">City/State:</div>
                    <div class="col-lg-8 brd-btm" style="display:inline-block; width:200px;"><?php echo $model->d_city.' / '.$model->d_state; ?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-4" style="display:inline-block; width:90px;">Zip Code:</div>
                    <div class="col-lg-8 brd-btm" style="display:inline-block; width:200px;"><?php echo $model->d_zip; ?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-4" style="display:inline-block; width:90px;">Phone 1:</div>
                    <div class="col-lg-8 brd-btm" style="display:inline-block; width:200px;"><?php echo FilingGenerics::showPhone($model->d_phone1);?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-4" style="display:inline-block; width:90px;">Phone 2:</div>
                    <div class="col-lg-8 brd-btm" style="display:inline-block; width:200px;"><?php echo FilingGenerics::showPhone($model->d_phone2);?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-lg-4" style="display:inline-block; width:90px;">Cell:</div>
                    <div class="col-lg-8 brd-btm" style="display:inline-block; width:200px;"><?php echo FilingGenerics::showPhone($model->d_mobile);?></div>
                </div>
            </div>
           	
            <div class="col-lg-12">
            	<div class="col-lg-12 boxTitle" style="text-align:center;">Dispatch Instructions</div>
				<p>This should be picked up within 2 days of 06/28/2018</p>
        		<p>This should be delivered within 2 days of 07/03/2018</p>
            </div>

            <div class="col-lg-12">
            	<div class="col-lg-12 boxTitle" style="text-align:center;">Additional Terms</div>
				<?php echo $settings->dispatch_term; ?>
            </div>

            <div class="col-lg-12">
            	<b>PLEASE GIVE THE SHIPPER AT LEAST A 24 HOUR NOTICE FOR PICKUP AND DELIVERY.<br>
            		PLEASE DO A THOROUGH INSPECTION OF THE VEHICLE ON PICKUP.</b><br><br>
            		Authority to transport this vehicle is hereby assigned to Express Auto Shipping. By accepting this agreement Express Auto Shipping certifies that they have the proper legal authority and insurance to carry the above described vehicle, only on trucks owned by Express Auto Shipping. All invoices must be accompanied by a signed delivery receipt and faxed to AMPM Auto Transport. The above agreed upon price includes any and all surcharges unless otherwise agreed to by both Express Auto Shipping and AMPM Auto Transport.<br><br>
            		Not withstanding anything to the contrary, the agreement between Express Auto Shipping and AMPM Auto Transport, as described in this dispatch sheet, is solely between Express Auto Shipping and AMPM Auto Transport. Dealertrack Central Dispatch, Inc. is not a party to such agreement, has no obligation under such agreement and expressly disclaims all liability whatsoever arising out of, or in connection with such agreement.</p>
            	<p style="text-align:right;">CD reference # 17307120</p>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
       setTimeout(function(){
           window.print();
           window.onfocus=function(){ window.close();}
       },1000);
    });
</script>

<style type="text/css">
    .mt-1{margin-top: 5px;}
    .top-head{font-size: 20px; font-weight: 600;}
    .boxTitle{ background-color: #e3dede; border-top:#333 solid 1px;border-bottom:#333 solid 1px; padding: 5px; margin: 20px 0; font-size: 14px;font-weight: 600;}
    hr{ border-top: 1px solid #333;}
    .brd-btm{border-bottom:#333 solid 1px; padding-bottom:1px; margin-bottom:2px;
        height: 20px;font-size: 14px;}
    .txtBold{font-weight: 600;}
    .adjustMargin{ margin-right: 0px!important; font-size: 14px; width:100%;}
    .removeMargin{ margin-left:-30px; }
    .bold{ font-weight: bold; }
    .grayFont{ color: #999; }
</style>