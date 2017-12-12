<?php


/**
 * Base class that represents a query for the 'tbrestaurantesenha' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue Apr 23 17:54:37 2013
 *
 * @method TbrestaurantesenhaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method TbrestaurantesenhaQuery orderByLogin($order = Criteria::ASC) Order by the login column
 * @method TbrestaurantesenhaQuery orderBySenha($order = Criteria::ASC) Order by the senha column
 * @method TbrestaurantesenhaQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method TbrestaurantesenhaQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method TbrestaurantesenhaQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method TbrestaurantesenhaQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method TbrestaurantesenhaQuery groupById() Group by the id column
 * @method TbrestaurantesenhaQuery groupByLogin() Group by the login column
 * @method TbrestaurantesenhaQuery groupBySenha() Group by the senha column
 * @method TbrestaurantesenhaQuery groupByCreatedAt() Group by the created_at column
 * @method TbrestaurantesenhaQuery groupByUpdatedAt() Group by the updated_at column
 * @method TbrestaurantesenhaQuery groupByCreatedBy() Group by the created_by column
 * @method TbrestaurantesenhaQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method TbrestaurantesenhaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TbrestaurantesenhaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TbrestaurantesenhaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Tbrestaurantesenha findOne(PropelPDO $con = null) Return the first Tbrestaurantesenha matching the query
 * @method Tbrestaurantesenha findOneOrCreate(PropelPDO $con = null) Return the first Tbrestaurantesenha matching the query, or a new Tbrestaurantesenha object populated from the query conditions when no match is found
 *
 * @method Tbrestaurantesenha findOneById(int $id) Return the first Tbrestaurantesenha filtered by the id column
 * @method Tbrestaurantesenha findOneByLogin(string $login) Return the first Tbrestaurantesenha filtered by the login column
 * @method Tbrestaurantesenha findOneBySenha(string $senha) Return the first Tbrestaurantesenha filtered by the senha column
 * @method Tbrestaurantesenha findOneByCreatedAt(string $created_at) Return the first Tbrestaurantesenha filtered by the created_at column
 * @method Tbrestaurantesenha findOneByUpdatedAt(string $updated_at) Return the first Tbrestaurantesenha filtered by the updated_at column
 * @method Tbrestaurantesenha findOneByCreatedBy(string $created_by) Return the first Tbrestaurantesenha filtered by the created_by column
 * @method Tbrestaurantesenha findOneByUpdatedBy(string $updated_by) Return the first Tbrestaurantesenha filtered by the updated_by column
 *
 * @method array findById(int $id) Return Tbrestaurantesenha objects filtered by the id column
 * @method array findByLogin(string $login) Return Tbrestaurantesenha objects filtered by the login column
 * @method array findBySenha(string $senha) Return Tbrestaurantesenha objects filtered by the senha column
 * @method array findByCreatedAt(string $created_at) Return Tbrestaurantesenha objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Tbrestaurantesenha objects filtered by the updated_at column
 * @method array findByCreatedBy(string $created_by) Return Tbrestaurantesenha objects filtered by the created_by column
 * @method array findByUpdatedBy(string $updated_by) Return Tbrestaurantesenha objects filtered by the updated_by column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTbrestaurantesenhaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTbrestaurantesenhaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Tbrestaurantesenha', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TbrestaurantesenhaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     TbrestaurantesenhaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TbrestaurantesenhaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TbrestaurantesenhaQuery) {
            return $criteria;
        }
        $query = new TbrestaurantesenhaQuery();
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
     * @return   Tbrestaurantesenha|Tbrestaurantesenha[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TbrestaurantesenhaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TbrestaurantesenhaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Tbrestaurantesenha A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, LOGIN, SENHA, CREATED_AT, UPDATED_AT, CREATED_BY, UPDATED_BY FROM tbrestaurantesenha WHERE ID = :p0';
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
            $obj = new Tbrestaurantesenha();
            $obj->hydrate($row);
            TbrestaurantesenhaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Tbrestaurantesenha|Tbrestaurantesenha[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Tbrestaurantesenha[]|mixed the list of results, formatted by the current formatter
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
     * @return TbrestaurantesenhaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TbrestaurantesenhaPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TbrestaurantesenhaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TbrestaurantesenhaPeer::ID, $keys, Criteria::IN);
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
     * @return TbrestaurantesenhaQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TbrestaurantesenhaPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the login column
     *
     * Example usage:
     * <code>
     * $query->filterByLogin('fooValue');   // WHERE login = 'fooValue'
     * $query->filterByLogin('%fooValue%'); // WHERE login LIKE '%fooValue%'
     * </code>
     *
     * @param     string $login The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbrestaurantesenhaQuery The current query, for fluid interface
     */
    public function filterByLogin($login = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($login)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $login)) {
                $login = str_replace('*', '%', $login);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TbrestaurantesenhaPeer::LOGIN, $login, $comparison);
    }

    /**
     * Filter the query on the senha column
     *
     * Example usage:
     * <code>
     * $query->filterBySenha('fooValue');   // WHERE senha = 'fooValue'
     * $query->filterBySenha('%fooValue%'); // WHERE senha LIKE '%fooValue%'
     * </code>
     *
     * @param     string $senha The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbrestaurantesenhaQuery The current query, for fluid interface
     */
    public function filterBySenha($senha = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($senha)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $senha)) {
                $senha = str_replace('*', '%', $senha);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TbrestaurantesenhaPeer::SENHA, $senha, $comparison);
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
     * @return TbrestaurantesenhaQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TbrestaurantesenhaPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TbrestaurantesenhaPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbrestaurantesenhaPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return TbrestaurantesenhaQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TbrestaurantesenhaPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TbrestaurantesenhaPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbrestaurantesenhaPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return TbrestaurantesenhaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbrestaurantesenhaPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return TbrestaurantesenhaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbrestaurantesenhaPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Tbrestaurantesenha $tbrestaurantesenha Object to remove from the list of results
     *
     * @return TbrestaurantesenhaQuery The current query, for fluid interface
     */
    public function prune($tbrestaurantesenha = null)
    {
        if ($tbrestaurantesenha) {
            $this->addUsingAlias(TbrestaurantesenhaPeer::ID, $tbrestaurantesenha->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}