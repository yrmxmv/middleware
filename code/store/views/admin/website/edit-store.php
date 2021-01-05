<div>
    <a href="/admin/store/website/index"><- Back</a>
    <a href="/admin/store/website/delete-store?store_id=<?php echo Yii::$app->request->get('store_id', 0); ?>">Delete Store View</a>
    <a href="/admin/store/website/edit-store?store_id=<?php echo Yii::$app->request->get('store', 0); ?>">Reset</a>
    <button form="create-store" type="submit">Save Store View</button>
</div>
<?php
$group = \app\code\store\models\Group::find()->asArray()->all();
$form = \yii\widgets\ActiveForm::begin(['id' => 'create-store']);
echo $form->field($model, 'group_id')->dropDownList(\yii\helpers\ArrayHelper::map($group, 'group_id', 'name'));
echo $form->field($model, 'name');
echo $form->field($model, 'code');
echo $form->field($model, 'is_active')->dropDownList([0 => 'Disabled', 1 => 'Enabled']);
echo $form->field($model, 'sort_order');
\yii\widgets\ActiveForm::end();