<?php
$this->breadcrumbs=array(
	'Admin Phone Book Models'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('admin', 'Danh sách'), 'url'=>array('index'), 'visible'=>UserAccess::checkAccess('PhoneBookIndex')),
	array('label'=>Yii::t('admin', 'Thêm mới'), 'url'=>array('create'), 'visible'=>UserAccess::checkAccess('PhoneBookCreate')),
	array('label'=>Yii::t('admin', 'Thông tin'), 'url'=>array('view', 'id'=>$model->id), 'visible'=>UserAccess::checkAccess('PhoneBookView')),
);
$this->pageLabel = Yii::t('admin', "Sao chép thuê bao Miền Tây")."#".$model->id;
?>



<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>