<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_profile}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m200426_132445_create_user_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_profile}}', [
            'user_id' => $this->integer(11),
            'first_name' => $this->string(55),
            'last_name' => $this->string(55),
            'avatar_path' => $this->string(2000),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ]);
        $this->addPrimaryKey('PK_user_profile_user_id', '{{%user_profile}}', 'user_id');

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_profile-user_id}}',
            '{{%user_profile}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_profile-user_id}}',
            '{{%user_profile}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_profile-user_id}}',
            '{{%user_profile}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_profile-user_id}}',
            '{{%user_profile}}'
        );

        $this->dropTable('{{%user_profile}}');
    }
}
