<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lookup}}`.
 */
class m260223_074519_create_lookup_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lookup}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'code' => $this->integer()->notNull(),
            'type' => $this->string(255)->notNull(),
            'position' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lookup}}');
    }
}
