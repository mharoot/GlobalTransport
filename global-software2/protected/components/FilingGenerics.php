<?php

/**
 * Created by PhpStorm.
 * User: prasanjeet
 * Date: 3/30/18
 * Time: 8:08 AM
 */
class FilingGenerics
{
    public static $serviceType = array(
        'servicety1' => 'S Corporation',
        'servicety2' => 'C Corporation',
        'servicety3' => 'Limited Liability Company (LLC)',
        'servicety4' => 'Limited Liability Partnership (LLP)',
        'servicety5' => 'Limited Partnership (LP)',
        'servicety6' => 'Fictitious Business Name (DBA)',
        'servicety7' => 'USDOT #',
        'servicety8' => 'MC # Carrier Authority',
        'servicety9' => 'MC # Broker Authority',
        'servicety10' => 'Freight Forwarder (FF #)',
        'servicety11' => 'California DOT # (CA #)',
        'servicety12' => 'Motor Carrier Permit (MCP)',
        'servicety13' => 'Employee Pull Notice (EPN)',
        'servicety14' => 'Hazardous Materials Registration (CA)',
        'servicety15' => 'Hazardous Materials Registration (Federal)',
        'servicety16' => 'BOC-3',
        'servicety17' => 'International Fuel Tax Agreement (IFTA)',
        'servicety18' => 'Highway Use Tax (2290)',
        'servicety19' => 'Unified Carrier Registration (UCR)',
        'servicety20' => 'Texas Operating Authority',
        'servicety21' => 'BMC-84 Surety Bond',
        'servicety22' => 'BMC-85 Trust Bond',
        'servicety23' => 'International Registration Plan (IRP)',
        'servicety24' => 'New Mexico Weight Distance Permit',
        'servicety25' => 'Oregon Fuel Tax Permit',
        'servicety26' => 'New York HUT Permit',
        'servicety27' => 'KYU Weight Distance Permit',
        'servicety28' => 'Biennial Update',
        'servicety29' => 'MC# Reinstatement',
        'servicety30' => 'MC# Detachment',
        'servicety31' => 'MC# Revocation',
        'servicety32' => 'MC# Name Change',
        'servicety33' => 'MC# Reattachment',
        'servicety34' => 'USDOT# Reactivation',
        'servicety35' => 'USDOT# Deactivation'
    );

    public static function breakEmail($email) {
        if(strlen($email) >= 20) {
            $head = substr($email, 0, 20);
            $tail = substr($email, 20);
            return $head."<br>".$tail;
        } else {
            return $email;
        }
    }

    public static function getVehicleInfo($id)
    {
        $text = '';

        if (!(isset($id) && !empty($id)))
            return '';

        $Vehicle = self::getVehicle($id);
        $ob = json_decode($Vehicle->vehicle_info);
        // echo '<pre>';print_r($ob->Vehicle_tariff1); die;

        for ($i = 1; $i <= 5; $i++) {
            $tariff = 'Vehicle_tariff' . $i;
            $deposit = 'Vehicle_deposit' . $i;
            $year = 'Vehicle_year' . $i;
            $make = 'Vehicle_make' . $i;
            $mod = 'Vehicle_model' . $i;
            $color = 'Vehicle_color' . $i;
            $plate = 'Vehicle_plate' . $i;
            $vin = 'Vehicle_vin' . $i;
            $lot = 'Vehicle_lot' . $i;
            $type = 'Vehicle_type' . $i;
            $deliveryState = 'Vehicle_deliveryState' . $i;


            if (!empty($ob->$tariff)) {
                echo '<fieldset>
    
                            <div class="row">
                            <div class="col-lg-12">
                            <h4 style="text-decoration: underline">Vehicle ' . $i . '</h4>
</div>

                                <div class="col-sm-4">


                                    <div class="form-group">
                                        <label for="nameon_card">Tariff : $ </label>
                                        ' . $ob->$tariff . '
                                    </div>

                                    <div class="form-group">
                                        <label for="nameon_card">Deposit : $ </label>
                                        ' . $ob->$deposit . '
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="nameon_card">Year : </label>
                                                ' . $ob->$year . '
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="nameon_card">Make : </label>
                                                ' . $ob->$make . '
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">Model : </label>
                                            ' . $ob->$mod . '                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">Type : </label>
                                        ' . $ob->$type . '
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">Color: </label>
                                        ' . $ob->$color . '
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="nameon_card">Plat #: </label>
                                        ' . $ob->$plate . '
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">State: </label>
                                       ' . $ob->$deliveryState . '
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">Vin: </label>
                                        ' . $ob->$vin . '
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">Lot #: </label>
                                        ' . $ob->$lot . '
                                    </div>
                                </div>
                            </div>

                        </fieldset>';
            }
        }
    }

    public static function getVehicleInfoforMailQuote($id) {
        $text = '';
        if (!(isset($id) && !empty($id)))
            return '';
        $Vehicle = GlobalTrackerQuote::model()->findByPk($id);
        $ob = json_decode($Vehicle->vehicle_info);
        // echo '<pre>';print_r($ob->Vehicle_tariff1); die;
        $txt = '';
        for ($i = 1; $i <= 5; $i++) {
            $tariff = 'Vehicle_tariff' . $i;
            $deposit = 'Vehicle_deposit' . $i;
            $year = 'Vehicle_year' . $i;
            $make = 'Vehicle_make' . $i;
            $mod = 'Vehicle_model' . $i;
            $type = 'Vehicle_type' . $i;
            if (!empty($ob->$tariff)) {

                $txt .= $ob->$make . ' ' . $ob->$mod . ' (' . $ob->$year . '),';
            }
            if (($i > 1) && ($i < 5)) {
                //$txt.=' and ';
            }
        }
        $txt = rtrim($txt, ',');
        return $txt;
    }

    public static function getVehicleInfoforMail($id) {
        $text = '';

        if (!(isset($id) && !empty($id)))
            return '';

        $Vehicle = self::getVehicle($id);
        $ob = json_decode($Vehicle->vehicle_info);
        // echo '<pre>';print_r($ob->Vehicle_tariff1); die;
        $txt = '';
        for ($i = 1; $i <= 5; $i++) {
            $tariff = 'Vehicle_tariff' . $i;
            $deposit = 'Vehicle_deposit' . $i;
            $year = 'Vehicle_year' . $i;
            $make = 'Vehicle_make' . $i;
            $mod = 'Vehicle_model' . $i;
            $color = 'Vehicle_color' . $i;
            $plate = 'Vehicle_plate' . $i;
            $vin = 'Vehicle_vin' . $i;
            $lot = 'Vehicle_lot' . $i;
            $type = 'Vehicle_type' . $i;
            $deliveryState = 'Vehicle_deliveryState' . $i;
            if (!empty($ob->$tariff)) {
                $txt .= $ob->$make . ' ' . $ob->$mod . ' (' . $ob->$year . '),';
            }
            if (($i > 1) && ($i < 5)) {
                //$txt.=' and ';
            }
        }
        $txt = rtrim($txt, ',');
        return $txt;
    }

    public static function getVehicleInfoforDispatchSheet($id) {
        $text = '';
        if (!(isset($id) && !empty($id)))
            return '';

        $Vehicle = self::getVehicle($id);
        $ob = json_decode($Vehicle->vehicle_info);
        // echo '<pre>';print_r($ob->Vehicle_tariff1); die;
        $txt='<table class="table table-condensed table-bordered">
            <thead>
            <tr>
                <th>Year/Make/Model</th>
                <th>Type</th>
                <th>Color</th>
                <th>Plate</th>
                <th>VIN</th>
                <th>Lot Number</th>
            </tr>';
        for ($i = 1; $i <= 5; $i++) {
            $tariff = 'Vehicle_tariff' . $i;
            $deposit = 'Vehicle_deposit' . $i;
            $year = 'Vehicle_year' . $i;
            $make = 'Vehicle_make' . $i;
            $mod = 'Vehicle_model' . $i;
            $color = 'Vehicle_color' . $i;
            $plate = 'Vehicle_plate' . $i;
            $vin = 'Vehicle_vin' . $i;
            $lot = 'Vehicle_lot' . $i;
            $type = 'Vehicle_type' . $i;
            $deliveryState = 'Vehicle_deliveryState' . $i;
            if (!empty($ob->$tariff)) {
                $txt .= '<tr>
                            <td>' . $ob->$year . ' '. $ob->$make .' ' . $ob->$mod . '</td>
                            <td>' . GlobalTrackerOrder::$enumbVehicleType[$ob->$type] . '</td>
                            <td>' . $ob->$color . '</td>
                            <td>' . $ob->$plate . '</td>
                            <td>' . $ob->$vin . '</td>
                            <td>' . $ob->$lot . '</td>
                        </tr>';
            }
        }

        $txt.= '</thead></table>';
        return $txt;
    }

    public static function getVehicleInfoforOrderReceipt($id) {
        $text = '';
        if (!(isset($id) && !empty($id)))
            return '';

        $Vehicle = self::getVehicle($id);
        $ob = json_decode($Vehicle->vehicle_info);
        // echo '<pre>';print_r($ob->Vehicle_tariff1); die;
        $txt='<table class="table table-condensed table-bordered">
            <thead>
            <tr>
                <th>Year/Make/Model</th>
                <th>Type</th>
                <th>Color</th>
                <th>Lic. Plate</th>
                <th>VIN</th>
                <th>Lot Num</th>
                <th>Tariif</th>
            </tr>';
        for ($i = 1; $i <= 5; $i++) {
            $tariff = 'Vehicle_tariff' . $i;
            $deposit = 'Vehicle_deposit' . $i;
            $year = 'Vehicle_year' . $i;
            $make = 'Vehicle_make' . $i;
            $mod = 'Vehicle_model' . $i;
            $color = 'Vehicle_color' . $i;
            $plate = 'Vehicle_plate' . $i;
            $vin = 'Vehicle_vin' . $i;
            $lot = 'Vehicle_lot' . $i;
            $type = 'Vehicle_type' . $i;
            $deliveryState = 'Vehicle_deliveryState' . $i;
            if (!empty($ob->$tariff)) {

                $txt .= '
            <tr>
                <td>' . $ob->$year . ' '. $ob->$make .' ' . $ob->$mod . '</td>
                <td>' . GlobalTrackerOrder::$enumbVehicleType[$ob->$type] . '</td>
                <td>' . $ob->$color . '</td>
                <td>' . $ob->$plate . '</td>
                <td>' . $ob->$vin . '</td>
                <td>' . $ob->$lot . '</td>
                <td>$' . $ob->$tariff . '</td>
            </tr>';
            }
        }

        $txt.= '</thead>
        </table>';
        return $txt;
    }

    public static function getVehicleInfoforQuoteReceipt($id)
    {
        $text = '';
        if (!(isset($id) && !empty($id)))
            return '';

        $Vehicle = GlobalTrackerQuote::model()->findByPk($id);
        $ob = json_decode($Vehicle->vehicle_info);
        // echo '<pre>';print_r($ob->Vehicle_tariff1); die;
        $txt='<table class="table table-condensed table-bordered">
            <thead>
            <tr>
                <th>Year/Make/Model</th>
                <th>Type</th>
                
                <th>Tariif</th>
            </tr>';
        for ($i = 1; $i <= 5; $i++) {
            $tariff = 'Vehicle_tariff' . $i;
            $deposit = 'Vehicle_deposit' . $i;
            $year = 'Vehicle_year' . $i;
            $make = 'Vehicle_make' . $i;
            $mod = 'Vehicle_model' . $i;
            $color = 'Vehicle_color' . $i;
            $plate = 'Vehicle_plate' . $i;
            $vin = 'Vehicle_vin' . $i;
            $lot = 'Vehicle_lot' . $i;
            $type = 'Vehicle_type' . $i;
            $deliveryState = 'Vehicle_deliveryState' . $i;
            if (!empty($ob->$tariff)) {

                $txt .= '
            <tr>
                <td>' . $ob->$year . ' '. $ob->$make .' ' . $ob->$mod . '</td>
                <td>' . GlobalTrackerQuote::$enumbVehicleType[$ob->$type] . '</td>
                <td>$' . $ob->$tariff . '</td>
            </tr>';
            }
        }
        $txt.= '</thead>
        </table>';
        return $txt;
    }

    public static function getVehicle($id)
    {
        $res = $id > 60;
        $Vehicle = GlobalTrackerDispatch::model()->findByPk("61");
        if ( isset ($Vehicle->vehicle_info) ) {
            return $Vehicle;
        } else {
            return GlobalTrackerOrder::model()->findByPk($id);
        }
    }

    public static function getVehicleInfoforView($id)
    {
        $text = '';

        if (!(isset($id) && !empty($id)))
            return '';

        $Vehicle = self::getVehicle($id);
        $ob = json_decode($Vehicle->vehicle_info);
        // echo '<pre>';print_r($ob->Vehicle_tariff1); die;
        $txt = '';
        $c = 1;
        for ($i = 1; $i <= 5; $i++) {
            $tariff = 'Vehicle_tariff' . $i;
            $deposit = 'Vehicle_deposit' . $i;
            $year = 'Vehicle_year' . $i;
            $make = 'Vehicle_make' . $i;
            $mod = 'Vehicle_model' . $i;
            $color = 'Vehicle_color' . $i;
            $plate = 'Vehicle_plate' . $i;
            $vin = 'Vehicle_vin' . $i;
            $lot = 'Vehicle_lot' . $i;
            $type = 'Vehicle_type' . $i;
            $deliveryState = 'Vehicle_deliveryState' . $i;

            if (!empty($ob->$tariff)) {
                $txt .= '<div><label for="vehicleInfo">Vehicle ' . $c . ':</label></div><div style="padding-left: 20px;">' . $ob->$year . ' ' . $ob->$make . ' ' . $ob->$mod . '<br />' . GlobalTrackerOrder::$enumbVehicleType[$ob->$type] . '</div>';
                $c++;
            }

            if (($i > 1) && ($i < 5)) {
                //$txt.=' and ';
            }
        }

        $txt = rtrim($txt, ',');
        return $txt;
    }

    public static function getVehicleInfoforViewQ($id) {
        $text = '';
        if (!(isset($id) && !empty($id)))
            return '';

        $Vehicle = GlobalTrackerQuote::model()->findByPk($id);
        $ob = json_decode($Vehicle->vehicle_info);

        $txt = '';
        $c = 1;
        for ($i = 1; $i <= 5; $i++) {
            $tariff = 'Vehicle_tariff' . $i;
            $deposit = 'Vehicle_deposit' . $i;
            $year = 'Vehicle_year' . $i;
            $make = 'Vehicle_make' . $i;
            $mod = 'Vehicle_model' . $i;
            $color = 'Vehicle_color' . $i;
            $plate = 'Vehicle_plate' . $i;
            $vin = 'Vehicle_vin' . $i;
            $lot = 'Vehicle_lot' . $i;
            $type = 'Vehicle_type' . $i;
            $deliveryState = 'Vehicle_deliveryState' . $i;

            if (!empty($ob->$tariff)) {
                $txt .= '<div><label for="vehicleInfo">Vehicle ' . $c . ':</label></div><div style="padding-left: 20px;">' . $ob->$year . ' ' . $ob->$make . ' ' . $ob->$mod . '<br />' . GlobalTrackerQuote::$enumbVehicleType[$ob->$type] . '</div>';
                $c++;
            }
            if (($i > 1) && ($i < 5)) {
                //$txt.=' and ';
            }
        }
        $txt = rtrim($txt, ',');
        return $txt;
    }

    public static $serviceTypeFile = array(
        /*  'servicety1'=>'S Corporation',
          'servicety2'=>'C Corporation',
          'servicety3'=>'Limited Liability Company (LLC)',
          'servicety4'=>'Limited Liability Partnership (LLP)',
          'servicety5'=>'Limited Partnership (LP)',
          'servicety6'=>'Fictitious Business Name (DBA)',
          'servicety7'=>'USDOT #',
          'servicety8'=>'MC # Carrier Authority',
          'servicety9'=>'MC # Broker Authority',
          'servicety10'=>'Freight Forwarder (FF #)',
          'servicety11'=>'California DOT # (CA #)',
          'servicety12'=>'Motor Carrier Permit (MCP)',
          'servicety13'=>'Employee Pull Notice (EPN)',
          'servicety14'=>'Hazardous Materials Registration (CA)',
          'servicety15'=>'Hazardous Materials Registration (Federal)',
          'servicety16'=>'BOC-3',
          'servicety17'=>'International Fuel Tax Agreement (IFTA)',
          'servicety18'=>'Highway Use Tax (2290)',
          'servicety19'=>'Unified Carrier Registration (UCR)',
          'servicety20'=>'Texas Operating Authority',
          'servicety21'=>'BMC-84 Surety Bond',
          'servicety22'=>'BMC-85 Trust Bond',
          'servicety23'=>'International Registration Plan (IRP)',
          'servicety24'=>'New Mexico Weight Distance Permit',
          'servicety25'=>'Oregon Fuel Tax Permit',
          'servicety26'=>'New York HUT Permit',
          'servicety27'=>'KYU Weight Distance Permit',
          'servicety28'=>'Biennial Update',
          'servicety29'=>'MC# Reinstatement',*/
        'servicety30' => 'MC# Detachment', //asda
        /*'servicety31'=>'MC# Revocation',
        'servicety32'=>'MC# Name Change',*/
        'servicety33' => 'MC# Reattachment',// file
        /*'servicety34'=>'USDOT# Reactivation',
        'servicety35'=>'USDOT# Deactivation'*/
    );

    public static function showDate($dispDate)
    {
        //date_default_timezone_set('America/Los_Angeles');
        return date('m/d/Y h:i:s A', strtotime($dispDate));
    }

    public static function showYMD($dispDate) {
        return date('m/d/Y', strtotime($dispDate));
    }

    public static function getuserRole($username)
    {
        if (!(isset($username) && !empty($username))) {
            return 0;
        }
        $userDetail = DotTrackerUser::model()->findByAttributes(array('username' => $username));

        return $userDetail->role;
    }

    public static function getUserName($username)
    {
        if (!(isset($username) && !empty($username))) {
            return 0;
        }
        $userDetail = DotTrackerUser::model()->findByAttributes(array('username' => $username));

        return $userDetail->fname . ' ' . $userDetail->lname;

    }

    public static function getUserPhone($username)
    {
        if (!(isset($username) && !empty($username))) {
            return 0;
        }
        $userDetail = DotTrackerUser::model()->findByAttributes(array('username' => $username));

        return $userDetail->phone;

    }

    public static function getuserId($username)
    {
        if (!(isset($username) && !empty($username))) {
            return 0;
        }
        $userDetail = DotTrackerUser::model()->findByAttributes(array('username' => $username));

        return $userDetail->id;


    }

    public static function getAuthEmail($username)
    {
        if (!(isset($username) && !empty($username))) {
            return false;
            die;
        }

        $userDetail = DotTrackerUser::model()->findByAttributes(array('username' => $username));

        return $userDetail->email;


    }

    public static function getFirstName($name)
    {
        if (!empty($name)) {
            return explode(" ", $name)[0];
        } else {
            return 'Customer';
        }
    }


    public static function showEpnId($id)
    {
        return $id . '-EPN';
    }

    public static function showAemailId($id)
    {
        return $id . '-AEM';
    }

    public static function showQuoteId($id)
    {
        return $id . '-QT';
    }

    public static function showOrderId($id)
    {
        return $id . '-OD';
    }

    public static function showCCid($id)
    {
        return $id . '-CCA';
    }

    public static function showMcId($id)
    {
        return $id . '-MC';
    }

    public static function showPhone($data)
    {
        if($data == 'none' || $data == '') {
            return 'none';
        } else {
            return '(' . substr($data, 0, 3) . ') ' . substr($data, 3, 3) . '-' . substr($data, 6);
        }
    }

    public static function showDAmt($amt)
    {
        //return '$'.$amt;
        if ($amt == '0') {
            return '--';
        }
        return $amt;
    }

    public static function showAmt($amt)
    {
        return '$' . $amt;

    }

    public static function encryptKey($id)
    {
        $key = 'asdsajhkgjfhgsagdja234dsdssajgdnvsd213';
        $val = $id . $key;
        return base64_encode($val);

    }

    public static function decryptKey($id)
    {
        $key = 'asdsajhkgjfhgsagdja234dsdssajgdnvsd213';
        return str_replace($key, '', base64_decode($id));

    }

    public static function showServiceType($id)
    {
        $DotTrackerQuote = DotTrackerQuote::model()->findByPk($id);
        $allData = CJSON::decode($DotTrackerQuote->arrdata);
        $txt = '';

        foreach ($allData as $data) {
//            print_r($data);

            $txt = $txt . '<li style="list-style: none;"> <b>' . self::$serviceType[$data['id']] . '</b> (Tariff : ' . $data['amt'] . ')</li>';
        }

        // die;
        return $txt;

    }


    public static function getAllUsers() {
        $userArr = array();
        $allUser = DotTrackerUser::model()->findAll();
        $option = '';

        foreach ($allUser as $user) {
            $userArr[$user['id']] = $user['username'];

        }
    }


    public static function getUserList() {
        $models = DotTrackerUser::model()->findAll(array('order' => 'username DESC'));
        return CHtml::listData($models, 'username', 'username');
    }

    public static function getContactList() {
        $models = GlobalTrackerShipper::model()->findAll();

        // print_r($models);die;
        $options='';
        foreach ($models as $model) {
           if($model->type==GlobalTrackerShipper::$arrType['shipper'])
           $options.='<option value="'.$model->id.'">'.$model->fname.' '.$model->lname.'</option>';
        }
        return $options;
    }

    /*
     * Retrieve all the carriers' name and store into an array
     * Created by Yan
     */
    public static function getCarrierList() {
        $carriers = GlobalTrackerShipper::model()->findAll('type=:Type', array(':Type'=>1));
        $list = CHtml::listData($carriers, 'company_name', 'company_name');

        return $list;
    }

    /*
     * Retrieve the specific carrier's information and fit into 'View' page
     * Created by Yan
     */
    public static function getCarrierInfo($company_name) {
        $carrier = GlobalTrackerShipper::model()->find('company_name=:cName', array(':cName'=>$company_name));
        return $carrier;
    }

    /**
     *Get all the notes which has the selected user_id
     *Created by: Yan Wang
     **/
    public static function getNotes($quote_id) {
        $notes = DotTrackerNotes::model()->findAll('quote_id=:quoteID', array(':quoteID'=>$quote_id));
        $res = '';

        if($notes != null) {
            foreach ($notes as $note) {
                $res .= '<tr><td width="25%">' . $note->date . '</td><td width="50%">' . $note->note . '</td><td width="25%">' . $note->created_by . '</td></tr>';
            }
        }
        
        return $res;
    }

    /*
     *Display all the operation history for a specific quote
     *Created by: Yan Wang
     */
    public static function displayQHistory($quote_id) {
        $model = new GlobalTrackerQuote();
        $history = DotTrackerQuoteHistory::model()->findAll('quote_id=:quoteID', array(':quoteID'=>$quote_id));
        $res = '';

        if($history != null) {
            $cur = '';
            for($i=count($history)-1; $i>=0; $i--) {
                if($i == count($history)-1) {
                    $res .= '<div class="row"><label class="col-md-12">['.$history[count($history)-1]->created_time.'] Quote '.$history[count($history)-1]->quote_id.' created by '.$history[count($history)-1]->created_by.'</label></div>';
                    $res .= '<div class="container"><table class="table table-bordered" style="text-align: center;"><thead style="background-color:gray; color:white;"><tr><th style="text-align:center;">Field</th><th style="text-align:center;">Old Value</th><th style="text-align:center;">New Value</th></tr></thead>';
                    $cur = $history[$i]->created_time;
                } else if($history[$i]->created_time != $cur && $i != count($history)-1) {
                    $res .= '</table></div><br><div class="row"><label class="col-md-12">['.$history[$i]->created_time.'] Quote '.$history[$i]->quote_id.' created by '.$history[$i]->created_by.'</label></div>';
                    $res .= '<div class="container"><table class="table table-bordered" style="text-align: center;"><thead style="background-color:gray; color:white;"><tr><th style="text-align:center;">Field</th><th style="text-align:center;">Old Value</th><th style="text-align:center;">New Value</th></tr></thead>';
                    $cur = $history[$i]->created_time;
                }
                $res .= '<tr><td style="width: 200px; font-weight: bold;">'.$model->getAttributeLabel($history[$i]->field).'</td>'.'<td>'.$history[$i]->old_value.'</td><td>'.$history[$i]->new_value.'</td></tr>';
            }
            $res .= '</table></div><br>';
        } else {
            $res .= 'No records found.';
        }

        return $res;
    }

    /*
     *Display all the operation history for a specific order
     *Created by: Yan Wang
     */
    public static function displayOHistory($order_id) {
        $model = new GlobalTrackerOrder();
        $history = DotTrackerOrderHistory::model()->findAll('order_id=:orderID', array(':orderID'=>$order_id));
        $res = '';

        if($history != null) {
            $cur = '';
            for($i=count($history)-1; $i>=0; $i--) {
                if($i == count($history)-1) {
                    $res .= '<div class="row"><label class="col-md-12">['.$history[count($history)-1]->created_time.'] Order '.$history[count($history)-1]->order_id.' created by '.$history[count($history)-1]->created_by.'</label></div>';
                    $res .= '<div class="container"><table class="table table-bordered" style="text-align: center;"><thead style="background-color:gray; color:white;"><tr><th style="text-align:center;">Field</th><th style="text-align:center;">Old Value</th><th style="text-align:center;">New Value</th></tr></thead>';
                    $cur = $history[$i]->created_time;
                } else if($history[$i]->created_time != $cur && $i != count($history)-1) {
                    $res .= '</table></div><br><div class="row"><label class="col-md-12">['.$history[$i]->created_time.'] Order '.$history[$i]->order_id.' created by '.$history[$i]->created_by.'</label></div>';
                    $res .= '<div class="container"><table class="table table-bordered" style="text-align: center;"><thead style="background-color:gray; color:white;"><tr><th style="text-align:center;">Field</th><th style="text-align:center;">Old Value</th><th style="text-align:center;">New Value</th></tr></thead>';
                    $cur = $history[$i]->created_time;
                }
                $res .= '<tr><td style="width: 200px; font-weight: bold;">'.$model->getAttributeLabel($history[$i]->field).'</td>'.'<td>'.$history[$i]->old_value.'</td><td>'.$history[$i]->new_value.'</td></tr>';
            }
            $res .= '</table></div><br>';
        } else {
            $res .= 'No records found.';
        }

        return $res;
    }

    /*
     * Display the vehicles' information in dispatch sheet
     * Created by Yan
     */
    public static function dispatchSheetDisplay($id) {
        if(empty($id))
            return '';

        $Vehicle = self::getVehicle($id);
        $obj = json_decode($Vehicle->vehicle_info);

        for($i=1; $i<=5; $i++) {
            if(!empty($obj->{'Vehicle_tariff'.$i})) {
                echo '<div class="row">
                        <div class="col-sm-12">
                            <label>Vehicle #'.$i.' - '.$obj->{'Vehicle_year'.$i}.'  '.$obj->{'Vehicle_make'.$i}.'  '.$obj->{'Vehicle_model'.$i}.'</label>
                        </div>
                        <div class="col-sm-12" style="margin-bottom:10px;">
                            <div class="col-sm-2" style="text-align: right;">
                                <label>Tariff <span style="color: red">*</span></label>
                            </div>
                            <div class="col-sm-3">$&nbsp;<input name="new_Vehicle_tariff'.$i.'" type="text" value="'.$obj->{'Vehicle_tariff'.$i}.'" size="6" />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-2" style="text-align: right;">
                                <label>Deposit <span style="color: red">*</span></label>
                            </div>
                            <div class="col-sm-3">$&nbsp;<input name="new_Vehicle_deposit'.$i.'" type="text" value="'.$obj->{'Vehicle_deposit'.$i}.'" size="6" />
                            </div>
                        </div>
                     </div>';
            }
        }
    }

    public static function getPayment1History($id) {
        $res = '';
        $payment1 = DotTrackerPayment1::model()->findAll('order_id=:orderID', array(':orderID'=>$id));
        if(empty($payment1)) {
            $res .= 'No payment history for this order.';
        } else {
            $res .= '<table width="100%" cellspacing="1" cellpadding="2" class="table table-bordered">
                        <tr style="background-color:gray; color:white;">
                            <th width="70">#</th>
                            <th width="70">Date</th>
                            <th width="150">From => To</th>
                            <th width="45">Amount</th>
                            <th width="90">Method</th>
                            <th width="120">Entered By</th>
                            <th width="50">Actions</th>
                        </tr>';
            for($i=0; $i<count($payment1); $i++) {
                $res .= '<tr>
                            <td>'.$payment1[$i]->order_id.'</td>
                            <td>'.$payment1[$i]->date_received.'</td>
                            <td>'.$payment1[$i]->payment_from_to.'</td>
                            <td>$'.$payment1[$i]->amount.'</td>
                            <td>'.$payment1[$i]->method.'</td>
                            <td>System</td>
                            <td>
                                <a href="">Edit</a> | 
                                <a href="" onClick="return confirm("Are you sure that you want to delete this payment?")">Delete</a>
                            </td>
                        </tr>';
            }
            $res .= '</table>';
        }

        return $res;
    }
}