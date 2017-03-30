<div class="content-body">
	<div class="form" id="basic-zone">
	
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'admin-genre-model-form',
		'enableAjaxValidation'=>false,
	)); ?>
	
		<p class="note">Fields with <span class="required">*</span> are required.</p>
		<?php echo $form->errorSummary($model); ?>
		<?php if(!$model->isNewRecord):?>
		<div class="row">
		<label>Icon cho app Radio</label>
		<div id="files-x">
			<img src="<?php echo Common::getLinkIconsRadio($model->id, 'genre');?>" />
		</div>
		<?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
					array(
					        'id'=>'uploadFile',
					        'config'=>array(
					               'action'=>Yii::app()->createUrl('/radio/default/uploadAvartar', array('id'=>$model->id, 'type'=>'genre')),
					               'allowedExtensions'=>array("png"),//array("jpg","jpeg","gif","exe","mov" and etc...
					               'sizeLimit'=>100*1024*1024,// maximum file size in bytes
					               'minSizeLimit'=>1,// minimum file size in bytes
					               'onComplete'=>"js:function(id, fileName, responseJSON){
					        			if(responseJSON.success){
						 					$('#files-x').html('<img src=\''+responseJSON.data+'\'/>');
					        				location.reload();
					        			}else{
											alert(responseJSON.data);
										}
									}",
					              )
					));
		?>
		</div>
		<?php endif;?>
		<div class="row">
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>150)); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model,'type'); ?>
			<?php 
				echo $form->dropDownList($model, 'type', Yii::app()->params['genreType'], array('prompt'=>'--None--',
												'ajax' => array('type'=>'POST',
														'url'=>$this->createUrl('/genre/getGenreByType'), // here for a specific item, there should be different URL
														'update'=>'#genre_update', // here for a specific item, there should be different update
														'data'=>array('type'=>'js:this.value', 'id'=>$model->parent_id),
												)
										));
			?>
			<?php echo $form->error($model,'type'); ?>
		</div>
	
			<div class="row">
			<?php echo $form->labelEx($model,'parent_id'); ?>
			<div id="genre_update">
	        <?php
				$category = CMap::mergeArray(
									array('0'=> "  "),
									   CHtml::listData($categoryList, 'id', 'name')
									);
                echo CHtml::dropDownList("AdminGenreModel[parent_id]", $model->parent_id, $category ) 
             ?>
			<?php echo $form->error($model,'parent_id'); ?>
			</div>
		</div>
                <div class="row">
			<?php echo $form->labelEx($model,'is_collection'); ?>
                        <?php $is_collection = array(
                                        '0'=> 'No',
                                        '1' => 'Yes'
                                    );
                        echo CHtml::dropDownList("AdminGenreModel[is_collection]",  $model->is_collection, $is_collection ) ?>
			<?php //echo $form->textField($model,'status'); ?>
			<?php echo $form->error($model,'is_collection'); ?>
		</div>
	
			<div class="row">
			<?php echo $form->labelEx($model,'description'); ?>
			<?php echo $form->textArea($model,'description',array('cols'=>40,'rows'=>'6', 'size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'description'); ?>
		</div>
                
		<div class="row">
			<?php echo $form->labelEx($model,'status'); ?>
			<?php echo $form->textField($model,'status'); ?>
			<?php echo $form->error($model,'status'); ?>
		</div>
		<?php /*
		<div class="row">
			<?php echo $form->labelEx($model,'cmc_id'); ?>
			<?php echo $form->textField($model,'cmc_id'); ?>
			<?php echo $form->error($model,'cmc_id'); ?>
		</div>
		*/?>
		<div class="row">
			<?php echo $form->labelEx($model,'Thể loai trên kho'); ?>
			<?php echo CHtml::textArea("cmc_ids",$this->genreCmcIds,array('cols'=>40,'rows'=>'6', 'size'=>60,'maxlength'=>200))?>
			<br/><span style="clear: both; display: block; margin-left: 120px"><i><?php echo Yii::t('admin','Nhập các id cách nhau bởi dấu (,)'); ?></i></span>
		</div>
		
	
		<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		</div>
	
	<?php $this->endWidget(); ?>
	
	</div><!-- form -->
        <div class="form" id="inlist-zone" style="display: none;">
	</div>
</div>