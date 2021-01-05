<div>
    <a href="/admin/store/website/index"><- Back</a>
    <a href="/admin/store/website/delete-website?website_id=<?php echo Yii::$app->request->get('website_id', 0); ?>">Delete Web Site</a>
    <a href="/admin/store/website/edit-website?website_id=<?php echo Yii::$app->request->get('website_id', 0); ?>">Reset</a>
    <button form="create-website" type="submit">Save Web Site</button>
</div>
<?php
$form = \yii\widgets\ActiveForm::begin(['id' => 'create-website']);
echo $form->field($model, 'name');
echo $form->field($model, 'code');
echo $form->field($model, 'sort_order');
echo $form->field($model, 'default_group_id')->dropDownList([]);
\yii\widgets\ActiveForm::end();