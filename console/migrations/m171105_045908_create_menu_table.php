<?php

use yii\db\Migration;

/**
 * Handles the creation of table `menu`.
 */
class m171105_045908_create_menu_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('goods_category', [
            'id' => $this->primaryKey(),
            'tree' => $this->integer()->notNull(),
            'lft' => $this->integer()->notNull(),
            'rgt' => $this->integer()->notNull(),
            'level' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'intro' => $this->text(),
            'parent_id'=>$this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('goods_category');
    }
}
