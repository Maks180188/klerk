<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tel_numbers}}`.
 */
class m230113_085803_create_tel_numbers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    //задал полю number тип string потому что может быть сетка на фронте, может нет.
    //допускаем, что номер вводится в произвольной форме. Допускаем с кодом в начале или без него. Может быть с круглыми скобками или без них

    public function safeUp()
    {
        $this->createTable('{{%tel_numbers}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'number' => $this->string()
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-tel_numbers-user_id',
            'tel_numbers',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-tel_numbers-user_id',
            'tel_numbers',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-post-user_id',
            'tel_numbers'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-tel_numbers-user_id',
            'tel_numbers'
        );

        $this->dropTable('{{%tel_numbers}}');
    }
}
