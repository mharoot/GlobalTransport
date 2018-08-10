<?php
    /**
     * User: Yan
     * Date: 08/06/18
     * Time: 15:30 PM
     */

    header("Access-Control-Allow-Origin: *");
    error_reporting(E_ALL); ini_set('display_errors', 1);
    
    require_once '/home/yxw165730/public_html/payments/vendor/autoload.php';
    use net\authorize\api\contract\v1 as AnetAPI;
    use net\authorize\api\controller as AnetController;

    define("AUTHORIZENET_LOG_FILE", "phplog");

    function getAnAcceptPaymentPage() {
        /*Create a merchantAuthenticationType object with authentication details
           retrieved from the constants file*/
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName("3yYdm7G3mtFY");
        $merchantAuthentication->setTransactionKey("8uJWa8q4b4t2CV7s");
        
        // Set the transaction's refId
        $refId = 'ref' . time();

        //create a transaction
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount("1.00");

        // Set Hosted Form options
        $setting1 = new AnetAPI\SettingType();
        $setting1->setSettingName("hostedPaymentButtonOptions");
        $setting1->setSettingValue("{\"text\": \"Pay\"}");

        $setting2 = new AnetAPI\SettingType();
        $setting2->setSettingName("hostedPaymentOrderOptions");
        $setting2->setSettingValue("{\"show\": false}");

        $setting3 = new AnetAPI\SettingType();
        $setting3->setSettingName("hostedPaymentReturnOptions");
        $setting3->setSettingValue(
            "{\"url\": \"https://mysite.com/receipt\", \"cancelUrl\": \"https://mysite.com/cancel\", \"showReceipt\": true}"
        );

        // Build transaction request
        $request = new AnetAPI\GetHostedPaymentPageRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest($transactionRequestType);

        $request->addToHostedPaymentSettings($setting1);
        $request->addToHostedPaymentSettings($setting2);
        $request->addToHostedPaymentSettings($setting3);
        
        //execute request
        $controller = new AnetController\GetHostedPaymentPageController($request);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        
        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            echo $response->getToken()."\n";
        } else {
            echo "ERROR :  Failed to get hosted payment page token\n";
            $errorMessages = $response->getMessages()->getMessage();
            echo "RESPONSE : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
        }
        return $response;
    }

    if (!defined('DONT_RUN_SAMPLES')) {
        /*$servername = "localhost";
        $username = "yxw16573_root";
        $password = "Yan2018@";
        $dbname = "yxw16573_global_tracker";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM global_tracker_quote where id=".$_GET['id'];
        $result = $conn->query($sql);

        $auth_amount = 0;

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $auth_amount = $row['extra6'];
            }
        }

        $conn->close();*/

        getAnAcceptPaymentPage();
    }
?>
