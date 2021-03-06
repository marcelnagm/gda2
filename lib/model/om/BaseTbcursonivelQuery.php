<?php


/**
 * Base class that represents a query for the 'tbcursonivel' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue Apr 23 17:54:38 2013
 *
 * @method TbcursonivelQuery orderByIdNivel($order = Criteria::ASC) Order by the id_nivel column
 * @method TbcursonivelQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method TbcursonivelQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method TbcursonivelQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method TbcursonivelQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method TbcursonivelQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method TbcursonivelQuery groupByIdNivel() Group by the id_nivel column
 * @method TbcursonivelQuery groupByDescricao() Group by the descricao column
 * @method TbcursonivelQuery groupByCreatedAt() Group by the created_at column
 * @method TbcursonivelQuery groupByUpdatedAt() Group by the updated_at column
 * @method TbcursonivelQuery groupByCreatedBy() Group by the created_by column
 * @method TbcursonivelQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method TbcursonivelQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TbcursonivelQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TbcursonivelQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TbcursonivelQuery leftJoinTbcurso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tbcurso relation
 * @method TbcursonivelQuery rightJoinTbcurso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tbcurso relation
 * @method TbcursonivelQuery innerJoinTbcurso($relationAlias = null) Adds a INNER JOIN clause to the query using the Tbcurso relation
 *
 * @method TbcursonivelQuery leftJoinTbperiodo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tbperiodo relation
 * @method TbcursonivelQuery rightJoinTbperiodo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tbperiodo relation
 * @method TbcursonivelQuery innerJoinTbperiodo($relationAlias = null) Adds a INNER JOIN clause to the query using the Tbperiodo relation
 *
 * @method Tbcursonivel findOne(PropelPDO $con = null) Return the first Tbcursonivel matching the query
 * @method Tbcursonivel findOneOrCreate(PropelPDO $con = null) Return the first Tbcursonivel matching the query, or a new Tbcursonivel object populated from the query conditions when no match is found
 *
 * @method Tbcursonivel findOneByIdNivel(int $id_nivel) Return the first Tbcursonivel filtered by the id_nivel column
 * @method Tbcursonivel findOneByDescricao(string $descricao) Return the first Tbcursonivel filtered by the descricao column
 * @method Tbcursonivel findOneByCreatedAt(string $created_at) Return the first Tbcursonivel filtered by the created_at column
 * @method Tbcursonivel findOneByUpdatedAt(string $updated_at) Return the first Tbcursonivel filtered by the updated_at column
 * @method Tbcursonivel findOneByCreatedBy(string $created_by) Return the first Tbcursonivel filtered by the created_by column
 * @method Tbcursonivel findOneByUpdatedBy(string $updated_by) Return the first Tbcursonivel filtered by the updated_by column
 *
 * @method array findByIdNivel(int $id_nivel) Return Tbcursonivel objects filtered by the id_nivel column
 * @method array findByDescricao(string $descricao) Return Tbcursonivel objects filtered by the descricao column
 * @method array findByCreatedAt(string $created_at) Return Tbcursonivel objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Tbcursonivel objects filtered by the updated_at column
 * @method array findByCreatedBy(string $created_by) Return Tbcursonivel objects filtered by the created_by column
 * @method array findByUpdatedBy(string $updated_by) Return Tbcursonivel objects filtered by the updated_by column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTbcursonivelQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTbcursonivelQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Tbcursonivel', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TbcursonivelQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     TbcursonivelQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TbcursonivelQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TbcursonivelQuery) {
            return $criteria;
        }
        $query = new TbcursonivelQuery();
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
     * @return   Tbcursonivel|Tbcursonivel[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TbcursonivelPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TbcursonivelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Tbcursonivel A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID_NIVEL, DESCRICAO, CREATED_AT, UPDATED_AT, CREATED_BY, UPDATED_BY FROM tbcursonivel WHERE ID_NIVEL = :p0';
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
            $obj = new Tbcursonivel();
            $obj->hydrate($row);
            TbcursonivelPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Tbcursonivel|Tbcursonivel[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Tbcursonivel[]|mixed the list of results, formatted by the current formatter
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
     * @return TbcursonivelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TbcursonivelPeer::ID_NIVEL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TbcursonivelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TbcursonivelPeer::ID_NIVEL, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_nivel column
     *
     * Example usage:
     * <code>
     * $query->filterByIdNivel(1234); // WHERE id_nivel = 1234
     * $query->filterByIdNivel(array(12, 34)); // WHERE id_nivel IN (12, 34)
     * $query->filterByIdNivel(array('min' => 12)); // WHERE id_nivel > 12
     * </code>
     *
     * @param     mixed $idNivel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbcursonivelQuery The current query, for fluid interface
     */
    public function filterByIdNivel($idNivel = null, $comparison = null)
    {
        if (is_array($idNivel) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TbcursonivelPeer::ID_NIVEL, $idNivel, $comparison);
    }

    /**
     * Filter the query on the descricao column
     *
     * Example usage:
     * <code>
     * $query->filterByDescricao('fooValue');   // WHERE descricao = 'fooValue'
     * $query->filterByDescricao('%fooValue%'); // WHERE descricao LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descricao The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbcursonivelQuery The current query, for fluid interface
     */
    public function filterByDescricao($descricao = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descricao)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descricao)) {
                $descricao = str_replace('*', '%', $descricao);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TbcursonivelPeer::DESCRICAO, $descricao, $comparison);
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
     * @return TbcursonivelQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TbcursonivelPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TbcursonivelPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbcursonivelPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return TbcursonivelQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TbcursonivelPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TbcursonivelPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbcursonivelPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return TbcursonivelQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbcursonivelPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return TbcursonivelQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbcursonivelPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related Tbcurso object
     *
     * @param   Tbcurso|PropelObjectCollection $tbcurso  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TbcursonivelQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTbcurso($tbcurso, $comparison = null)
    {
        if ($tbcurso instanceof Tbcurso) {
            return $this
                ->addUsingAlias(TbcursonivelPeer::ID_NIVEL, $tbcurso->getIdNivel(), $comparison);
        } elseif ($tbcurso instanceof PropelObjectCollection) {
            return $this
                ->useTbcursoQuery()
                ->filterByPrimaryKeys($tbcurso->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTbcurso() only accepts arguments of type Tbcurso or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tbcurso relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TbcursonivelQuery The current query, for fluid interface
     */
    public function joinTbcurso($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tbcurso');

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
            $this->addJoinObject($join, 'Tbcurso');
        }

        return $this;
    }

    /**
     * Use the Tbcurso relation Tbcurso object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TbcursoQuery A secondary query class using the current class as primary query
     */
    public function useTbcursoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTbcurso($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tbcurso', 'TbcursoQuery');
    }

    /**
     * Filter the query by a related Tbperiodo object
     *
     * @param   Tbperiodo|PropelObjectCollection $tbperiodo  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TbcursonivelQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTbperiodo($tbperiodo, $comparison = null)
    {
        if ($tbperiodo instanceof Tbperiodo) {
            return $this
                ->addUsingAlias(TbcursonivelPeer::ID_NIVEL, $tbperiodo->getIdNivel(), $comparison);
        } elseif ($tbperiodo instanceof PropelObjectCollection) {
            return $this
                ->useTbperiodoQuery()
                ->filterByPrimaryKeys($tbperiodo->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTbperiodo() only accepts arguments of type Tbperiodo or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tbperiodo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TbcursonivelQuery The current query, for fluid interface
     */
    public function joinTbperiodo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tbperiodo');

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
            $this->addJoinObject($join, 'Tbperiodo');
        }

        return $this;
    }

    /**
     * Use the Tbperiodo relation Tbperiodo object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TbperiodoQuery A secondary query class using the current class as primary query
     */
    public function useTbperiodoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTbperiodo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tbperiodo', 'TbperiodoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Tbcursonivel $tbcursonivel Object to remove from the list of results
     *
     * @return TbcursonivelQuery The current query, for fluid interface
     */
    public function prune($tbcursonivel = null)
    {
        if ($tbcursonivel) {
            $this->addUsingAlias(TbcursonivelPeer::ID_NIVEL, $tbcursonivel->getIdNivel(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
