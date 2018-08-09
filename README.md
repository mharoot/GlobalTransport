#TODO
1. Remove everything from orders having to do with dispatched [check]
2. Create a dispatch table [check]
3. add dispatch link 
```
YII ROUTING - Creating URLs 
Although URLs can be hardcoded in controller views, it is often more flexible to create them dynamically:

$url=$this->createUrl($route,$params);

added to views/layouts/main.php
<li><a href="<?php echo Yii::app()->createUrl('dispatch/admin');?>">Dispatch</a></li>
```