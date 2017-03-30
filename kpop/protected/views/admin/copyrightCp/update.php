<?php
$this->breadcrumbs=array(
	'Admin Copyright Cp Models'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('admin', 'Danh sách'), 'url'=>array('index'), 'visible'=>UserAccess::checkAccess('AdminCopyrightCpModelIndex')),
	array('label'=>Yii::t('admin', 'Thêm mới'), 'url'=>array('create'), 'visible'=>UserAccess::checkAccess('AdminCopyrightCpModelCreate')),
	array('label'=>Yii::t('admin', 'Thông tin'), 'url'=>array('view', 'id'=>$model->id), 'visible'=>UserAccess::checkAccess('AdminCopyrightCpModelView')),
	array('label'=>Yii::t('admin', 'Sao chép'), 'url'=>array('copy','id'=>$model->id), 'visible'=>UserAccess::checkAccess('AdminCopyrightCpModelCopy')),
);
$this->pageLabel = Yii::t('admin', "Cập nhật CopyrightCp")."#".$model->id;

?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>