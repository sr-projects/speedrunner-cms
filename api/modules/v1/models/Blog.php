<?php

namespace api\modules\v1\models;

use Yii;
use yii\helpers\ArrayHelper;


trait Blog
{
    public function fields()
    {
        return [
            'id',
            'name',
            'short_description',
            'full_description',
            'image' => function ($model) {
                return Yii::$app->urlManagerFrontend->createAbsoluteFileUrl($model->image);
            },
            'created',
        ];
    }
}
