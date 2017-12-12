<?php


/**
 * Base class that represents a query for the 'tbfila_bkp' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue Apr 23 17:54:39 2013
 *
 * @method TbfilaBkpQuery orderByIdFila($order = Criteria::ASC) Order by the id_fila column
 * @method TbfilaBkpQuery orderByMatricula($order = Criteria::ASC) Order by the matricula column
 * @method TbfilaBkpQuery orderByIdOferta($order = Criteria::ASC) Order by the id_oferta column
 * @method TbfilaBkpQuery orderByHoraInsert($order = Criteria::ASC) Order by the hora_insert column
 * @method TbfilaBkpQuery orderByHoraDelete($order = Criteria::ASC) Order by the hora_delete column
 * @method TbfilaBkpQuery orderByIdSituacao($order = Criteria::ASC) Order by the id_situacao column
 * @method TbfilaBkpQuery orderById($order = Criteria::ASC) Order by the id column
 *
 * @method TbfilaBkpQuery groupByIdFila() Group by the id_fila column
 * @method TbfilaBkpQuery groupByMatricula() Group by the matricula column
 * @method TbfilaBkpQuery groupByIdOferta() Group by the id_oferta column
 * @method TbfilaBkpQuery groupByHoraInsert() Group by the hora_insert column
 * @method TbfilaBkpQuery groupByHoraDelete() Group by the hora_delete column
 * @method TbfilaBkpQuery groupByIdSituacao() Group by the id_situacao column
 * @method TbfilaBkpQuery groupById() Group by the id column
 *
 * @method TbfilaBkpQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TbfilaBkpQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TbfilaBkpQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TbfilaBkp findOne(PropelPDO $con = null) Return the first TbfilaBkp matching the query
 * @method TbfilaBkp findOneOrCreate(PropelPDO $con = null) Return the first TbfilaBkp matching the query, or a new TbfilaBkp object populated from the query conditions when no match is found
 *
 * @method TbfilaBkp findOneByIdFila(int $id_fila) Return the first TbfilaBkp filtered by the id_fila column
 * @method TbfilaBkp findOneByMatricula(string $matricula) Return the first TbfilaBkp filtered by the matricula column
 * @method TbfilaBkp findOneByIdOferta(int $id_oferta) Return the first TbfilaBkp filtered by the id_oferta column
 * @method TbfilaBkp findOneByHoraInsert(string $hora_insert) Return the first TbfilaBkp filtered by the hora_insert column
 * @method TbfilaBkp findOneByHoraDelete(string $hora_delete) Return the first TbfilaBkp filtered by the hora_delete column
 * @method TbfilaBkp findOneByIdSituacao(int $id_situacao) Return the first TbfilaBkp filtered by the id_situacao column
 * @method TbfilaBkp findOneById(int $id) Return the first TbfilaBkp filtered by the id column
 *
 * @method array findByIdFila(int $id_fila) Return TbfilaBkp objects filtered by the id_fila column
 * @method array findByMatricula(string $matricula) Return TbfilaBkp objects filtered by the matricula column
 * @method array findByIdOferta(int $id_oferta) Return TbfilaBkp objects filtered by the id_oferta column
 * @method array findByHoraInsert(string $hora_insert) Return TbfilaBkp objects filtered by the hora_insert column
 * @method array findByHoraDelete(string $hora_delete) Return TbfilaBkp objects filtered by the hora_delete column
 * @method array findByIdSituacao(int $id_situacao) Return TbfilaBkp objects filtered by the id_situacao column
 * @method array findById(int $id) Return TbfilaBkp objects filtered by the id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTbfilaBkpQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTbfilaBkpQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'TbfilaBkp', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TbfilaBkpQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     TbfilaBkpQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TbfilaBkpQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TbfilaBkpQuery) {
            return $criteria;
        }
        $query = new TbfilaBkpQuery();
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
     * @return   TbfilaBkp|TbfilaBkp[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TbfilaBkpPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TbfilaBkpPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   TbfilaBkp A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID_FILA, MATRICULA, ID_OFERTA, HORA_INSERT, HORA_DELETE, ID_SITUACAO, ID FROM tbfila_bkp WHERE ID = :p0';
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
            $obj = new TbfilaBkp();
            $obj->hydrate($row);
            TbfilaBkpPeer::addInstanceToPool($obj, (string) $key);
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
     * @return TbfilaBkp|TbfilaBkp[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TbfilaBkp[]|mixed the list of results, formatted by the current formatter
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
     * @return TbfilaBkpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TbfilaBkpPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TbfilaBkpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TbfilaBkpPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_fila column
     *
     * Example usage:
     * <code>
     * $query->filterByIdFila(1234); // WHERE id_fila = 1234
     * $query->filterByIdFila(array(12, 34)); // WHERE id_fila IN (12, 34)
     * $query->filterByIdFila(array('min' => 12)); // WHERE id_fila > 12
     * </code>
     *
     * @param     mixed $idFila The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbfilaBkpQuery The current query, for fluid interface
     */
    public function filterByIdFila($idFila = null, $comparison = null)
    {
        if (is_array($idFila)) {
            $useMinMax = false;
            if (isset($idFila['min'])) {
                $this->addUsingAlias(TbfilaBkpPeer::ID_FILA, $idFila['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idFila['max'])) {
                $this->addUsingAlias(TbfilaBkpPeer::ID_FILA, $idFila['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbfilaBkpPeer::ID_FILA, $idFila, $comparison);
    }

    /**
     * Filter the query on the matricula column
     *
     * Example usage:
     * <code>
     * $query->filterByMatricula(1234); // WHERE matricula = 1234
     * $query->filterByMatricula(array(12, 34)); // WHERE matricula IN (12, 34)
     * $query->filterByMatricula(array('min' => 12)); // WHERE matricula > 12
     * </code>
     *
     * @param     mixed $matricula The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbfilaBkpQuery The current query, for fluid interface
     */
    public function filterByMatricula($matricula = null, $comparison = null)
    {
        if (is_array($matricula)) {
            $useMinMax = false;
            if (isset($matricula['min'])) {
                $this->addUsingAlias(TbfilaBkpPeer::MATRICULA, $matricula['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($matricula['max'])) {
                $this->addUsingAlias(TbfilaBkpPeer::MATRICULA, $matricula['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbfilaBkpPeer::MATRICULA, $matricula, $comparison);
    }

    /**
     * Filter the query on the id_oferta column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOferta(1234); // WHERE id_oferta = 1234
     * $query->filterByIdOferta(array(12, 34)); // WHERE id_oferta IN (12, 34)
     * $query->filterByIdOferta(array('min' => 12)); // WHERE id_oferta > 12
     * </code>
     *
     * @param     mixed $idOferta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbfilaBkpQuery The current query, for fluid interface
     */
    public function filterByIdOferta($idOferta = null, $comparison = null)
    {
        if (is_array($idOferta)) {
            $useMinMax = false;
            if (isset($idOferta['min'])) {
                $this->addUsingAlias(TbfilaBkpPeer::ID_OFERTA, $idOferta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOferta['max'])) {
                $this->addUsingAlias(TbfilaBkpPeer::ID_OFERTA, $idOferta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbfilaBkpPeer::ID_OFERTA, $idOferta, $comparison);
    }

    /**
     * Filter the query on the hora_insert column
     *
     * Example usage:
     * <code>
     * $query->filterByHoraInsert('2011-03-14'); // WHERE hora_insert = '2011-03-14'
     * $query->filterByHoraInsert('now'); // WHERE hora_insert = '2011-03-14'
     * $query->filterByHoraInsert(array('max' => 'yesterday')); // WHERE hora_insert > '2011-03-13'
     * </code>
     *
     * @param     mixed $horaInsert The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbfilaBkpQuery The current query, for fluid interface
     */
    public function filterByHoraInsert($horaInsert = null, $comparison = null)
    {
        if (is_array($horaInsert)) {
            $useMinMax = false;
            if (isset($horaInsert['min'])) {
                $this->addUsingAlias(TbfilaBkpPeer::HORA_INSERT, $horaInsert['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($horaInsert['max'])) {
                $this->addUsingAlias(TbfilaBkpPeer::HORA_INSERT, $horaInsert['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbfilaBkpPeer::HORA_INSERT, $horaInsert, $comparison);
    }

    /**
     * Filter the query on the hora_delete column
     *
     * Example usage:
     * <code>
     * $query->filterByHoraDelete('2011-03-14'); // WHERE hora_delete = '2011-03-14'
     * $query->filterByHoraDelete('now'); // WHERE hora_delete = '2011-03-14'
     * $query->filterByHoraDelete(array('max' => 'yesterday')); // WHERE hora_delete > '2011-03-13'
     * </code>
     *
     * @param     mixed $horaDelete The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbfilaBkpQuery The current query, for fluid interface
     */
    public function filterByHoraDelete($horaDelete = null, $comparison = null)
    {
        if (is_array($horaDelete)) {
            $useMinMax = false;
            if (isset($horaDelete['min'])) {
                $this->addUsingAlias(TbfilaBkpPeer::HORA_DELETE, $horaDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($horaDelete['max'])) {
                $this->addUsingAlias(TbfilaBkpPeer::HORA_DELETE, $horaDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbfilaBkpPeer::HORA_DELETE, $horaDelete, $comparison);
    }

    /**
     * Filter the query on the id_situacao column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSituacao(1234); // WHERE id_situacao = 1234
     * $query->filterByIdSituacao(array(12, 34)); // WHERE id_situacao IN (12, 34)
     * $query->filterByIdSituacao(array('min' => 12)); // WHERE id_situacao > 12
     * </code>
     *
     * @param     mixed $idSituacao The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbfilaBkpQuery The current query, for fluid interface
     */
    public function filterByIdSituacao($idSituacao = null, $comparison = null)
    {
        if (is_array($idSituacao)) {
            $useMinMax = false;
            if (isset($idSituacao['min'])) {
                $this->addUsingAlias(TbfilaBkpPeer::ID_SITUACAO, $idSituacao['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSituacao['max'])) {
                $this->addUsingAlias(TbfilaBkpPeer::ID_SITUACAO, $idSituacao['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbfilaBkpPeer::ID_SITUACAO, $idSituacao, $comparison);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbfilaBkpQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TbfilaBkpPeer::ID, $id, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   TbfilaBkp $tbfilaBkp Object to remove from the list of results
     *
     * @return TbfilaBkpQuery The current query, for fluid interface
     */
    public function prune($tbfilaBkp = null)
    {
        if ($tbfilaBkp) {
            $this->addUsingAlias(TbfilaBkpPeer::ID, $tbfilaBkp->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
