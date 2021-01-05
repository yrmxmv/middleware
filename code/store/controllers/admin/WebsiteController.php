<?php
namespace app\code\store\controllers\admin;

use app\code\store\models\Group;
use app\code\store\models\Store;
use app\code\store\models\Website;
use yii\web\Controller;

class WebsiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreateStore()
    {
        $model = new Store();
        if ($model->load(\Yii::$app->request->post()) && $model->validate() && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create-store', [
            'model' => $model
        ]);
    }

    public function actionEditStore()
    {
        $model = Store::findOne(\Yii::$app->request->get('store_id', 0));
        if ($model->load(\Yii::$app->request->post()) && $model->validate() && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('edit-store', [
            'model' => $model
        ]);
    }

    public function actionCreateGroup()
    {
        $model = new Group();
        if ($model->load(\Yii::$app->request->post()) && $model->validate() && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create-group', [
            'model' => $model
        ]);
    }

    public function actionEditGroup()
    {
        $model = Group::findOne(\Yii::$app->request->get('group_id', 0));
        if ($model->load(\Yii::$app->request->post()) && $model->validate() && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('edit-group', [
            'model' => $model
        ]);
    }

    public function actionCreateWebsite()
    {
        $model = new Website();
        if ($model->load(\Yii::$app->request->post()) && $model->validate() && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create-website', [
            'model' => $model
        ]);
    }

    public function actionEditWebsite()
    {
        $model = Website::findOne(\Yii::$app->request->get('website_id', 0));
        if ($model->load(\Yii::$app->request->post()) && $model->validate() && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('edit-website', [
            'model' => $model
        ]);
    }
}