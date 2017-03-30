<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'jobDialog',
    'options'=>array(
        'title'=>Yii::t('admin','Lý do xóa - từ chối bài hát'),
        'autoOpen'=>true,
        'modal'=>'true',
        'width'=>'400px',
        'height'=>'auto',
    ),
));

?>
    <div id="content">
        <div class="form" id="jobDialogForm">

            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'job-form',
                'enableAjaxValidation'=>true,
            ));
            ?>
            <div class="row">
                <?php
                $status = array(
                    0=>'Xóa vẫn show info',
                    3=>'Xóa vĩnh viễn'
                );
                echo CHtml::dropDownList('status','',$status, array('style'=>'width: 200px;'));
                ?>
            </div>
            <div class="row">
                <?php
                $reason = Yii::app()->params['reason_delete'];
                echo CHtml::dropDownList('reason','',$reason, array('style'=>'width: 200px;'));
                ?>
            </div>

            <div class="row buttons pl50">
                <?php echo CHtml::hiddenField("popup", "1") ?>
                <?php echo CHtml::hiddenField("conten_id", $massList)?>
                <?php echo CHtml::hiddenField("is_all",$isAll )?>
                <?php echo CHtml::hiddenField("type",$type )?>
                <?php
                if($reqsource == 'list'){
                    echo CHtml::ajaxSubmitButton(Yii::t('admin','Xóa'),CHtml::normalizeUrl(array('song/confirmDel','render'=>false)),array('success'=>'js: function(data) {
                        //$.fn.yiiGridView.update("admin-song-model-grid");
                        //window.parent.location.reload();
                        window.location.reload()
                        $("#jobDialog").dialog("close");
                    }'),array('id'=>'closeJobDialog','style'=>'width: auto'));
                    echo CHtml::button(Yii::t('admin','Bỏ qua'),array("onclick"=>'
		        																$("#cid_all").attr("checked",false);
																			    $("#all-item").attr("checked",false);
																			    $("input[name=\'cid\[\]\']").each(function(){
																			        this.checked = false;
																			    });
																			    $("#total-selected").html("0");
		        																$("#jobDialog").dialog("close");
		        														','style'=>'width: auto'));
                }else{
                    echo CHtml::ajaxSubmitButton(Yii::t('admin','Xóa'),CHtml::normalizeUrl(array('song/confirmDel','render'=>false)),array('success'=>'js: function(data) {
                        $("#jobDialog").dialog("close");
                        window.location.reload()
                    }'),array('id'=>'closeJobDialog','style'=>'width: auto'));
                    echo CHtml::button(Yii::t('admin','Bỏ qua'),array("onclick"=>'
		        																$("#jobDialog").dialog("close");
		        														','style'=>'width: auto'));

                }
                ?>
            </div>

            <?php $this->endWidget(); ?>

        </div>
    </div>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>