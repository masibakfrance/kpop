<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                'id'=>'jobDialog',
                'options'=>array(
                    'title'=>Yii::t('admin','Lý do xóa nhạc chuông'),
                    'autoOpen'=>true,
                    'modal'=>'true',
                    'width'=>'400px',
                    'height'=>'auto',
                ),
                ));

?>

<div class="form" id="jobDialogForm">
 
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'job-form',
    'enableAjaxValidation'=>true,
)); 
?>
 
        <div class="row" style="text-align: center;">
        	<?php echo CHtml::textArea("reason","",array('class'=>'w300 h150'))?>
        </div>
        
 
    <div class="row buttons pl50">
        <?php echo CHtml::hiddenField("popup", "1") ?>
        <?php echo CHtml::hiddenField("conten_id", $massList)?>
        <?php echo CHtml::hiddenField("is_all",$isAll )?>
        <?php echo CHtml::hiddenField("type",$type )?>
        <?php echo CHtml::ajaxSubmitButton(Yii::t('admin','Xóa'),CHtml::normalizeUrl(array('ringtone/confirmDel','render'=>false)),array('success'=>'js: function(data) {
                        //$.fn.yiiGridView.update("admin-ringtone-model-grid");
                        window.location.reload();
                        $("#jobDialog").dialog("close");
                    }'),array('id'=>'closeJobDialog')); ?>
        <?php echo CHtml::button(Yii::t('admin','Bỏ qua'),array("onclick"=>'
        																$("#cid_all").attr("checked",false);
																	    $("#all-item").attr("checked",false);
																	    $("input[name=\'cid\[\]\']").each(function(){
																	        this.checked = false;
																	    });
																	    $("#total-selected").html("0");
        																$("#jobDialog").dialog("close");
        														')) ?>
    </div>
 
<?php $this->endWidget(); ?>
 
</div>


<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>