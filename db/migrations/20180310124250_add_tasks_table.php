<?php

use Phinx\Migration\AbstractMigration;

class AddTasksTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('tasks');
        $table->addColumn('title', 'string', array('limit' => 100))
            ->addColumn('is_started', 'boolean')
            ->addColumn('sort_index', 'integer')
            ->addColumn('created_utc', 'datetime') // Required by DataMapper
            ->addColumn('updated_utc', 'datetime', array('null' => true))  // Required by DataMapper
            ->create();
    }
}
