<?php

namespace backend\models;

use backend\components\GoodsQuery;
use creocoder\nestedsets\NestedSetsBehavior;
use Yii;

/**
 * This is the model class for table "goods_category".
 *
 * @property integer $id
 * @property integer $tree
 * @property integer $lft
 * @property integer $rgt
 * @property integer $level
 * @property string $name
 * @property string $intro
 * @property integer $parent_id
 */
class GoodsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_category';
    }

    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['name'    ], 'required'],
            [['tree', 'lft', 'rgt', 'level', 'parent_id','depth'], 'integer'],
            [['intro'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tree' => 'Tree',
            'lft' => '左值',
            'rgt' => '右值',
            'level' => '分级',
            'name' => '名称',
            'intro' => '内容',
            'parent_id' => '父ID',
            'depth'=>'深度',
        ];
    }


    public function behaviors() {
        return [
            'tree' => [

                'class' => NestedSetsBehavior::className(),
                 'treeAttribute' => 'tree',
                 'leftAttribute' => 'lft',
                 'rightAttribute' => 'rgt',
                 'depthAttribute' => 'depth',
            ],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public static function find()
    {
        return new GoodsQuery(get_called_class());

    }




}
