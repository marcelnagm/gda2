<?php


/**
 * This class defines the structure of the 'tbhistorico' table.
 *
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Mon Mar 16 17:38:53 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class TbhistoricoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TbhistoricoTableMap';

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
		$this->setName('tbhistorico');
		$this->setPhpName('Tbhistorico');
		$this->setClassname('Tbhistorico');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('tbhistorico_id_historico_seq');
		// columns
		$this->addPrimaryKey('ID_HISTORICO', 'IdHistorico', 'INTEGER', true, null, null);
		$this->addForeignKey('ID_PERIODO', 'IdPeriodo', 'INTEGER', 'tbperiodo', 'ID_PERIODO', true, null, null);
		$this->addForeignKey('MATRICULA', 'Matricula', 'BIGINT', 'tbaluno', 'MATRICULA', true, null, null);
		$this->addForeignKey('COD_DISCIPLINA', 'CodDisciplina', 'VARCHAR', 'tbdisciplina', 'COD_DISCIPLINA', true, 8, null);
		$this->addColumn('MEDIA', 'Media', 'NUMERIC', true, 10, null);
		$this->addColumn('FALTAS', 'Faltas', 'INTEGER', true, null, null);
		$this->addForeignKey('ID_CONCEITO', 'IdConceito', 'INTEGER', 'tbconceito', 'ID_CONCEITO', true, null, null);
		$this->addColumn('DUPLICADO', 'Duplicado', 'BOOLEAN', false, null, null);
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
    $this->addRelation('Tbperiodo', 'Tbperiodo', RelationMap::MANY_TO_ONE, array('id_periodo' => 'id_periodo', ), null, null);
    $this->addRelation('Tbaluno', 'Tbaluno', RelationMap::MANY_TO_ONE, array('matricula' => 'matricula', ), null, null);
    $this->addRelation('Tbdisciplina', 'Tbdisciplina', RelationMap::MANY_TO_ONE, array('cod_disciplina' => 'cod_disciplina', ), null, null);
    $this->addRelation('Tbconceito', 'Tbconceito', RelationMap::MANY_TO_ONE, array('id_conceito' => 'id_conceito', ), null, null);
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

} // TbhistoricoTableMap
