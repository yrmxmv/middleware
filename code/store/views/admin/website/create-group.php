<div>
    <a href="/admin/store/website/index"><- Back</a>
    <a href="/admin/store/website/create-group">Reset</a>
    <button form="create-group" type="submit">Save Store</button>
</div>
<?php
$website = \app\code\store\models\Website::find()->asArray()->all();
$form = \yii\widgets\ActiveForm::begin(['id' => 'create-group']);
echo $form->field($model, 'website_id')->dropDownList(\yii\helpers\ArrayHelper::map($website, 'website_id', 'name'));
echo $form->field($model, 'name');
echo $form->field($model, 'code');
echo $form->field($model, 'root_category_id')->dropDownList([1 => 'Root']);
\yii\widgets\ActiveForm::end();