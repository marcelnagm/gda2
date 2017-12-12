<?php


/**
 * This class defines the structure of the 'tbsala' table.
 *
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Mon Mar 16 17:38:55 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class TbsalaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TbsalaTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('tbsala');
		$this->setPhpName('Tbsala');
		$this->setClassname('Tbsala');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('tbsala_id_sala_seq');
		// columns
		$this->addPrimaryKey('ID_SALA', 'IdSala', 'INTEGER', true, null, null);
		$this->addColumn('BLOCO', 'Bloco', 'VARCHAR', false, 5, null);
		$this->addColumn('CAPACIDADE', 'Capacidade', 'INTEGER', false, null, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', false, 20, null);
		$this->addForeignKey('ID_CAMPUS', 'IdCampus', 'INTEGER', 'tbcampus', 'ID_CAMPUS', false, null, null);
		$this->addColumn('NUMERO', 'Numero', 'INTEGER', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'DATE', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'DATE', false, null, null);
		$this->addColumn('CREATED_BY', 'CreatedBy', 'VARCHAR', false, 20, null);
		$this->addColumn('UPDATED_BY', 'UpdatedBy', 'VARCHAR', false, 20, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Tbcampus', 'Tbcampus', RelationMap::MANY_TO_ONE, array('id_campus' => 'id_campus', ), null, null);
    $this->addRelation('Tboferta', 'Tboferta', RelationMap::ONE_TO_MANY, array('id_sala' => 'id_sala', ), null, null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
			'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // TbsalaTableMap