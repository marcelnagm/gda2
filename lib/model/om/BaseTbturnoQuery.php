<?php


/**
 * Base class that represents a query for the 'tbturno' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue Apr 23 17:54:40 2013
 *
 * @method TbturnoQuery orderByIdTurno($order = Criteria::ASC) Order by the id_turno column
 * @method TbturnoQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method TbturnoQuery orderByHoraInicial($order = Criteria::ASC) Order by the hora_inicial column
 * @method TbturnoQuery orderByHoraFinal($order = Criteria::ASC) Order by the hora_final column
 * @method TbturnoQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method TbturnoQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method TbturnoQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method TbturnoQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method TbturnoQuery groupByIdTurno() Group by the id_turno column
 * @method TbturnoQuery groupByDescricao() Group by the descricao column
 * @method TbturnoQuery groupByHoraInicial() Group by the hora_inicial column
 * @method TbturnoQuery groupByHoraFinal() Group by the hora_final column
 * @method TbturnoQuery groupByCreatedAt() Group by the created_at column
 * @method TbturnoQuery groupByUpdatedAt() Group by the updated_at column
 * @method TbturnoQuery groupByCreatedBy() Group by the created_by column
 * @method TbturnoQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method TbturnoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TbturnoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TbturnoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TbturnoQuery leftJoinTbcursoversao($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tbcursoversao relation
 * @method TbturnoQuery rightJoinTbcursoversao($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tbcursoversao relation
 * @method TbturnoQuery innerJoinTbcursoversao($relationAlias = null) Adds a INNER JOIN clause to the query using the Tbcursoversao relation
 *
 * @method TbturnoQuery leftJoinTboferta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tboferta relation
 * @method TbturnoQuery rightJoinTboferta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tboferta relation
 * @method TbturnoQuery innerJoinTboferta($relationAlias = null) Adds a INNER JOIN clause to the query using the Tboferta relation
 *
 * @method Tbturno findOne(PropelPDO $con = null) Return the first Tbturno matching the query
 * @method Tbturno findOneOrCreate(PropelPDO $con = null) Return the first Tbturno matching the query, or a new Tbturno object populated from the query conditions when no match is found
 *
 * @method Tbturno findOneByIdTurno(int $id_turno) Return the first Tbturno filtered by the id_turno column
 * @method Tbturno findOneByDescricao(string $descricao) Return the first Tbturno filtered by the descricao column
 * @method Tbturno findOneByHoraInicial(string $hora_inicial) Return the first Tbturno filtered by the hora_inicial column
 * @method Tbturno findOneByHoraFinal(string $hora_final) Return the first Tbturno filtered by the hora_final column
 * @method Tbturno findOneByCreatedAt(string $created_at) Return the first Tbturno filtered by the created_at column
 * @method Tbturno findOneByUpdatedAt(string $updated_at) Return the first Tbturno filtered by the updated_at column
 * @method Tbturno findOneByCreatedBy(string $created_by) Return the first Tbturno filtered by the created_by column
 * @method Tbturno findOneByUpdatedBy(string $updated_by) Return the first Tbturno filtered by the updated_by column
 *
 * @method array findByIdTurno(int $id_turno) Return Tbturno objects filtered by the id_turno column
 * @method array findByDescricao(string $descricao) Return Tbturno objects filtered by the descricao column
 * @method array findByHoraInicial(string $hora_inicial) Return Tbturno objects filtered by the hora_inicial column
 * @method array findByHoraFinal(string $hora_final) Return Tbturno objects filtered by the hora_final column
 * @method array findByCreatedAt(string $created_at) Return Tbturno objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Tbturno objects filtered by the updated_at column
 * @method array findByCreatedBy(string $created_by) Return Tbturno objects filtered by the created_by column
 * @method array findByUpdatedBy(string $updated_by) Return Tbturno objects filtered by the updated_by column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTbturnoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTbturnoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Tbturno', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TbturnoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     TbturnoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TbturnoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TbturnoQuery) {
            return $criteria;
        }
        $query = new TbturnoQuery();
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
     * @return   Tbturno|Tbturno[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TbturnoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TbturnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Tbturno A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID_TURNO, DESCRICAO, HORA_INICIAL, HORA_FINAL, CREATED_AT, UPDATED_AT, CREATED_BY, UPDATED_BY FROM tbturno WHERE ID_TURNO = :p0';
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
            $obj = new Tbturno();
            $obj->hydrate($row);
            TbturnoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Tbturno|Tbturno[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Tbturno[]|mixed the list of results, formatted by the current formatter
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
     * @return TbturnoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TbturnoPeer::ID_TURNO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TbturnoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TbturnoPeer::ID_TURNO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_turno column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTurno(1234); // WHERE id_turno = 1234
     * $query->filterByIdTurno(array(12, 34)); // WHERE id_turno IN (12, 34)
     * $query->filterByIdTurno(array('min' => 12)); // WHERE id_turno > 12
     * </code>
     *
     * @param     mixed $idTurno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbturnoQuery The current query, for fluid interface
     */
    public function filterByIdTurno($idTurno = null, $comparison = null)
    {
        if (is_array($idTurno) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TbturnoPeer::ID_TURNO, $idTurno, $comparison);
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
     * @return TbturnoQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbturnoPeer::DESCRICAO, $descricao, $comparison);
    }

    /**
     * Filter the query on the hora_inicial column
     *
     * Example usage:
     * <code>
     * $query->filterByHoraInicial('2011-03-14'); // WHERE hora_inicial = '2011-03-14'
     * $query->filterByHoraInicial('now'); // WHERE hora_inicial = '2011-03-14'
     * $query->filterByHoraInicial(array('max' => 'yesterday')); // WHERE hora_inicial > '2011-03-13'
     * </code>
     *
     * @param     mixed $horaInicial The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbturnoQuery The current query, for fluid interface
     */
    public function filterByHoraInicial($horaInicial = null, $comparison = null)
    {
        if (is_array($horaInicial)) {
            $useMinMax = false;
            if (isset($horaInicial['min'])) {
                $this->addUsingAlias(TbturnoPeer::HORA_INICIAL, $horaInicial['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($horaInicial['max'])) {
                $this->addUsingAlias(TbturnoPeer::HORA_INICIAL, $horaInicial['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbturnoPeer::HORA_INICIAL, $horaInicial, $comparison);
    }

    /**
     * Filter the query on the hora_final column
     *
     * Example usage:
     * <code>
     * $query->filterByHoraFinal('2011-03-14'); // WHERE hora_final = '2011-03-14'
     * $query->filterByHoraFinal('now'); // WHERE hora_final = '2011-03-14'
     * $query->filterByHoraFinal(array('max' => 'yesterday')); // WHERE hora_final > '2011-03-13'
     * </code>
     *
     * @param     mixed $horaFinal The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbturnoQuery The current query, for fluid interface
     */
    public function filterByHoraFinal($horaFinal = null, $comparison = null)
    {
        if (is_array($horaFinal)) {
            $useMinMax = false;
            if (isset($horaFinal['min'])) {
                $this->addUsingAlias(TbturnoPeer::HORA_FINAL, $horaFinal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($horaFinal['max'])) {
                $this->addUsingAlias(TbturnoPeer::HORA_FINAL, $horaFinal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbturnoPeer::HORA_FINAL, $horaFinal, $comparison);
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
     * @return TbturnoQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TbturnoPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TbturnoPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbturnoPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return TbturnoQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TbturnoPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TbturnoPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbturnoPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return TbturnoQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbturnoPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return TbturnoQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbturnoPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related Tbcursoversao object
     *
     * @param   Tbcursoversao|PropelObjectCollection $tbcursoversao  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TbturnoQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTbcursoversao($tbcursoversao, $comparison = null)
    {
        if ($tbcursoversao instanceof Tbcursoversao) {
            return $this
                ->addUsingAlias(TbturnoPeer::ID_TURNO, $tbcursoversao->getIdTurno(), $comparison);
        } elseif ($tbcursoversao instanceof PropelObjectCollection) {
            return $this
                ->useTbcursoversaoQuery()
                ->filterByPrimaryKeys($tbcursoversao->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTbcursoversao() only accepts arguments of type Tbcursoversao or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tbcursoversao relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TbturnoQuery The current query, for fluid interface
     */
    public function joinTbcursoversao($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tbcursoversao');

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
            $this->addJoinObject($join, 'Tbcursoversao');
        }

        return $this;
    }

    /**
     * Use the Tbcursoversao relation Tbcursoversao object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TbcursoversaoQuery A secondary query class using the current class as primary query
     */
    public function useTbcursoversaoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTbcursoversao($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tbcursoversao', 'TbcursoversaoQuery');
    }

    /**
     * Filter the query by a related Tboferta object
     *
     * @param   Tboferta|PropelObjectCollection $tboferta  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TbturnoQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTboferta($tboferta, $comparison = null)
    {
        if ($tboferta instanceof Tboferta) {
            return $this
                ->addUsingAlias(TbturnoPeer::ID_TURNO, $tboferta->getIdTurno(), $comparison);
        } elseif ($tboferta instanceof PropelObjectCollection) {
            return $this
                ->useTbofertaQuery()
                ->filterByPrimaryKeys($tboferta->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTboferta() only accepts arguments of type Tboferta or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tboferta relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TbturnoQuery The current query, for fluid interface
     */
    public function joinTboferta($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tboferta');

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
            $this->addJoinObject($join, 'Tboferta');
        }

        return $this;
    }

    /**
     * Use the Tboferta relation Tboferta object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TbofertaQuery A secondary query class using the current class as primary query
     */
    public function useTbofertaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTboferta($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tboferta', 'TbofertaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Tbturno $tbturno Object to remove from the list of results
     *
     * @return TbturnoQuery The current query, for fluid interface
     */
    public function prune($tbturno = null)
    {
        if ($tbturno) {
            $this->addUsingAlias(TbturnoPeer::ID_TURNO, $tbturno->getIdTurno(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
