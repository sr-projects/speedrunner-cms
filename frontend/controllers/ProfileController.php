<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use speedrunner\actions as Actions;
use yii\filters\AccessControl;

use frontend\forms\ProfileForm;


class ProfileController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    
    public function actions()
    {
        return [
            'update' => [
                'class' => Actions\web\FormAction::className(),
                'model_class' => ProfileForm::className(),
                'render_view' => 'update',
                'run_method' => 'update',
                'success_message' => 'profile_update_success_alert',
                'redirect_route' => ['update'],
            ],
        ];
    }
}
