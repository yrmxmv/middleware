<div>
    <a href="/admin/store/website/index">All Stores</a>
</div>
<div>
    <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'op']); ?>
        <select name="test[groups_seo_fields_use_rewrites_value]">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <input name="test[web_unsecure_base_url]" value="" type="text">
    <?php \yii\widgets\ActiveForm::end(); ?>
    <button id="form-in">Save</button>
</div>
<?php
$js =<<<JS
$('#form-in').on('click', function() {
  $.post('/admin/dashboard/save', $('form#op').serialize());
});
JS;
$this->registerJs($js, \app\system\AppView::POS_READY);