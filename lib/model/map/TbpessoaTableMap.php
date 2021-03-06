<?php


/**
 * This class defines the structure of the 'tbpessoa' table.
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
class TbpessoaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TbpessoaTableMap';

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
		$this->setName('tbpessoa');
		$this->setPhpName('Tbpessoa');
		$this->setClassname('Tbpessoa');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('tbpessoa_id_pessoa_seq');
		// columns
		$this->addPrimaryKey('ID_PESSOA', 'IdPessoa', 'INTEGER', true, null, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', false, 100, null);
		$this->addColumn('CELULAR', 'Celular', 'VARCHAR', false, 15, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 100, null);
		$this->addColumn('FONE_RESIDENCIAL', 'FoneResidencial', 'VARCHAR', false, 15, null);
		$this->addColumn('FOTO', 'Foto', 'BLOB', false, null, null);
		$this->addForeignKey('ID_NECES_ESPECIAL', 'IdNecesEspecial', 'VARCHAR', 'tbnecesespecial', 'ID_NECES_ESPECIAL', false, 255, null);
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
    $this->addRelation('Tbnecesespecial', 'Tbnecesespecial', RelationMap::MANY_TO_ONE, array('id_neces_especial' => 'id_neces_especial', ), null, null);
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

} // TbpessoaTableMap
