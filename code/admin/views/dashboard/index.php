<div>
    <a href="/admin/store/website/index">All Stores</a>
</div>
<div>
    <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'op']); ?>
        <select name="groups[seo][fields][use_rewrites][value]">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <input name="groups[unsecure][fields][base_url][value]" value="http://sales.net.ua/" type="text">
    <?php \yii\widgets\ActiveForm::end(); ?>
    <button id="form-in">Save</button>
</div>
<?php
$js =<<<JS
$('#form-in').on('click', function() {
  $.post('', $('form#op').serialize());
});
JS;
$this->registerJs($js, \app\system\AppView::POS_READY);