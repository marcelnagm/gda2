<?php


/**
 * Base class that represents a query for the 'tbprofessorticket' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue Apr 23 17:54:40 2013
 *
 * @method TbprofessorticketQuery orderByIdProfessorTicket($order = Criteria::ASC) Order by the id_professorticket column
 * @method TbprofessorticketQuery orderByIdPeriodo($order = Criteria::ASC) Order by the id_periodo column
 * @method TbprofessorticketQuery orderByMatriculaProf($order = Criteria::ASC) Order by the matricula_prof column
 * @method TbprofessorticketQuery orderByDtInicio($order = Criteria::ASC) Order by the dt_inicio column
 * @method TbprofessorticketQuery orderByDtFim($order = Criteria::ASC) Order by the dt_fim column
 * @method TbprofessorticketQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method TbprofessorticketQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method TbprofessorticketQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method TbprofessorticketQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method TbprofessorticketQuery groupByIdProfessorTicket() Group by the id_professorticket column
 * @method TbprofessorticketQuery groupByIdPeriodo() Group by the id_periodo column
 * @method TbprofessorticketQuery groupByMatriculaProf() Group by the matricula_prof column
 * @method TbprofessorticketQuery groupByDtInicio() Group by the dt_inicio column
 * @method TbprofessorticketQuery groupByDtFim() Group by the dt_fim column
 * @method TbprofessorticketQuery groupByCreatedAt() Group by the created_at column
 * @method TbprofessorticketQuery groupByUpdatedAt() Group by the updated_at column
 * @method TbprofessorticketQuery groupByCreatedBy() Group by the created_by column
 * @method TbprofessorticketQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method TbprofessorticketQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TbprofessorticketQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TbprofessorticketQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TbprofessorticketQuery leftJoinTbperiodo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tbperiodo relation
 * @method TbprofessorticketQuery rightJoinTbperiodo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tbperiodo relation
 * @method TbprofessorticketQuery innerJoinTbperiodo($relationAlias = null) Adds a INNER JOIN clause to the query using the Tbperiodo relation
 *
 * @method TbprofessorticketQuery leftJoinTbprofessor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tbprofessor relation
 * @method TbprofessorticketQuery rightJoinTbprofessor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tbprofessor relation
 * @method TbprofessorticketQuery innerJoinTbprofessor($relationAlias = null) Adds a INNER JOIN clause to the query using the Tbprofessor relation
 *
 * @method Tbprofessorticket findOne(PropelPDO $con = null) Return the first Tbprofessorticket matching the query
 * @method Tbprofessorticket findOneOrCreate(PropelPDO $con = null) Return the first Tbprofessorticket matching the query, or a new Tbprofessorticket object populated from the query conditions when no match is found
 *
 * @method Tbprofessorticket findOneByIdProfessorTicket(int $id_professorticket) Return the first Tbprofessorticket filtered by the id_professorticket column
 * @method Tbprofessorticket findOneByIdPeriodo(int $id_periodo) Return the first Tbprofessorticket filtered by the id_periodo column
 * @method Tbprofessorticket findOneByMatriculaProf(int $matricula_prof) Return the first Tbprofessorticket filtered by the matricula_prof column
 * @method Tbprofessorticket findOneByDtInicio(string $dt_inicio) Return the first Tbprofessorticket filtered by the dt_inicio column
 * @method Tbprofessorticket findOneByDtFim(string $dt_fim) Return the first Tbprofessorticket filtered by the dt_fim column
 * @method Tbprofessorticket findOneByCreatedAt(string $created_at) Return the first Tbprofessorticket filtered by the created_at column
 * @method Tbprofessorticket findOneByUpdatedAt(string $updated_at) Return the first Tbprofessorticket filtered by the updated_at column
 * @method Tbprofessorticket findOneByCreatedBy(string $created_by) Return the first Tbprofessorticket filtered by the created_by column
 * @method Tbprofessorticket findOneByUpdatedBy(string $updated_by) Return the first Tbprofessorticket filtered by the updated_by column
 *
 * @method array findByIdProfessorTicket(int $id_professorticket) Return Tbprofessorticket objects filtered by the id_professorticket column
 * @method array findByIdPeriodo(int $id_periodo) Return Tbprofessorticket objects filtered by the id_periodo column
 * @method array findByMatriculaProf(int $matricula_prof) Return Tbprofessorticket objects filtered by the matricula_prof column
 * @method array findByDtInicio(string $dt_inicio) Return Tbprofessorticket objects filtered by the dt_inicio column
 * @method array findByDtFim(string $dt_fim) Return Tbprofessorticket objects filtered by the dt_fim column
 * @method array findByCreatedAt(string $created_at) Return Tbprofessorticket objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Tbprofessorticket objects filtered by the updated_at column
 * @method array findByCreatedBy(string $created_by) Return Tbprofessorticket objects filtered by the created_by column
 * @method array findByUpdatedBy(string $updated_by) Return Tbprofessorticket objects filtered by the updated_by column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTbprofessorticketQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTbprofessorticketQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Tbprofessorticket', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TbprofessorticketQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     TbprofessorticketQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TbprofessorticketQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TbprofessorticketQuery) {
            return $criteria;
        }
        $query = new TbprofessorticketQuery();
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
     * @return   Tbprofessorticket|Tbprofessorticket[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TbprofessorticketPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TbprofessorticketPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Tbprofessorticket A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID_PROFESSORTICKET, ID_PERIODO, MATRICULA_PROF, DT_INICIO, DT_FIM, CREATED_AT, UPDATED_AT, CREATED_BY, UPDATED_BY FROM tbprofessorticket WHERE ID_PROFESSORTICKET = :p0';
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
            $obj = new Tbprofessorticket();
            $obj->hydrate($row);
            TbprofessorticketPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Tbprofessorticket|Tbprofessorticket[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Tbprofessorticket[]|mixed the list of results, formatted by the current formatter
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
     * @return TbprofessorticketQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TbprofessorticketPeer::ID_PROFESSORTICKET, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TbprofessorticketQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TbprofessorticketPeer::ID_PROFESSORTICKET, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_professorticket column
     *
     * Example usage:
     * <code>
     * $query->filterByIdProfessorTicket(1234); // WHERE id_professorticket = 1234
     * $query->filterByIdProfessorTicket(array(12, 34)); // WHERE id_professorticket IN (12, 34)
     * $query->filterByIdProfessorTicket(array('min' => 12)); // WHERE id_professorticket > 12
     * </code>
     *
     * @param     mixed $idProfessorTicket The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbprofessorticketQuery The current query, for fluid interface
     */
    public function filterByIdProfessorTicket($idProfessorTicket = null, $comparison = null)
    {
        if (is_array($idProfessorTicket) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TbprofessorticketPeer::ID_PROFESSORTICKET, $idProfessorTicket, $comparison);
    }

    /**
     * Filter the query on the id_periodo column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPeriodo(1234); // WHERE id_periodo = 1234
     * $query->filterByIdPeriodo(array(12, 34)); // WHERE id_periodo IN (12, 34)
     * $query->filterByIdPeriodo(array('min' => 12)); // WHERE id_periodo > 12
     * </code>
     *
     * @see       filterByTbperiodo()
     *
     * @param     mixed $idPeriodo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbprofessorticketQuery The current query, for fluid interface
     */
    public function filterByIdPeriodo($idPeriodo = null, $comparison = null)
    {
        if (is_array($idPeriodo)) {
            $useMinMax = false;
            if (isset($idPeriodo['min'])) {
                $this->addUsingAlias(TbprofessorticketPeer::ID_PERIODO, $idPeriodo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPeriodo['max'])) {
                $this->addUsingAlias(TbprofessorticketPeer::ID_PERIODO, $idPeriodo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbprofessorticketPeer::ID_PERIODO, $idPeriodo, $comparison);
    }

    /**
     * Filter the query on the matricula_prof column
     *
     * Example usage:
     * <code>
     * $query->filterByMatriculaProf(1234); // WHERE matricula_prof = 1234
     * $query->filterByMatriculaProf(array(12, 34)); // WHERE matricula_prof IN (12, 34)
     * $query->filterByMatriculaProf(array('min' => 12)); // WHERE matricula_prof > 12
     * </code>
     *
     * @see       filterByTbprofessor()
     *
     * @param     mixed $matriculaProf The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbprofessorticketQuery The current query, for fluid interface
     */
    public function filterByMatriculaProf($matriculaProf = null, $comparison = null)
    {
        if (is_array($matriculaProf)) {
            $useMinMax = false;
            if (isset($matriculaProf['min'])) {
                $this->addUsingAlias(TbprofessorticketPeer::MATRICULA_PROF, $matriculaProf['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($matriculaProf['max'])) {
                $this->addUsingAlias(TbprofessorticketPeer::MATRICULA_PROF, $matriculaProf['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbprofessorticketPeer::MATRICULA_PROF, $matriculaProf, $comparison);
    }

    /**
     * Filter the query on the dt_inicio column
     *
     * Example usage:
     * <code>
     * $query->filterByDtInicio('2011-03-14'); // WHERE dt_inicio = '2011-03-14'
     * $query->filterByDtInicio('now'); // WHERE dt_inicio = '2011-03-14'
     * $query->filterByDtInicio(array('max' => 'yesterday')); // WHERE dt_inicio > '2011-03-13'
     * </code>
     *
     * @param     mixed $dtInicio The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbprofessorticketQuery The current query, for fluid interface
     */
    public function filterByDtInicio($dtInicio = null, $comparison = null)
    {
        if (is_array($dtInicio)) {
            $useMinMax = false;
            if (isset($dtInicio['min'])) {
                $this->addUsingAlias(TbprofessorticketPeer::DT_INICIO, $dtInicio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dtInicio['max'])) {
                $this->addUsingAlias(TbprofessorticketPeer::DT_INICIO, $dtInicio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbprofessorticketPeer::DT_INICIO, $dtInicio, $comparison);
    }

    /**
     * Filter the query on the dt_fim column
     *
     * Example usage:
     * <code>
     * $query->filterByDtFim('2011-03-14'); // WHERE dt_fim = '2011-03-14'
     * $query->filterByDtFim('now'); // WHERE dt_fim = '2011-03-14'
     * $query->filterByDtFim(array('max' => 'yesterday')); // WHERE dt_fim > '2011-03-13'
     * </code>
     *
     * @param     mixed $dtFim The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbprofessorticketQuery The current query, for fluid interface
     */
    public function filterByDtFim($dtFim = null, $comparison = null)
    {
        if (is_array($dtFim)) {
            $useMinMax = false;
            if (isset($dtFim['min'])) {
                $this->addUsingAlias(TbprofessorticketPeer::DT_FIM, $dtFim['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dtFim['max'])) {
                $this->addUsingAlias(TbprofessorticketPeer::DT_FIM, $dtFim['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbprofessorticketPeer::DT_FIM, $dtFim, $comparison);
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
     * @return TbprofessorticketQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TbprofessorticketPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TbprofessorticketPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbprofessorticketPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return TbprofessorticketQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TbprofessorticketPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TbprofessorticketPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbprofessorticketPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return TbprofessorticketQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbprofessorticketPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return TbprofessorticketQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbprofessorticketPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related Tbperiodo object
     *
     * @param   Tbperiodo|PropelObjectCollection $tbperiodo The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TbprofessorticketQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTbperiodo($tbperiodo, $comparison = null)
    {
        if ($tbperiodo instanceof Tbperiodo) {
            return $this
                ->addUsingAlias(TbprofessorticketPeer::ID_PERIODO, $tbperiodo->getIdPeriodo(), $comparison);
        } elseif ($tbperiodo instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TbprofessorticketPeer::ID_PERIODO, $tbperiodo->toKeyValue('PrimaryKey', 'IdPeriodo'), $comparison);
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
     * @return TbprofessorticketQuery The current query, for fluid interface
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
     * Filter the query by a related Tbprofessor object
     *
     * @param   Tbprofessor|PropelObjectCollection $tbprofessor The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TbprofessorticketQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTbprofessor($tbprofessor, $comparison = null)
    {
        if ($tbprofessor instanceof Tbprofessor) {
            return $this
                ->addUsingAlias(TbprofessorticketPeer::MATRICULA_PROF, $tbprofessor->getMatriculaProf(), $comparison);
        } elseif ($tbprofessor instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TbprofessorticketPeer::MATRICULA_PROF, $tbprofessor->toKeyValue('PrimaryKey', 'MatriculaProf'), $comparison);
        } else {
            throw new PropelException('filterByTbprofessor() only accepts arguments of type Tbprofessor or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tbprofessor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TbprofessorticketQuery The current query, for fluid interface
     */
    public function joinTbprofessor($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tbprofessor');

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
            $this->addJoinObject($join, 'Tbprofessor');
        }

        return $this;
    }

    /**
     * Use the Tbprofessor relation Tbprofessor object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TbprofessorQuery A secondary query class using the current class as primary query
     */
    public function useTbprofessorQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTbprofessor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tbprofessor', 'TbprofessorQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Tbprofessorticket $tbprofessorticket Object to remove from the list of results
     *
     * @return TbprofessorticketQuery The current query, for fluid interface
     */
    public function prune($tbprofessorticket = null)
    {
        if ($tbprofessorticket) {
            $this->addUsingAlias(TbprofessorticketPeer::ID_PROFESSORTICKET, $tbprofessorticket->getIdProfessorTicket(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
