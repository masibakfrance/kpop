<?php
$this->breadcrumbs=array(
	'Push Notif Setting Models'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('admin', 'Danh sách'), 'url'=>array('index'), 'visible'=>UserAccess::checkAccess('PushNotifSettingIndex')),
	array('label'=>Yii::t('admin', 'Thêm mới'), 'url'=>array('create')),
	array('label'=>Yii::t('admin', 'Cập nhật'), 'url'=>array('update', 'id'=>$model->id), 'visible'=>UserAccess::checkAccess('PushNotifSettingUpdate')),
	array('label'=>Yii::t('admin', 'Xóa'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'), 'visible'=>UserAccess::checkAccess('PushNotifSettingDelete')),
//	array('label'=>Yii::t('admin', 'Sao chép'), 'url'=>array('copy','id'=>$model->id), 'visible'=>UserAccess::checkAccess('PushNotifSettingCopy')),
);
$this->pageLabel = Yii::t('admin', "Thông tin PushNotifSetting")."#".$model->id;
?>


<div class="content-body">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'device_os',
		'message',
		'type',
		'data',
		'status',
	),
)); ?>
</div>
