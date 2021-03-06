<?php


/**
 * This class defines the structure of the 'tbnivelinstrucao' table.
 *
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Mon Mar 16 17:38:45 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class TbnivelinstrucaoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TbnivelinstrucaoTableMap';

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
		$this->setName('tbnivelinstrucao');
		$this->setPhpName('Tbnivelinstrucao');
		$this->setClassname('Tbnivelinstrucao');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('tbnivelinstrucao_id_nivel_instrucao_seq');
		// columns
		$this->addPrimaryKey('ID_NIVEL_INSTRUCAO', 'IdNivelInstrucao', 'INTEGER', true, null, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', true, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('TbalunobackupRelatedByPaiIdNivelInstrucao', 'Tbalunobackup', RelationMap::ONE_TO_MANY, array('id_nivel_instrucao' => 'pai_id_nivel_instrucao', ), null, null);
    $this->addRelation('TbalunobackupRelatedByMaeIdNivelInstrucao', 'Tbalunobackup', RelationMap::ONE_TO_MANY, array('id_nivel_instrucao' => 'mae_id_nivel_instrucao', ), null, null);
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
		);
	} // getBehaviors()

} // TbnivelinstrucaoTableMap
