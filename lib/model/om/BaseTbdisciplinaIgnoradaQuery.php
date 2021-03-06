<?php


/**
 * Base class that represents a query for the 'tbdisciplina_ignorada' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue Apr 23 17:54:38 2013
 *
 * @method TbdisciplinaIgnoradaQuery orderByIdDisciplinaIgnorada($order = Criteria::ASC) Order by the id_disciplina_ignorada column
 * @method TbdisciplinaIgnoradaQuery orderByCodDisciplina($order = Criteria::ASC) Order by the cod_disciplina column
 * @method TbdisciplinaIgnoradaQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method TbdisciplinaIgnoradaQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method TbdisciplinaIgnoradaQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method TbdisciplinaIgnoradaQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method TbdisciplinaIgnoradaQuery groupByIdDisciplinaIgnorada() Group by the id_disciplina_ignorada column
 * @method TbdisciplinaIgnoradaQuery groupByCodDisciplina() Group by the cod_disciplina column
 * @method TbdisciplinaIgnoradaQuery groupByCreatedAt() Group by the created_at column
 * @method TbdisciplinaIgnoradaQuery groupByUpdatedAt() Group by the updated_at column
 * @method TbdisciplinaIgnoradaQuery groupByCreatedBy() Group by the created_by column
 * @method TbdisciplinaIgnoradaQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method TbdisciplinaIgnoradaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TbdisciplinaIgnoradaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TbdisciplinaIgnoradaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TbdisciplinaIgnoradaQuery leftJoinTbdisciplina($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tbdisciplina relation
 * @method TbdisciplinaIgnoradaQuery rightJoinTbdisciplina($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tbdisciplina relation
 * @method TbdisciplinaIgnoradaQuery innerJoinTbdisciplina($relationAlias = null) Adds a INNER JOIN clause to the query using the Tbdisciplina relation
 *
 * @method TbdisciplinaIgnorada findOne(PropelPDO $con = null) Return the first TbdisciplinaIgnorada matching the query
 * @method TbdisciplinaIgnorada findOneOrCreate(PropelPDO $con = null) Return the first TbdisciplinaIgnorada matching the query, or a new TbdisciplinaIgnorada object populated from the query conditions when no match is found
 *
 * @method TbdisciplinaIgnorada findOneByIdDisciplinaIgnorada(int $id_disciplina_ignorada) Return the first TbdisciplinaIgnorada filtered by the id_disciplina_ignorada column
 * @method TbdisciplinaIgnorada findOneByCodDisciplina(string $cod_disciplina) Return the first TbdisciplinaIgnorada filtered by the cod_disciplina column
 * @method TbdisciplinaIgnorada findOneByCreatedAt(string $created_at) Return the first TbdisciplinaIgnorada filtered by the created_at column
 * @method TbdisciplinaIgnorada findOneByUpdatedAt(string $updated_at) Return the first TbdisciplinaIgnorada filtered by the updated_at column
 * @method TbdisciplinaIgnorada findOneByCreatedBy(string $created_by) Return the first TbdisciplinaIgnorada filtered by the created_by column
 * @method TbdisciplinaIgnorada findOneByUpdatedBy(string $updated_by) Return the first TbdisciplinaIgnorada filtered by the updated_by column
 *
 * @method array findByIdDisciplinaIgnorada(int $id_disciplina_ignorada) Return TbdisciplinaIgnorada objects filtered by the id_disciplina_ignorada column
 * @method array findByCodDisciplina(string $cod_disciplina) Return TbdisciplinaIgnorada objects filtered by the cod_disciplina column
 * @method array findByCreatedAt(string $created_at) Return TbdisciplinaIgnorada objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return TbdisciplinaIgnorada objects filtered by the updated_at column
 * @method array findByCreatedBy(string $created_by) Return TbdisciplinaIgnorada objects filtered by the created_by column
 * @method array findByUpdatedBy(string $updated_by) Return TbdisciplinaIgnorada objects filtered by the updated_by column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTbdisciplinaIgnoradaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTbdisciplinaIgnoradaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'TbdisciplinaIgnorada', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TbdisciplinaIgnoradaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     TbdisciplinaIgnoradaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TbdisciplinaIgnoradaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TbdisciplinaIgnoradaQuery) {
            return $criteria;
        }
        $query = new TbdisciplinaIgnoradaQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   TbdisciplinaIgnorada|TbdisciplinaIgnorada[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TbdisciplinaIgnoradaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TbdisciplinaIgnoradaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return   TbdisciplinaIgnorada A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID_DISCIPLINA_IGNORADA, COD_DISCIPLINA, CREATED_AT, UPDATED_AT, CREATED_BY, UPDATED_BY FROM tbdisciplina_ignorada WHERE ID_DISCIPLINA_IGNORADA = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new TbdisciplinaIgnorada();
            $obj->hydrate($row);
            TbdisciplinaIgnoradaPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return TbdisciplinaIgnorada|TbdisciplinaIgnorada[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|TbdisciplinaIgnorada[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return TbdisciplinaIgnoradaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TbdisciplinaIgnoradaPeer::ID_DISCIPLINA_IGNORADA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TbdisciplinaIgnoradaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TbdisciplinaIgnoradaPeer::ID_DISCIPLINA_IGNORADA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_disciplina_ignorada column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDisciplinaIgnorada(1234); // WHERE id_disciplina_ignorada = 1234
     * $query->filterByIdDisciplinaIgnorada(array(12, 34)); // WHERE id_disciplina_ignorada IN (12, 34)
     * $query->filterByIdDisciplinaIgnorada(array('min' => 12)); // WHERE id_disciplina_ignorada > 12
     * </code>
     *
     * @param     mixed $idDisciplinaIgnorada The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbdisciplinaIgnoradaQuery The current query, for fluid interface
     */
    public function filterByIdDisciplinaIgnorada($idDisciplinaIgnorada = null, $comparison = null)
    {
        if (is_array($idDisciplinaIgnorada) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TbdisciplinaIgnoradaPeer::ID_DISCIPLINA_IGNORADA, $idDisciplinaIgnorada, $comparison);
    }

    /**
     * Filter the query on the cod_disciplina column
     *
     * Example usage:
     * <code>
     * $query->filterByCodDisciplina('fooValue');   // WHERE cod_disciplina = 'fooValue'
     * $query->filterByCodDisciplina('%fooValue%'); // WHERE cod_disciplina LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codDisciplina The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbdisciplinaIgnoradaQuery The current query, for fluid interface
     */
    public function filterByCodDisciplina($codDisciplina = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codDisciplina)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $codDisciplina)) {
                $codDisciplina = str_replace('*', '%', $codDisciplina);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TbdisciplinaIgnoradaPeer::COD_DISCIPLINA, $codDisciplina, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbdisciplinaIgnoradaQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TbdisciplinaIgnoradaPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TbdisciplinaIgnoradaPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbdisciplinaIgnoradaPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbdisciplinaIgnoradaQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TbdisciplinaIgnoradaPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TbdisciplinaIgnoradaPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbdisciplinaIgnoradaPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedBy('fooValue');   // WHERE created_by = 'fooValue'
     * $query->filterByCreatedBy('%fooValue%'); // WHERE created_by LIKE '%fooValue%'
     * </code>
     *
     * @param     string $createdBy The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbdisciplinaIgnoradaQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($createdBy)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $createdBy)) {
                $createdBy = str_replace('*', '%', $createdBy);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TbdisciplinaIgnoradaPeer::CREATED_BY, $createdBy, $comparison);
    }

    /**
     * Filter the query on the updated_by column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedBy('fooValue');   // WHERE updated_by = 'fooValue'
     * $query->filterByUpdatedBy('%fooValue%'); // WHERE updated_by LIKE '%fooValue%'
     * </code>
     *
     * @param     string $updatedBy The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbdisciplinaIgnoradaQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($updatedBy)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $updatedBy)) {
                $updatedBy = str_replace('*', '%', $updatedBy);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TbdisciplinaIgnoradaPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related Tbdisciplina object
     *
     * @param   Tbdisciplina|PropelObjectCollection $tbdisciplina The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TbdisciplinaIgnoradaQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTbdisciplina($tbdisciplina, $comparison = null)
    {
        if ($tbdisciplina instanceof Tbdisciplina) {
            return $this
                ->addUsingAlias(TbdisciplinaIgnoradaPeer::COD_DISCIPLINA, $tbdisciplina->getCodDisciplina(), $comparison);
        } elseif ($tbdisciplina instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TbdisciplinaIgnoradaPeer::COD_DISCIPLINA, $tbdisciplina->toKeyValue('PrimaryKey', 'CodDisciplina'), $comparison);
        } else {
            throw new PropelException('filterByTbdisciplina() only accepts arguments of type Tbdisciplina or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tbdisciplina relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TbdisciplinaIgnoradaQuery The current query, for fluid interface
     */
    public function joinTbdisciplina($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tbdisciplina');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Tbdisciplina');
        }

        return $this;
    }

    /**
     * Use the Tbdisciplina relation Tbdisciplina object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TbdisciplinaQuery A secondary query class using the current class as primary query
     */
    public function useTbdisciplinaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTbdisciplina($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tbdisciplina', 'TbdisciplinaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   TbdisciplinaIgnorada $tbdisciplinaIgnorada Object to remove from the list of results
     *
     * @return TbdisciplinaIgnoradaQuery The current query, for fluid interface
     */
    public function prune($tbdisciplinaIgnorada = null)
    {
        if ($tbdisciplinaIgnorada) {
            $this->addUsingAlias(TbdisciplinaIgnoradaPeer::ID_DISCIPLINA_IGNORADA, $tbdisciplinaIgnorada->getIdDisciplinaIgnorada(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
