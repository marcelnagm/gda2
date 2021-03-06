<?php


/**
 * Base class that represents a query for the 'tbaviso_local' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue Apr 23 17:54:38 2013
 *
 * @method TbavisoLocalQuery orderByIdLocal($order = Criteria::ASC) Order by the id_local column
 * @method TbavisoLocalQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method TbavisoLocalQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method TbavisoLocalQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method TbavisoLocalQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method TbavisoLocalQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method TbavisoLocalQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method TbavisoLocalQuery groupByIdLocal() Group by the id_local column
 * @method TbavisoLocalQuery groupByNome() Group by the nome column
 * @method TbavisoLocalQuery groupByDescricao() Group by the descricao column
 * @method TbavisoLocalQuery groupByCreatedAt() Group by the created_at column
 * @method TbavisoLocalQuery groupByUpdatedAt() Group by the updated_at column
 * @method TbavisoLocalQuery groupByCreatedBy() Group by the created_by column
 * @method TbavisoLocalQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method TbavisoLocalQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TbavisoLocalQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TbavisoLocalQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TbavisoLocalQuery leftJoinTbaviso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tbaviso relation
 * @method TbavisoLocalQuery rightJoinTbaviso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tbaviso relation
 * @method TbavisoLocalQuery innerJoinTbaviso($relationAlias = null) Adds a INNER JOIN clause to the query using the Tbaviso relation
 *
 * @method TbavisoLocal findOne(PropelPDO $con = null) Return the first TbavisoLocal matching the query
 * @method TbavisoLocal findOneOrCreate(PropelPDO $con = null) Return the first TbavisoLocal matching the query, or a new TbavisoLocal object populated from the query conditions when no match is found
 *
 * @method TbavisoLocal findOneByIdLocal(int $id_local) Return the first TbavisoLocal filtered by the id_local column
 * @method TbavisoLocal findOneByNome(string $nome) Return the first TbavisoLocal filtered by the nome column
 * @method TbavisoLocal findOneByDescricao(string $descricao) Return the first TbavisoLocal filtered by the descricao column
 * @method TbavisoLocal findOneByCreatedAt(string $created_at) Return the first TbavisoLocal filtered by the created_at column
 * @method TbavisoLocal findOneByUpdatedAt(string $updated_at) Return the first TbavisoLocal filtered by the updated_at column
 * @method TbavisoLocal findOneByCreatedBy(string $created_by) Return the first TbavisoLocal filtered by the created_by column
 * @method TbavisoLocal findOneByUpdatedBy(string $updated_by) Return the first TbavisoLocal filtered by the updated_by column
 *
 * @method array findByIdLocal(int $id_local) Return TbavisoLocal objects filtered by the id_local column
 * @method array findByNome(string $nome) Return TbavisoLocal objects filtered by the nome column
 * @method array findByDescricao(string $descricao) Return TbavisoLocal objects filtered by the descricao column
 * @method array findByCreatedAt(string $created_at) Return TbavisoLocal objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return TbavisoLocal objects filtered by the updated_at column
 * @method array findByCreatedBy(string $created_by) Return TbavisoLocal objects filtered by the created_by column
 * @method array findByUpdatedBy(string $updated_by) Return TbavisoLocal objects filtered by the updated_by column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTbavisoLocalQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTbavisoLocalQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'TbavisoLocal', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TbavisoLocalQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     TbavisoLocalQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TbavisoLocalQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TbavisoLocalQuery) {
            return $criteria;
        }
        $query = new TbavisoLocalQuery();
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
     * @return   TbavisoLocal|TbavisoLocal[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TbavisoLocalPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TbavisoLocalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   TbavisoLocal A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID_LOCAL, NOME, DESCRICAO, CREATED_AT, UPDATED_AT, CREATED_BY, UPDATED_BY FROM tbaviso_local WHERE ID_LOCAL = :p0';
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
            $obj = new TbavisoLocal();
            $obj->hydrate($row);
            TbavisoLocalPeer::addInstanceToPool($obj, (string) $key);
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
     * @return TbavisoLocal|TbavisoLocal[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TbavisoLocal[]|mixed the list of results, formatted by the current formatter
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
     * @return TbavisoLocalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TbavisoLocalPeer::ID_LOCAL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TbavisoLocalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TbavisoLocalPeer::ID_LOCAL, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_local column
     *
     * Example usage:
     * <code>
     * $query->filterByIdLocal(1234); // WHERE id_local = 1234
     * $query->filterByIdLocal(array(12, 34)); // WHERE id_local IN (12, 34)
     * $query->filterByIdLocal(array('min' => 12)); // WHERE id_local > 12
     * </code>
     *
     * @param     mixed $idLocal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbavisoLocalQuery The current query, for fluid interface
     */
    public function filterByIdLocal($idLocal = null, $comparison = null)
    {
        if (is_array($idLocal) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TbavisoLocalPeer::ID_LOCAL, $idLocal, $comparison);
    }

    /**
     * Filter the query on the nome column
     *
     * Example usage:
     * <code>
     * $query->filterByNome('fooValue');   // WHERE nome = 'fooValue'
     * $query->filterByNome('%fooValue%'); // WHERE nome LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nome The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbavisoLocalQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nome)) {
                $nome = str_replace('*', '%', $nome);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TbavisoLocalPeer::NOME, $nome, $comparison);
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
     * @return TbavisoLocalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbavisoLocalPeer::DESCRICAO, $descricao, $comparison);
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
     * @return TbavisoLocalQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TbavisoLocalPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TbavisoLocalPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbavisoLocalPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return TbavisoLocalQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TbavisoLocalPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TbavisoLocalPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbavisoLocalPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return TbavisoLocalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbavisoLocalPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return TbavisoLocalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbavisoLocalPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related Tbaviso object
     *
     * @param   Tbaviso|PropelObjectCollection $tbaviso  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TbavisoLocalQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTbaviso($tbaviso, $comparison = null)
    {
        if ($tbaviso instanceof Tbaviso) {
            return $this
                ->addUsingAlias(TbavisoLocalPeer::NOME, $tbaviso->getLocal(), $comparison);
        } elseif ($tbaviso instanceof PropelObjectCollection) {
            return $this
                ->useTbavisoQuery()
                ->filterByPrimaryKeys($tbaviso->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTbaviso() only accepts arguments of type Tbaviso or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tbaviso relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TbavisoLocalQuery The current query, for fluid interface
     */
    public function joinTbaviso($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tbaviso');

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
            $this->addJoinObject($join, 'Tbaviso');
        }

        return $this;
    }

    /**
     * Use the Tbaviso relation Tbaviso object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TbavisoQuery A secondary query class using the current class as primary query
     */
    public function useTbavisoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTbaviso($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tbaviso', 'TbavisoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   TbavisoLocal $tbavisoLocal Object to remove from the list of results
     *
     * @return TbavisoLocalQuery The current query, for fluid interface
     */
    public function prune($tbavisoLocal = null)
    {
        if ($tbavisoLocal) {
            $this->addUsingAlias(TbavisoLocalPeer::ID_LOCAL, $tbavisoLocal->getIdLocal(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
