<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contacts`.
 */
class m180622_202605_create_contact_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('contact', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->notNull(),
            'phone' => $this->string(100)->notNull(),
            'email' => $this->string(200)->notNull(),
            'company_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
        $this->addForeignKey('fk_contact_company', 'contact','company_id','company','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('contact');
    }
}
