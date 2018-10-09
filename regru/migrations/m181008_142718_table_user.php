<?php

use yii\db\Migration;

/**
 * Class m181008_142718_table_user
 */
class m181008_142718_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'person_name' => $this->string(100)->notNull(),
            'company_name' => $this->string(100),
            'email' => $this->string(50)->notNull(),
            'auth_key' => $this->string(32),
            'ITN' => $this->string(12)->notNull(),
            'type' => $this->integer(1)->defaultValue(1)->comment('1 - personal account, 2 - company account'),
            'password_hash' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181008_142718_table_user cannot be reverted.\n";

        return false;
    }
    */
}
