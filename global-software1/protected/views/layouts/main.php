<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GLOBAL AUTO TRANSPORTAION</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <!-- <link href="<?php //echo Yii::app()->request->baseUrl; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/drawingboard.js/css/drawingboard.css">
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/html2canvas.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
    <?php
    $arrayNoJquery=array('quoteForm','orderForm','dotTrackerUser');
    $arrayNoTinyMce=array('orderForm','quoteForm','account');



    if(!(in_array(Yii::app()->controller->id,$arrayNoJquery) && Yii::app()->controller->action->id=='admin') ) { ?> <script src="http://code.jquery.com/jquery-1.12.4.js"></script> <?php } ?>

    <?php if(!(in_array(Yii::app()->controller->id,$arrayNoTinyMce))) { ?>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/clipboard/dist/clipboard.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            relative_urls: false,
            theme: "modern",
            height:"300",
            plugins: [
                "advlist autolink lists link image charmap preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar2: "print preview media | forecolor backcolor emoticons",
            image_advtab: true,
            templates: [
                {title: 'Test template 1', content: 'Test 1'},
                {title: 'Test template 2', content: 'Test 2'}
            ]
        });
    </script>

    <?php } ?>


    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>

<body>

<?php

$userRole=FilingGenerics::getuserRole(Yii::app()->user->id);
//echo $userRole;
$userId=FilingGenerics::getuserId(Yii::app()->user->id);
?>

<!-- Navigation -->
<nav class="navbar" role="navigation">
    <div class="container navbar-inverse navbar-bg">
        <!-- Brand and toggle get grouped for better mobile display -->
        <?php if(1) { ?>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- URL for a real server -->
            <!-- <a class="navbar-brand" style="color:#fff;" href="http://globaltransportationsoftware.com/"><img src="http://www.globalautotransportation.com/wp-content/themes/global%20auto%20transportation/images/logo2.png" class="img img-responsive" style="margin-top: -61px;"></a> -->

            <a class="navbar-brand" style="color:#fff;" href="<?php echo Yii::app()->createUrl('site/index');?>"><img src="http://www.globalautotransportation.com/wp-content/themes/global%20auto%20transportation/images/logo2.png" class="img img-responsive" style="margin-top: -61px;"></a>
        </div>
        <?php } ?>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php  if(!Yii::app()->user->isGuest){ ?>
                    <li><a href="<?php echo Yii::app()->createUrl('quoteForm/admin');?>">Quote</a></li>
                <?php } ?>
                <!-- <?php  //if(!Yii::app()->user->isGuest){ ?>
                    <li><a href="<?php //echo Yii::app()->createUrl('quoteForm/followup');?>">Follow-ups Today</a></li>
                <?php //} ?> -->
                <?php  if(!Yii::app()->user->isGuest){ ?>
                    <li><a href="<?php echo Yii::app()->createUrl('orderForm/admin');?>">Orders</a></li>
                <?php } ?>
                <?php  if(!Yii::app()->user->isGuest && $userRole==LoginForm::$allowedRole){ ?>
                    <li><a href="<?php echo Yii::app()->createUrl('dispatch/admin');?>">Dispatch</a></li>
                <?php } ?>
                
                <!-- <?php  //if(!Yii::app()->user->isGuest){ ?>
                    <li><a href="<?php //echo Yii::app()->createUrl('orderForm/hold');?>">Holds</a></li>
                <?php //} ?>
                <?php  //if(!Yii::app()->user->isGuest){ ?>
                    <li><a href="<?php //echo Yii::app()->createUrl('orderForm/cancel');?>">Cancels</a></li>
                <?php //} ?> -->

                <?php  if(!Yii::app()->user->isGuest && $userRole==LoginForm::$allowedRole){ ?>
                    <li <?php if(Yii::app()->controller->id=='automatedTemplate'){echo 'class="navbar-active"';}?> ><a href="<?php echo Yii::app()->createUrl('');?>" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-cogs"></i> Preferences <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="?r=settings/index"><i class="fa fa-cogs"></i> Default Settings</a>
                            </li>
                            <li>
                                <a href="?r=accountinfo/index"><i class="fa fa-user"></i> Account Info</a>
                            </li>
                            <li>
                                <a href="?r=automatedTemplate/admin"><i class="fa fa-envelope"></i> Automated Templates</a>
                            </li>
                            <li>
                                <a href="?r=account/admin&type=1"><i class="fa fa-truck"></i> Carriers</a>
                            </li>
                            <li>
                                <a href="?r=account/admin&type=2"><i class="fa fa-user"></i> Shippers</a>
                            </li>
                            <li>
                                <a href="?r=account/admin&type=3"><i class="fa fa-map-marker"></i> Terminals</a>
                            </li>
                            <li <?php if(Yii::app()->controller->id=='DotTrackerUser' || Yii::app()->controller->id=='dotTrackerUser'){echo 'class="navbar-active"';}?> ><a href="<?php
                                //echo 'USERROLE'.$userRole;
                                // if(!$userRole==LoginForm::$allowedRole) {
                                if($userRole !=  LoginForm::$allowedRole) {
                                    echo Yii::app()->createUrl('/DotTrackerUser/view',array('id'=>$userId));
                                }
                                else{
                                    echo Yii::app()->createUrl('/DotTrackerUser/admin');
                                }
                                ?>" > <i class="fa fa-users"></i> Manage User</a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <?php  if(!Yii::app()->user->isGuest){ ?>
                    <li><a href="<?php echo Yii::app()->createUrl('/site/logout');?>" style="color: #fdb6b6 !important;"><i class="fa fa-sign-out"></i> Logout (<?php echo Yii::app()->user->name; ?>)</a></li>
                <?php } ?>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <?php if(isset($this->breadcrumbs) && !Yii::app()->user->isGuest):?>
                <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
                )); ?><!-- breadcrumbs -->
            <?php endif?>
        </div>
    </div>
    <!-- /.row -->

    <!-- Marketing Icons Section -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12" style="width:100%;">
            
            <?php echo $content; ?>

        </div>

        <!-- Right Sidebar
        <div class="col-md-3">
            <div class="list-group">
                <?php //echo $content1; ?>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p style="text-align: center;">Copyright &copy; GLOBAL AUTO TRANSPORTATION <?php echo date('Y'); ?></p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>

</body>

</html>