<?php
/* @var $this QuoteFormController */
/* @var $model GlobalTrackerQuote */
/* @var $form CActiveForm */
?>
<div id="initial">
    <table cellspacing="0" cellpadding="0" width="740" align="center" style="line-height: 20px; font-size: 14px; color: #333;">
        <tr>
            <td style="padding: 20px;">
                <p>To complete your request to unsubscribe <?php echo $model->email; ?> from our follow-up list, click the "Remove Now" button below.</p>
                <a id="deleteBtn" onclick="moveToArchive();" class="btn btn-info"></i>Remove now</a>
                <a id="notRemoveBtn" onclick="notRemove();" class="btn btn-success" style="margin-left:50px;"></i>Do not Remove</a>
            </td>
        </tr>
    </table>
</div>

<div id="afterRemove" style="display: none;">
    <table cellspacing="0" cellpadding="0" width="740" align="center" style="line-height: 20px; font-size: 14px; color: #333;">
        <tr>
            <td style="padding: 20px;">
                <p>You have successfully unsubscribe from Global Auto Transportation.</p>
            </td>
        </tr>
    </table>
</div>

<div id="notRemove" style="display: none;">
    <table cellspacing="0" cellpadding="0" width="740" align="center" style="line-height: 20px; font-size: 14px; color: #333;">
        <tr>
            <td style="padding: 20px;">
                <p>Your email address has not been removed from our list. If you have any questions or would like to discuss your vehicle move with us, please call us at 818-956-5666.</p>
            </td>
        </tr>
    </table>
</div>

<script>
function moveToArchive() {
    var idVal='<?php echo FilingGenerics::encryptKey($model->id); ?>';
    var url = '<?php echo Yii::app()->createUrl('quoteForm/changeStatus', array('id' => '__id__', 'status' => FilingGenerics::encryptKey(GlobalTrackerQuote::$enumStatus['archived'])));?>';
    url = url.replace('__id__', idVal);
    $.ajax({
        type: "POST",
        url: url,
        data: {
            'passKey': '2424324242dsfsdfs',
        },
        success: function (data) {
            $("#initial").css("display", "none");
            $("#afterRemove").css("display", "block");
        }
    });
}
/*function remove() {
    $('#deleteBtn').html('Processing');
    $('#processingReq').show();
    
    var url = '<?php //echo Yii::app()->createUrl('quoteForm/delete&id='.$model->id);?>';
    $.ajax({
        type: "POST",
        url: url,
        data: {
            'passKey': '2424324242dsfsdfs',
        },
        success: function (data) {
            $("#initial").css("display", "none");
            $("#afterRemove").css("display", "block");
        }
    });
}*/

function notRemove() {
    $("#initial").css("display", "none");
    $("#notRemove").css("display", "block");
}
</script>