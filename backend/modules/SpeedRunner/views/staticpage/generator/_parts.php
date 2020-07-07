<?php

use yii\helpers\Html;

?>

<div class="row">
    <div class="col-md-10">
        <label><?= Yii::t('speedrunner', 'Part name') ?></label>
        <?= Html::input('text', 'part_name', null, ['class' => 'form-control part-name']) ?>
    </div>
    
    <div class="col-md-2">
        <label>&nbsp;</label><br>
        <button type="button"
                class="btn btn-success btn-block btn-icon btn-part-add"
                data-action="<?= Yii::$app->urlManager->createUrl(['speedrunner/staticpage/generator/new-part']) ?>"
        >
            <i class="fa fa-plus"></i>
            <?= Yii::t('speedrunner', 'Add') ?>
        </button>
    </div>
</div>
<br>
