<?php

namespace backend\modules\SpeedRunner\forms\module;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;


class DestroyerForm extends Model
{
    public $modules;
    
    public function rules()
    {
        return [
            [['modules'], 'required'],
            [['modules'], 'in', 'range' => array_keys($this->modulesList), 'allowArray' => true],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'modules' => Yii::t('speedrunner', 'Modules'),
        ];
    }
    
    static function getModulesList()
    {
        foreach (Yii::$app->modules as $key => $m) {
            if (!in_array($key, ['rbac', 'debug', 'gii', 'speedrunner', 'system', 'user', 'seo'])) {
                $result[ucfirst($key)] = ucfirst($key);
            }
        }
        
        return $result;
    }
    
    public function destroy()
    {
        foreach ($this->modules as $m) {
            $module = ucfirst($m);
            
            //        FILES
            
            if ($dir = Yii::getAlias("@backend/modules/$module")) {
                FileHelper::removeDirectory($dir);
            }
            
            //        DB
            
            $tables = Yii::$app->db->schema->getTableNames();
            $sql = null;
            
            foreach ($tables as $t) {
                if (strpos($t, ucfirst($m)) === 0) {
                    $sql .= "DROP TABLE $t;";
                }
            }
            
            Yii::$app->db->createCommand($sql)->execute();
        }
        
        return true;
    }
}