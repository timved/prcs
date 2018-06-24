<?php

use yii\db\Migration;

/**
 * Class m180624_121752_create_alter_column_inn_table_company
 */
class m180624_121752_create_alter_column_inn_table_company extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('company','inn','bigint');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180624_121752_create_alter_column_inn_table_company cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180624_121752_create_alter_column_inn_table_company cannot be reverted.\n";

        return false;
    }
    */
}
