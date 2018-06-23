<?php

use yii\db\Migration;

/**
 * Handles the creation of table `companies`.
 */
class m180622_202007_create_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('company', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->notNull(),
            'inn' => $this->integer()->notNull(),
            'director' => $this->string(200)->notNull(),
            'address' => $this->string(255)->notNull(),
            'status' => $this->string(50)->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('company');
    }
}
