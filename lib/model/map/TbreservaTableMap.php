<?php


/**
 * This class defines the structure of the 'tbreserva' table.
 *
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Wed Apr 25 11:57:20 2012
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class TbreservaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TbreservaTableMap';

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
		$this->setName('tbreserva');
		$this->setPhpName('Tbreserva');
		$this->setClassname('Tbreserva');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('tbreserva_idreserva_seq');
		// columns
		$this->addPrimaryKey('IDRESERVA', 'IdReserva', 'INTEGER', true, null, null);
		$this->addForeignKey('COD_DISCIPLINA', 'CodDisciplina', 'VARCHAR', 'tbdisciplina', 'COD_DISCIPLINA', true, 15, null);
		$this->addForeignKey('ID_SALA', 'IdSala', 'INTEGER', 'tbsala', 'ID_SALA', true, null, null);
		$this->addColumn('TURMA', 'Turma', 'VARCHAR', true, 15, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Tbdisciplina', 'Tbdisciplina', RelationMap::MANY_TO_ONE, array('cod_disciplina' => 'cod_disciplina', ), null, null);
    $this->addRelation('Tbsala', 'Tbsala', RelationMap::MANY_TO_ONE, array('id_sala' => 'id_sala', ), null, null);
    $this->addRelation('Tbreservahorario', 'Tbreservahorario', RelationMap::ONE_TO_MANY, array('idreserva' => 'idreserva', ), null, null);
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

} // TbreservaTableMap
