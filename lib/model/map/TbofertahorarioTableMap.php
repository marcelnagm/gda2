<?php


/**
 * This class defines the structure of the 'tbofertahorario' table.
 *
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Mon Mar 16 17:38:54 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class TbofertahorarioTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TbofertahorarioTableMap';

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
		$this->setName('tbofertahorario');
		$this->setPhpName('Tbofertahorario');
		$this->setClassname('Tbofertahorario');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('tbofertahorario_id_horario_seq');
		// columns
		$this->addColumn('DIA', 'Dia', 'INTEGER', true, null, null);
		$this->addColumn('HORA_INICIO', 'HoraInicio', 'TIME', true, null, null);
		$this->addColumn('HORA_FIM', 'HoraFim', 'TIME', true, null, null);
		$this->addForeignKey('ID_OFERTA', 'IdOferta', 'INTEGER', 'tboferta', 'ID_OFERTA', true, null, null);
		$this->addPrimaryKey('ID_HORARIO', 'IdHorario', 'INTEGER', true, null, null);
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
    $this->addRelation('Tboferta', 'Tboferta', RelationMap::MANY_TO_ONE, array('id_oferta' => 'id_oferta', ), null, null);
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

} // TbofertahorarioTableMap
