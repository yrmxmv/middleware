<div>
    <a href="/admin/store/website/index"><- Back</a>
    <a href="/admin/store/website/create-website">Reset</a>
    <button form="create-website" type="submit">Save Web Site</button>
</div>
<?php
$form = \yii\widgets\ActiveForm::begin(['id' => 'create-website']);
echo $form->field($model, 'name');
echo $form->field($model, 'code');
echo $form->field($model, 'sort_order');
\yii\widgets\ActiveForm::end();