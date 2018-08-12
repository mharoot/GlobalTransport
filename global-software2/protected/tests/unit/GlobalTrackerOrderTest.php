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
        $this->assertTrue(true);
    }

    public function testTableName()
    {
        
        $OrderModel = new GlobalTrackerOrder;
        $name = $OrderModel->tableName();
        printf("\n\nTablename = %s\n", $name);
        $this->assertTrue( isset($name) );
    }
}
