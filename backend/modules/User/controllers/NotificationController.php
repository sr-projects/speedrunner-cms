<?php

namespace backend\modules\User\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\ArrayHelper;

use backend\modules\User\models\UserNotification;


class NotificationController extends Controller
{
    public function actionView($id)
    {
        $model = UserNotification::findOne($id);
        
        if (!$model || $model->user_id != Yii::$app->user->id || !$model->delete()) {
            return $this->redirect(Yii::$app->request->referrer);
        }
        
        return $this->redirect(ArrayHelper::getValue($model->service->actionData(), 'url', Yii::$app->request->referrer));
    }
    
    public function actionClear()
    {
        UserNotification::deleteAll(['user_id' => Yii::$app->user->id]);
        Yii::$app->session->addFlash('success', Yii::t('app', 'All notifications removed'));
        
        return $this->redirect(Yii::$app->request->referrer);
    }
}
