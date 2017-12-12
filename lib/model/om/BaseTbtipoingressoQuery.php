<?php


/**
 * Base class that represents a query for the 'tbtipoingresso' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue Apr 23 17:54:40 2013
 *
 * @method TbtipoingressoQuery orderByIdTipoIngresso($order = Criteria::ASC) Order by the id_tipo_ingresso column
 * @method TbtipoingressoQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method TbtipoingressoQuery orderBySiglaPingifes($order = Criteria::ASC) Order by the sigla_pingifes column
 * @method TbtipoingressoQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method TbtipoingressoQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method TbtipoingressoQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method TbtipoingressoQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method TbtipoingressoQuery groupByIdTipoIngresso() Group by the id_tipo_ingresso column
 * @method TbtipoingressoQuery groupByDescricao() Group by the descricao column
 * @method TbtipoingressoQuery groupBySiglaPingifes() Group by the sigla_pingifes column
 * @method TbtipoingressoQuery groupByCreatedAt() Group by the created_at column
 * @method TbtipoingressoQuery groupByUpdatedAt() Group by the updated_at column
 * @method TbtipoingressoQuery groupByCreatedBy() Group by the created_by column
 * @method TbtipoingressoQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method TbtipoingressoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TbtipoingressoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TbtipoingressoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TbtipoingressoQuery leftJoinTbalunomatricula($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tbalunomatricula relation
 * @method TbtipoingressoQuery rightJoinTbalunomatricula($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tbalunomatricula relation
 * @method TbtipoingressoQuery innerJoinTbalunomatricula($relationAlias = null) Adds a INNER JOIN clause to the query using the Tbalunomatricula relation
 *
 * @method TbtipoingressoQuery leftJoinTbalunobackup($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tbalunobackup relation
 * @method TbtipoingressoQuery rightJoinTbalunobackup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tbalunobackup relation
 * @method TbtipoingressoQuery innerJoinTbalunobackup($relationAlias = null) Adds a INNER JOIN clause to the query using the Tbalunobackup relation
 *
 * @method TbtipoingressoQuery leftJoinTbloadaluno($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tbloadaluno relation
 * @method TbtipoingressoQuery rightJoinTbloadaluno($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tbloadaluno relation
 * @method TbtipoingressoQuery innerJoinTbloadaluno($relationAlias = null) Adds a INNER JOIN clause to the query using the Tbloadaluno relation
 *
 * @method TbtipoingressoQuery leftJoinTbaluno($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tbaluno relation
 * @method TbtipoingressoQuery rightJoinTbaluno($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tbaluno relation
 * @method TbtipoingressoQuery innerJoinTbaluno($relationAlias = null) Adds a INNER JOIN clause to the query using the Tbaluno relation
 *
 * @method Tbtipoingresso findOne(PropelPDO $con = null) Return the first Tbtipoingresso matching the query
 * @method Tbtipoingresso findOneOrCreate(PropelPDO $con = null) Return the first Tbtipoingresso matching the query, or a new Tbtipoingresso object populated from the query conditions when no match is found
 *
 * @method Tbtipoingresso findOneByIdTipoIngresso(int $id_tipo_ingresso) Return the first Tbtipoingresso filtered by the id_tipo_ingresso column
 * @method Tbtipoingresso findOneByDescricao(string $descricao) Return the first Tbtipoingresso filtered by the descricao column
 * @method Tbtipoingresso findOneBySiglaPingifes(string $sigla_pingifes) Return the first Tbtipoingresso filtered by the sigla_pingifes column
 * @method Tbtipoingresso findOneByCreatedAt(string $created_at) Return the first Tbtipoingresso filtered by the created_at column
 * @method Tbtipoingresso findOneByUpdatedAt(string $updated_at) Return the first Tbtipoingresso filtered by the updated_at column
 * @method Tbtipoingresso findOneByCreatedBy(string $created_by) Return the first Tbtipoingresso filtered by the created_by column
 * @method Tbtipoingresso findOneByUpdatedBy(string $updated_by) Return the first Tbtipoingresso filtered by the updated_by column
 *
 * @method array findByIdTipoIngresso(int $id_tipo_ingresso) Return Tbtipoingresso objects filtered by the id_tipo_ingresso column
 * @method array findByDescricao(string $descricao) Return Tbtipoingresso objects filtered by the descricao column
 * @method array findBySiglaPingifes(string $sigla_pingifes) Return Tbtipoingresso objects filtered by the sigla_pingifes column
 * @method array findByCreatedAt(string $created_at) Return Tbtipoingresso objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Tbtipoingresso objects filtered by the updated_at column
 * @method array findByCreatedBy(string $created_by) Return Tbtipoingresso objects filtered by the created_by column
 * @method array findByUpdatedBy(string $updated_by) Return Tbtipoingresso objects filtered by the updated_by column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTbtipoingressoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTbtipoingressoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Tbtipoingresso', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TbtipoingressoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     TbtipoingressoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TbtipoingressoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TbtipoingressoQuery) {
            return $criteria;
        }
        $query = new TbtipoingressoQuery();
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
     * @return   Tbtipoingresso|Tbtipoingresso[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TbtipoingressoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TbtipoingressoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Tbtipoingresso A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID_TIPO_INGRESSO, DESCRICAO, SIGLA_PINGIFES, CREATED_AT, UPDATED_AT, CREATED_BY, UPDATED_BY FROM tbtipoingresso WHERE ID_TIPO_INGRESSO = :p0';
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
            $obj = new Tbtipoingresso();
            $obj->hydrate($row);
            TbtipoingressoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Tbtipoingresso|Tbtipoingresso[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Tbtipoingresso[]|mixed the list of results, formatted by the current formatter
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
     * @return TbtipoingressoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TbtipoingressoPeer::ID_TIPO_INGRESSO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TbtipoingressoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TbtipoingressoPeer::ID_TIPO_INGRESSO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_tipo_ingresso column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTipoIngresso(1234); // WHERE id_tipo_ingresso = 1234
     * $query->filterByIdTipoIngresso(array(12, 34)); // WHERE id_tipo_ingresso IN (12, 34)
     * $query->filterByIdTipoIngresso(array('min' => 12)); // WHERE id_tipo_ingresso > 12
     * </code>
     *
     * @param     mixed $idTipoIngresso The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbtipoingressoQuery The current query, for fluid interface
     */
    public function filterByIdTipoIngresso($idTipoIngresso = null, $comparison = null)
    {
        if (is_array($idTipoIngresso) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TbtipoingressoPeer::ID_TIPO_INGRESSO, $idTipoIngresso, $comparison);
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
     * @return TbtipoingressoQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbtipoingressoPeer::DESCRICAO, $descricao, $comparison);
    }

    /**
     * Filter the query on the sigla_pingifes column
     *
     * Example usage:
     * <code>
     * $query->filterBySiglaPingifes('fooValue');   // WHERE sigla_pingifes = 'fooValue'
     * $query->filterBySiglaPingifes('%fooValue%'); // WHERE sigla_pingifes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $siglaPingifes The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbtipoingressoQuery The current query, for fluid interface
     */
    public function filterBySiglaPingifes($siglaPingifes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($siglaPingifes)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $siglaPingifes)) {
                $siglaPingifes = str_replace('*', '%', $siglaPingifes);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TbtipoingressoPeer::SIGLA_PINGIFES, $siglaPingifes, $comparison);
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
     * @return TbtipoingressoQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TbtipoingressoPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TbtipoingressoPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbtipoingressoPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return TbtipoingressoQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TbtipoingressoPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TbtipoingressoPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbtipoingressoPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return TbtipoingressoQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbtipoingressoPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return TbtipoingressoQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbtipoingressoPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related Tbalunomatricula object
     *
     * @param   Tbalunomatricula|PropelObjectCollection $tbalunomatricula  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TbtipoingressoQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTbalunomatricula($tbalunomatricula, $comparison = null)
    {
        if ($tbalunomatricula instanceof Tbalunomatricula) {
            return $this
                ->addUsingAlias(TbtipoingressoPeer::ID_TIPO_INGRESSO, $tbalunomatricula->getIdTipoIngresso(), $comparison);
        } elseif ($tbalunomatricula instanceof PropelObjectCollection) {
            return $this
                ->useTbalunomatriculaQuery()
                ->filterByPrimaryKeys($tbalunomatricula->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTbalunomatricula() only accepts arguments of type Tbalunomatricula or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tbalunomatricula relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TbtipoingressoQuery The current query, for fluid interface
     */
    public function joinTbalunomatricula($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tbalunomatricula');

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
            $this->addJoinObject($join, 'Tbalunomatricula');
        }

        return $this;
    }

    /**
     * Use the Tbalunomatricula relation Tbalunomatricula object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TbalunomatriculaQuery A secondary query class using the current class as primary query
     */
    public function useTbalunomatriculaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTbalunomatricula($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tbalunomatricula', 'TbalunomatriculaQuery');
    }

    /**
     * Filter the query by a related Tbalunobackup object
     *
     * @param   Tbalunobackup|PropelObjectCollection $tbalunobackup  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TbtipoingressoQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTbalunobackup($tbalunobackup, $comparison = null)
    {
        if ($tbalunobackup instanceof Tbalunobackup) {
            return $this
                ->addUsingAlias(TbtipoingressoPeer::ID_TIPO_INGRESSO, $tbalunobackup->getIdTipoIngresso(), $comparison);
        } elseif ($tbalunobackup instanceof PropelObjectCollection) {
            return $this
                ->useTbalunobackupQuery()
                ->filterByPrimaryKeys($tbalunobackup->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTbalunobackup() only accepts arguments of type Tbalunobackup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tbalunobackup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TbtipoingressoQuery The current query, for fluid interface
     */
    public function joinTbalunobackup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tbalunobackup');

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
            $this->addJoinObject($join, 'Tbalunobackup');
        }

        return $this;
    }

    /**
     * Use the Tbalunobackup relation Tbalunobackup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TbalunobackupQuery A secondary query class using the current class as primary query
     */
    public function useTbalunobackupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTbalunobackup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tbalunobackup', 'TbalunobackupQuery');
    }

    /**
     * Filter the query by a related Tbloadaluno object
     *
     * @param   Tbloadaluno|PropelObjectCollection $tbloadaluno  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TbtipoingressoQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTbloadaluno($tbloadaluno, $comparison = null)
    {
        if ($tbloadaluno instanceof Tbloadaluno) {
            return $this
                ->addUsingAlias(TbtipoingressoPeer::ID_TIPO_INGRESSO, $tbloadaluno->getIdTipoIngresso(), $comparison);
        } elseif ($tbloadaluno instanceof PropelObjectCollection) {
            return $this
                ->useTbloadalunoQuery()
                ->filterByPrimaryKeys($tbloadaluno->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTbloadaluno() only accepts arguments of type Tbloadaluno or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tbloadaluno relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TbtipoingressoQuery The current query, for fluid interface
     */
    public function joinTbloadaluno($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tbloadaluno');

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
            $this->addJoinObject($join, 'Tbloadaluno');
        }

        return $this;
    }

    /**
     * Use the Tbloadaluno relation Tbloadaluno object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TbloadalunoQuery A secondary query class using the current class as primary query
     */
    public function useTbloadalunoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTbloadaluno($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tbloadaluno', 'TbloadalunoQuery');
    }

    /**
     * Filter the query by a related Tbaluno object
     *
     * @param   Tbaluno|PropelObjectCollection $tbaluno  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TbtipoingressoQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTbaluno($tbaluno, $comparison = null)
    {
        if ($tbaluno instanceof Tbaluno) {
            return $this
                ->addUsingAlias(TbtipoingressoPeer::ID_TIPO_INGRESSO, $tbaluno->getIdTipoIngresso(), $comparison);
        } elseif ($tbaluno instanceof PropelObjectCollection) {
            return $this
                ->useTbalunoQuery()
                ->filterByPrimaryKeys($tbaluno->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTbaluno() only accepts arguments of type Tbaluno or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tbaluno relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TbtipoingressoQuery The current query, for fluid interface
     */
    public function joinTbaluno($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tbaluno');

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
            $this->addJoinObject($join, 'Tbaluno');
        }

        return $this;
    }

    /**
     * Use the Tbaluno relation Tbaluno object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TbalunoQuery A secondary query class using the current class as primary query
     */
    public function useTbalunoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTbaluno($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tbaluno', 'TbalunoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Tbtipoingresso $tbtipoingresso Object to remove from the list of results
     *
     * @return TbtipoingressoQuery The current query, for fluid interface
     */
    public function prune($tbtipoingresso = null)
    {
        if ($tbtipoingresso) {
            $this->addUsingAlias(TbtipoingressoPeer::ID_TIPO_INGRESSO, $tbtipoingresso->getIdTipoIngresso(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}