<?php
/**
 * Created by PhpStorm.
 * User: prasanjeet
 * Date: 5/28/18
 * Time: 10:09 PM
 */


?>

<div class="row" style="margin:0 auto; width: 80%; border: #ccc solid 1px;">

    <!-- Content Column -->
    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-8">
                <h3 class="bold">Order Receipt for Vehicle Transport</h3>
            </div>
            <div class="col-sm-4"><h4 class="bold grayFont">Order #<?php echo FilingGenerics::showOrderId($model->id); ?></h4></div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-5">
                <p class="top-head">Global Auto Transport</p>
                <p>2009 West Burbank Blvd. · Burbank, CA 91506</p>
            </div>
            <div class="col-sm-7">
                <div class="col-sm-6 text-right"> Salesperson: </div><div class="col-sm-6"><?php echo FilingGenerics::getUserName($model->created_by).'( '.$model->created_by.' )'; ?></div>
                <div class="col-sm-6 text-right"> Phone: </div><div class="col-sm-6"><a href="tel:<?php echo $model->mobile;?>"><?php echo !empty($model->mobile)?FilingGenerics::showPhone($model->mobile):'--';?></a></div>
                <div class="col-sm-6 text-right"> Fax: </div><div class="col-sm-6"><?php echo $model->fax;?></div>
                <div class="col-sm-6 text-right"> Email: </div><div class="col-sm-6"><a href="malto:<?php echo $model->email;?>"><?php echo $model->email;?></a></div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-sm-12">Once again, thank you for the opportunity to serve your automobile transport needs. This is your order receipt.<br /><span class="bold">Please review the information below and contact us immediately with any corrections.</span></div>
        </div>

        <div class="row">
            <div class="col-sm-7">
                <div class="col-sm-12 boxTitle">1. Shipper Information</div>
                <div class="row adjustMargin">
                    <div class="col-sm-3">First Name : </div><div class="col-sm-3 brd-btm"><?php echo $model->fname;?>  </div>
                    <div class="col-sm-3">Company : </div><div class="col-sm-3 brd-btm"><?php echo $model->company;?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-sm-3">Last Name : </div><div class="col-sm-3 brd-btm"><?php echo $model->lname;?> </div>
                    <div class="col-sm-3">Address : </div><div class="col-sm-3 brd-btm"><?php echo $model->address1;?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-sm-3">Phone 1 : </div><div class="col-sm-3 brd-btm"><?php echo !empty($model->phone1)?FilingGenerics::showPhone($model->phone1):'--';?> </div>
                    <div class="col-sm-3">Address 2 : </div><div class="col-sm-3 brd-btm"><?php echo $model->address2;?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-sm-3">Phone 2 : </div><div class="col-sm-3 brd-btm"><?php echo !empty($model->phone2)?FilingGenerics::showPhone($model->phone2):'--';?></div>
                    <div class="col-sm-3">City : </div><div class="col-sm-3 brd-btm"><?php echo $model->city;?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-sm-3">Cell : </div><div class="col-sm-3 brd-btm"><?php echo !empty($model->mobile)?FilingGenerics::showPhone($model->mobile):'--';?></div>
                    <div class="col-sm-3">State/Zip : </div><div class="col-sm-3 brd-btm"><?php echo $model->state.'/'.$model->zip; ?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-sm-3">Fax : </div><div class="col-sm-3 brd-btm"><?php echo $model->fax; ?></div>
                </div>
                <div class="row adjustMargin">
                    <div class="col-sm-3">Email : </div><div class="col-sm-9 brd-btm"><?php echo $model->email; ?></div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="col-sm-12 boxTitle">2. Pricing and Shipping</div>
                <div class="row txtBold">
                    <div class="col-sm-5 text-right">Price Quote : </div><div class="col-sm-5 brd-btm"><?php echo '$'.$model->extra5; ?></div>
                </div>
                <div class="row txtBold">
                    <div class="col-sm-5 text-right">Payments Rec'd : </div><div class="col-sm-5 brd-btm">$0.00 </div>
                </div>
                <div class="row txtBold">
                    <div class="col-sm-5 text-right">Total Balance : </div><div class="col-sm-5 brd-btm"><?php echo '$'.$model->extra5; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-5 text-right">Deposit Due : </div><div class="col-sm-5 brd-btm"><?php echo '$'.$model->extra6; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-5 text-right">COD Amount : </div><div class="col-sm-5 brd-btm"><?php echo '$'.$model->carrier_pay; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-5 text-right">Balance Paid By : </div><div class="small col-sm-5 brd-btm"><?php //echo GlobalTrackerDispatch::$enumPaidBy[$model->bal_paid_by]; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-5 text-right">1st Avail Date : </div><div class="col-sm-5 brd-btm"><?php echo $model->s_date; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-5 text-right">Est. Pickup Date : </div><div class="col-sm-5 brd-btm">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-sm-5 text-right">Est. Delivery Date : </div><div class="col-sm-5 brd-btm">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-sm-5 text-right">Ship Via : </div><div class="col-sm-5 brd-btm"><?php echo GlobalTrackerDispatch::$enumShipVia[$model->s_via]; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-5 text-right">Vehicle(s) Run : </div><div class="col-sm-5 brd-btm"><?php echo GlobalTrackerDispatch::$arrVRun[$model->s_vrun]; ?></div>
                </div>
            </div>
        </div>


        <div class="col-sm-12 boxTitle">3. Payments Received</div>
        <div class="row">
            <div class="col-sm-12">None</div>
        </div>


        <div class="col-sm-12 boxTitle">4. Transit Directives</div>
        <div class="col-sm-6">
            <div class="removeMargin row col-sm-12"><strong>Origin</strong></div>
            <div class="row col-sm-6">Name :</div><div class="col-sm-6 brd-btm"><?php echo $model->p_contactname; ?></div>
            <div class="row col-sm-6">company Name :</div><div class="col-sm-6 brd-btm"><?php echo $model->p_companyname; ?></div>
            <div class="row col-sm-6">Phone 1 :</div><div class="col-sm-6 brd-btm"><?php echo !empty($model->p_phone1)?FilingGenerics::showPhone($model->p_phone1):'--';?></div>
            <div class="row col-sm-6">Phone 2 :</div><div class="col-sm-6 brd-btm"><?php echo !empty($model->p_phone2)?FilingGenerics::showPhone($model->p_phone1):'--';?></div>
          <!--  <div class="row col-sm-6">Phone 3 :</div><div class="col-sm-6 brd-btm">3232223223</div>-->
            <div class="row col-sm-6">Address :</div><div class="col-sm-6 brd-btm"><?php echo $model->p_address1; ?></div>
            <div class="row col-sm-6">Address 2 :</div><div class="col-sm-6 brd-btm"><?php echo $model->p_address2 .'&nbsp;' ; ?></div>
            <!--<div class="row col-sm-6">Address 3 :</div><div class="col-sm-6 brd-btm"><?php /*echo $model->p_address3; */?></div>-->
            <div class="row col-sm-6">city :</div><div class="col-sm-6 brd-btm"><?php echo $model->p_city; ?></div>
            <div class="row col-sm-6">State/Zip :</div><div class="col-sm-6 brd-btm"><?php echo $model->p_state; ?>/<?php echo $model->p_zip; ?></div>
        </div>

        <div class="col-sm-6">
            <div class="removeMargin row col-sm-12"><strong>Destination</strong></div>
            <div class="row col-sm-6">Name :</div><div class="col-sm-6 brd-btm"><?php echo $model->d_contact_name; ?></div>
            <div class="row col-sm-6">company Name :</div><div class="col-sm-6 brd-btm"><?php echo $model->d_company_name; ?></div>
            <div class="row col-sm-6">Phone 1 :</div><div class="col-sm-6 brd-btm"><?php echo !empty($model->d_phone1)?FilingGenerics::showPhone($model->d_phone1):'--';?></div>
            <div class="row col-sm-6">Phone 2 :</div><div class="col-sm-6 brd-btm"><?php echo !empty($model->d_phone2)?FilingGenerics::showPhone($model->d_phone1):'--';?></div>
            <!--  <div class="row col-sm-6">Phone 3 :</div><div class="col-sm-6 brd-btm">3232223223</div>-->
            <div class="row col-sm-6">Address :</div><div class="col-sm-6 brd-btm"><?php echo $model->d_address; ?></div>
            <div class="row col-sm-6">Address 2 :</div><div class="col-sm-6 brd-btm"><?php echo '&nbsp;'; ?></div>
           <!-- <div class="row col-sm-6">Address 3 :</div><div class="col-sm-6 brd-btm"><?php /*echo $model->d_address3; */?></div>-->
            <div class="row col-sm-6">city :</div><div class="col-sm-6 brd-btm"><?php echo $model->d_city; ?></div>
            <div class="row col-sm-6">State/Zip :</div><div class="col-sm-6 brd-btm"><?php echo $model->d_state; ?>/<?php echo $model->d_zip; ?></div>
        </div>
        <div class="clearfix"></div>

        <div class="col-sm-12 bold" style="padding: 5px; margin: 20px 0;">Vehicle Information</div>

        <?php echo FilingGenerics::getVehicleInfoforOrderReceipt($model->id);?>

        <div class="col-sm-12 boxTitle">5. Deposit</div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6 text-right">Circle One :</div><div class="col-sm-6 brd-btm"></div>
                <div class="col-sm-6 text-right">Credit Card Number Name :</div><div class="col-sm-6 brd-btm"></div>
                <div class="col-sm-6 text-right">Name on Card :</div><div class="col-sm-6 brd-btm"></div>
                <div class="col-sm-6 text-right">Card Biling Addtrss :</div><div class="col-sm-6 brd-btm"></div>
                <div class="col-sm-6 text-right">City,State,Zip :</div><div class="col-sm-6 brd-btm"></div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6 text-right">Deposit :</div><div class="col-sm-5 brd-btm"></div>
                <div class="col-sm-6 text-right">Exp. Date :</div><div class="col-sm-5 brd-btm"></div>
                <div class="col-sm-6 text-right">Security Code :</div><div class="col-sm-5 brd-btm"></div>
                <div class="col-sm-5 text-right">&nbsp;</div><div class="col-sm-6">This is the last 3 digits on back of Visa/Mastercard or 4 digits above CC# on front of Amex. </div>
            </div>
        </div>


        <div class="clearfix"></div>
        <div class="col-sm-12 boxTitle">6. Additional Information, Instructions, and/or Conditions</div>
        <div class="col-lg-12">
            <div class="col-sm-6" style="margin-top: 37px;">
                <span style="margin-top: 37px;">Signature: </span>
            </div>
            <div class="col-sm-6">

                    <img class="img img-responsive" src="<?php echo $model->extra4;?>" style="float: right;"> </div>

        </div>
        <div class="col-sm-12 boxTitle">7. Terms and Conditions</div>
        <p>These Terms and Conditions shall be incorporated by reference into and made a part of any order submitted to Global Auto Transport ("Company") by the owner(s) or agent(s) ("Shipper") set forth in the Order Form. All orders are subject to acceptance by Company. Company reserves the right to refuse or cancel any order, without cause, at any time. Global Auto Transport is a registered, licensed and bonded broker . The Terms & Conditions, which are subject to change at any time, with or without notice, and the Terms and Conditions shall be collectively known as the "Transportation Agreement" or "Agreement".</p>

        <strong>1.Transportation</strong>
        <ul>
            <li>Shipper acknowledges and agrees that Global Auto Transport is hereby authorized to arrange shipment from the point of origin to the point of destination as specified in the Carrier Order Form.</li>
            <li>Global Auto Transport is a registered and licensed transporter (MC#722001).</li>
            <li>All transportation services are door to door unless specified in the Carrier Order Form due to hardship in accessing the pick-up or delivery location because of low-hanging trees, narrow streets, weight restrictions, etc...specific arrangements will be made for you to meet at a nearby safe and legal location with ample loading space (gas station, grocery store, etc.).</li>
            <li>Shipper is responsible for preparing the vehicle(s) for transport. All loose parts, fragile or protruding accessories, low hanging spoilers, fog lights, etc., must be removed and /or properly secured. Any part that falls off in transit is the shipper's responsibility. This includes damages done by said part to any and all vehicles involved.</li>
            <li>There will be a pick up and delivery inspection done by both the car carrier and the responsible shipper. Damage must be noted on the bill of lading and signed by both the carrier and the responsible shipper. This must be done regardless of weather, time of day, or dirt on vehicle. Signing the bill of lading without a notation of damage verifies that the vehicle has been received in good condition and that the car carrier is relieved of any further responsibility. Vehicle(s) MUST be checked thoroughly.</li>
            <li>By signing the Bill of Lading, the shipper assigns all responsibility to the assigned carrier, who is required by law to carry a minimum of $250,000 cargo and $1,000,000 in liability insurance.</li>
            <li>All claims must be noted and signed for at the time of delivery and submitted in writing to the assigned carrier within the terms of that carrier's Bill of Lading.</li>
            <li>Global Auto Transport will share the carrier's insurance policy information upon request but is not the entity responsible for any damages. The assigned carrier is solely responsible for the condition of your vehicle while it is in his possession.</li>
            <li>Global Auto Transport or its agents are not responsible for personal goods placed in the vehicle, or any damage they may cause.</li>
            <li>Shipper acknowledges and agrees that Global Auto Transport does not guarantee pick up or delivery on specified dates of shipments although Global Auto Transport will make good faith attempt to move the vehicle as promptly as possible and in accordance with shipper's instructions. All pick-up or delivery dates are estimated.</li>
            <li>Global Auto Transport or it agents will not be responsible for "Acts of God" (fire, flood, tornadoes, earthquakes, etc.) Each claim is different and should be taken up with the carrier's insurance.<br>
                (k) Global Auto Transport is not responsible for any rental fees, etc.</li>
        </ul>

        <br />
        <strong>2.Payment Terms</strong>
        <ul>
            <li>For all orders placed through Global Auto Transport, a minimum of $100.00 deposit is required depending on the size and condition of the vehicle.</li>
            <li>The deposit placed through Global Auto Transport is refundable to shipper in the event the shipper cancels the order and at the time of cancellation no carrier had been assigned to that order.</li>
            <li>For COD orders, all remaining payments are due at the time of delivery or pick-up to the transporting driver in any form of cash, cashier's check or money order.</li>
        </ul>

        <br />
        <strong>3.Fees</strong>
        <ul>
            <li>Global Auto Transport is not responsible for any rental fees, etc.</li>
            <li>Global Auto Transport has a NO FEE CANCELLATION Policy once shipment is cancelled in writing within 24 hours of scheduled pick-up time.</li>
        </ul>


        <div class="col-sm-12 boxTitle">8. COD Instructions</div>
        <div class="col-sm-12 bold">
            All COD payments shall be in the form of <u>cash or certified funds</u> upon delivery of your vehicle.<br /><br />
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
    .brd-btm{border-bottom:#333 solid 1px; padding-bottom:2px; padding-left: 1px!important; margin-bottom:5px;
        height: 25px;font-size: 13px;}
    .txtBold{font-weight: 600;}
    .adjustMargin{ margin-right: 0px!important; }
    .removeMargin{ margin-left:-30px; }
    .bold{ font-weight: bold; }
    .grayFont{ color: #999; }
</style>