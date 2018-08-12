<?php
use PHPUnit\Framework\TestCase;

class GlobalTrackerOrderTest extends TestCase
{
    public function testLoadGlobalTrackerOrder()
    {
        $yiit=dirname(__FILE__).'/../../../../yii/framework/yii.php';
        $config=dirname(__FILE__).'/../../config/main.php';

        require_once($yiit);

        Yii::createWebApplication($config);
        Yii::app()->getModule('GlobalTrackerOrder');
        Yii::app()->getModule('UserIdentity');
        

        $this->assertTrue(true);
    }

    /**
     * Used by:
     * @method testSearch()
     */
    public function testLogin()
    {
        $identity = new UserIdentity("tonygreg", "password");
        
        $this->assertTrue( $identity->authenticate() );
        $duration_days = 0;
        $this->assertTrue( Yii::app()->user->login($identity, $duration_days) );
    }

    /**
     * uses @method testLogin()
     */
    public function testSearch()
    {
        $status = "1";
        $perPage = 50;

        $order58 = GlobalTrackerOrder::model()->findByPk(58);
        $this->assertEquals($order58->getAttributes()['status'], $status);
        
        
        $res = $order58->search($status, $perPage);
        var_dump($res->model->address1);
        $this->assertEquals("2009 Burbank Blvd", $res->model->address1);
    }

    public function testTableName()
    {
        
        $OrderModel = new GlobalTrackerOrder;
        $name = $OrderModel->tableName();
        //printf("\n\nTablename = %s\n", $name);
        $this->assertEquals("global_tracker_order", $name);
    }
    
}
