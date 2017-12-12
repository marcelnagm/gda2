<?php


/**
 * This class defines the structure of the 'tbloadaluno' table.
 *
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Mon Mar 16 17:38:48 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class TbloadalunoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TbloadalunoTableMap';

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
		$this->setName('tbloadaluno');
		$this->setPhpName('Tbloadaluno');
		$this->setClassname('Tbloadaluno');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('MATRICULA', 'Matricula', 'BIGINT', true, null, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 100, null);
		$this->addColumn('SEXO', 'Sexo', 'CHAR', true, 1, null);
		$this->addColumn('RG', 'Rg', 'VARCHAR', false, 20, null);
		$this->addColumn('RG_ORG_EXPED', 'RgOrgExped', 'VARCHAR', false, 10, null);
		$this->addColumn('CPF', 'Cpf', 'VARCHAR', false, 11, null);
		$this->addForeignKey('ID_VERSAO_CURSO', 'IdVersaoCurso', 'INTEGER', 'tbcursoversao', 'ID_VERSAO_CURSO', true, null, null);
		$this->addForeignKey('ID_TIPO_INGRESSO', 'IdTipoIngresso', 'INTEGER', 'tbtipoingresso', 'ID_TIPO_INGRESSO', true, null, null);
		$this->addForeignKey('ID_SITUACAO', 'IdSituacao', 'INTEGER', 'tbalunosituacao', 'ID_SITUACAO', true, null, null);
		$this->addColumn('CLASSIFICACAO', 'Classificacao', 'INTEGER', false, 11, null);
		$this->addColumn('OPCAO', 'Opcao', 'VARCHAR', false, 15, null);
		$this->addColumn('PROCESSO', 'Processo', 'VARCHAR', true, 20, null);
		$this->addColumn('OP_INGRESSO', 'OpIngresso', 'INTEGER', false, null, 0);
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
    $this->addRelation('Tbcursoversao', 'Tbcursoversao', RelationMap::MANY_TO_ONE, array('id_versao_curso' => 'id_versao_curso', ), null, null);
    $this->addRelation('Tbtipoingresso', 'Tbtipoingresso', RelationMap::MANY_TO_ONE, array('id_tipo_ingresso' => 'id_tipo_ingresso', ), null, null);
    $this->addRelation('Tbalunosituacao', 'Tbalunosituacao', RelationMap::MANY_TO_ONE, array('id_situacao' => 'id_situacao', ), null, null);
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

} // TbloadalunoTableMap