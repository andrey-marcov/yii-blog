<?php

use yii\db\Migration;

class m260210_141954_add_auth_key_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tbl_user', 'auth_key', $this->string(32)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tbl_user', 'auth_key');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260210_141954_add_auth_key_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
