<?php


/**
 * Base class that represents a query for the 'tbsala' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue Apr 23 17:54:40 2013
 *
 * @method TbsalaQuery orderByIdSala($order = Criteria::ASC) Order by the id_sala column
 * @method TbsalaQuery orderByBloco($order = Criteria::ASC) Order by the bloco column
 * @method TbsalaQuery orderByCapacidade($order = Criteria::ASC) Order by the capacidade column
 * @method TbsalaQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method TbsalaQuery orderByIdCampus($order = Criteria::ASC) Order by the id_campus column
 * @method TbsalaQuery orderByNumero($order = Criteria::ASC) Order by the numero column
 * @method TbsalaQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method TbsalaQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method TbsalaQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method TbsalaQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method TbsalaQuery groupByIdSala() Group by the id_sala column
 * @method TbsalaQuery groupByBloco() Group by the bloco column
 * @method TbsalaQuery groupByCapacidade() Group by the capacidade column
 * @method TbsalaQuery groupByDescricao() Group by the descricao column
 * @method TbsalaQuery groupByIdCampus() Group by the id_campus column
 * @method TbsalaQuery groupByNumero() Group by the numero column
 * @method TbsalaQuery groupByCreatedAt() Group by the created_at column
 * @method TbsalaQuery groupByUpdatedAt() Group by the updated_at column
 * @method TbsalaQuery groupByCreatedBy() Group by the created_by column
 * @method TbsalaQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method TbsalaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TbsalaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TbsalaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TbsalaQuery leftJoinTbcampus($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tbcampus relation
 * @method TbsalaQuery rightJoinTbcampus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tbcampus relation
 * @method TbsalaQuery innerJoinTbcampus($relationAlias = null) Adds a INNER JOIN clause to the query using the Tbcampus relation
 *
 * @method TbsalaQuery leftJoinTboferta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tboferta relation
 * @method TbsalaQuery rightJoinTboferta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tboferta relation
 * @method TbsalaQuery innerJoinTboferta($relationAlias = null) Adds a INNER JOIN clause to the query using the Tboferta relation
 *
 * @method Tbsala findOne(PropelPDO $con = null) Return the first Tbsala matching the query
 * @method Tbsala findOneOrCreate(PropelPDO $con = null) Return the first Tbsala matching the query, or a new Tbsala object populated from the query conditions when no match is found
 *
 * @method Tbsala findOneByIdSala(int $id_sala) Return the first Tbsala filtered by the id_sala column
 * @method Tbsala findOneByBloco(string $bloco) Return the first Tbsala filtered by the bloco column
 * @method Tbsala findOneByCapacidade(int $capacidade) Return the first Tbsala filtered by the capacidade column
 * @method Tbsala findOneByDescricao(string $descricao) Return the first Tbsala filtered by the descricao column
 * @method Tbsala findOneByIdCampus(int $id_campus) Return the first Tbsala filtered by the id_campus column
 * @method Tbsala findOneByNumero(int $numero) Return the first Tbsala filtered by the numero column
 * @method Tbsala findOneByCreatedAt(string $created_at) Return the first Tbsala filtered by the created_at column
 * @method Tbsala findOneByUpdatedAt(string $updated_at) Return the first Tbsala filtered by the updated_at column
 * @method Tbsala findOneByCreatedBy(string $created_by) Return the first Tbsala filtered by the created_by column
 * @method Tbsala findOneByUpdatedBy(string $updated_by) Return the first Tbsala filtered by the updated_by column
 *
 * @method array findByIdSala(int $id_sala) Return Tbsala objects filtered by the id_sala column
 * @method array findByBloco(string $bloco) Return Tbsala objects filtered by the bloco column
 * @method array findByCapacidade(int $capacidade) Return Tbsala objects filtered by the capacidade column
 * @method array findByDescricao(string $descricao) Return Tbsala objects filtered by the descricao column
 * @method array findByIdCampus(int $id_campus) Return Tbsala objects filtered by the id_campus column
 * @method array findByNumero(int $numero) Return Tbsala objects filtered by the numero column
 * @method array findByCreatedAt(string $created_at) Return Tbsala objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Tbsala objects filtered by the updated_at column
 * @method array findByCreatedBy(string $created_by) Return Tbsala objects filtered by the created_by column
 * @method array findByUpdatedBy(string $updated_by) Return Tbsala objects filtered by the updated_by column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTbsalaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTbsalaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Tbsala', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TbsalaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     TbsalaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TbsalaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TbsalaQuery) {
            return $criteria;
        }
        $query = new TbsalaQuery();
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
     * @return   Tbsala|Tbsala[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TbsalaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TbsalaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Tbsala A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID_SALA, BLOCO, CAPACIDADE, DESCRICAO, ID_CAMPUS, NUMERO, CREATED_AT, UPDATED_AT, CREATED_BY, UPDATED_BY FROM tbsala WHERE ID_SALA = :p0';
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
            $obj = new Tbsala();
            $obj->hydrate($row);
            TbsalaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Tbsala|Tbsala[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Tbsala[]|mixed the list of results, formatted by the current formatter
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
     * @return TbsalaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TbsalaPeer::ID_SALA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TbsalaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TbsalaPeer::ID_SALA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sala column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSala(1234); // WHERE id_sala = 1234
     * $query->filterByIdSala(array(12, 34)); // WHERE id_sala IN (12, 34)
     * $query->filterByIdSala(array('min' => 12)); // WHERE id_sala > 12
     * </code>
     *
     * @param     mixed $idSala The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbsalaQuery The current query, for fluid interface
     */
    public function filterByIdSala($idSala = null, $comparison = null)
    {
        if (is_array($idSala) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TbsalaPeer::ID_SALA, $idSala, $comparison);
    }

    /**
     * Filter the query on the bloco column
     *
     * Example usage:
     * <code>
     * $query->filterByBloco('fooValue');   // WHERE bloco = 'fooValue'
     * $query->filterByBloco('%fooValue%'); // WHERE bloco LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bloco The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbsalaQuery The current query, for fluid interface
     */
    public function filterByBloco($bloco = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bloco)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bloco)) {
                $bloco = str_replace('*', '%', $bloco);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TbsalaPeer::BLOCO, $bloco, $comparison);
    }

    /**
     * Filter the query on the capacidade column
     *
     * Example usage:
     * <code>
     * $query->filterByCapacidade(1234); // WHERE capacidade = 1234
     * $query->filterByCapacidade(array(12, 34)); // WHERE capacidade IN (12, 34)
     * $query->filterByCapacidade(array('min' => 12)); // WHERE capacidade > 12
     * </code>
     *
     * @param     mixed $capacidade The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbsalaQuery The current query, for fluid interface
     */
    public function filterByCapacidade($capacidade = null, $comparison = null)
    {
        if (is_array($capacidade)) {
            $useMinMax = false;
            if (isset($capacidade['min'])) {
                $this->addUsingAlias(TbsalaPeer::CAPACIDADE, $capacidade['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($capacidade['max'])) {
                $this->addUsingAlias(TbsalaPeer::CAPACIDADE, $capacidade['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbsalaPeer::CAPACIDADE, $capacidade, $comparison);
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
     * @return TbsalaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbsalaPeer::DESCRICAO, $descricao, $comparison);
    }

    /**
     * Filter the query on the id_campus column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCampus(1234); // WHERE id_campus = 1234
     * $query->filterByIdCampus(array(12, 34)); // WHERE id_campus IN (12, 34)
     * $query->filterByIdCampus(array('min' => 12)); // WHERE id_campus > 12
     * </code>
     *
     * @see       filterByTbcampus()
     *
     * @param     mixed $idCampus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbsalaQuery The current query, for fluid interface
     */
    public function filterByIdCampus($idCampus = null, $comparison = null)
    {
        if (is_array($idCampus)) {
            $useMinMax = false;
            if (isset($idCampus['min'])) {
                $this->addUsingAlias(TbsalaPeer::ID_CAMPUS, $idCampus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCampus['max'])) {
                $this->addUsingAlias(TbsalaPeer::ID_CAMPUS, $idCampus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbsalaPeer::ID_CAMPUS, $idCampus, $comparison);
    }

    /**
     * Filter the query on the numero column
     *
     * Example usage:
     * <code>
     * $query->filterByNumero(1234); // WHERE numero = 1234
     * $query->filterByNumero(array(12, 34)); // WHERE numero IN (12, 34)
     * $query->filterByNumero(array('min' => 12)); // WHERE numero > 12
     * </code>
     *
     * @param     mixed $numero The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbsalaQuery The current query, for fluid interface
     */
    public function filterByNumero($numero = null, $comparison = null)
    {
        if (is_array($numero)) {
            $useMinMax = false;
            if (isset($numero['min'])) {
                $this->addUsingAlias(TbsalaPeer::NUMERO, $numero['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numero['max'])) {
                $this->addUsingAlias(TbsalaPeer::NUMERO, $numero['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbsalaPeer::NUMERO, $numero, $comparison);
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
     * @return TbsalaQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TbsalaPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TbsalaPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbsalaPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return TbsalaQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TbsalaPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TbsalaPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbsalaPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return TbsalaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbsalaPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return TbsalaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbsalaPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related Tbcampus object
     *
     * @param   Tbcampus|PropelObjectCollection $tbcampus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TbsalaQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTbcampus($tbcampus, $comparison = null)
    {
        if ($tbcampus instanceof Tbcampus) {
            return $this
                ->addUsingAlias(TbsalaPeer::ID_CAMPUS, $tbcampus->getIdCampus(), $comparison);
        } elseif ($tbcampus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TbsalaPeer::ID_CAMPUS, $tbcampus->toKeyValue('PrimaryKey', 'IdCampus'), $comparison);
        } else {
            throw new PropelException('filterByTbcampus() only accepts arguments of type Tbcampus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tbcampus relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TbsalaQuery The current query, for fluid interface
     */
    public function joinTbcampus($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tbcampus');

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
            $this->addJoinObject($join, 'Tbcampus');
        }

        return $this;
    }

    /**
     * Use the Tbcampus relation Tbcampus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TbcampusQuery A secondary query class using the current class as primary query
     */
    public function useTbcampusQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTbcampus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tbcampus', 'TbcampusQuery');
    }

    /**
     * Filter the query by a related Tboferta object
     *
     * @param   Tboferta|PropelObjectCollection $tboferta  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TbsalaQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTboferta($tboferta, $comparison = null)
    {
        if ($tboferta instanceof Tboferta) {
            return $this
                ->addUsingAlias(TbsalaPeer::ID_SALA, $tboferta->getIdSala(), $comparison);
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
     * @return TbsalaQuery The current query, for fluid interface
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
     * @param   Tbsala $tbsala Object to remove from the list of results
     *
     * @return TbsalaQuery The current query, for fluid interface
     */
    public function prune($tbsala = null)
    {
        if ($tbsala) {
            $this->addUsingAlias(TbsalaPeer::ID_SALA, $tbsala->getIdSala(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
