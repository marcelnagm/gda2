<?php


/**
 * Base class that represents a query for the 'radcheck' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue Apr 23 17:54:40 2013
 *
 * @method HotSpotRadcheckQuery orderById($order = Criteria::ASC) Order by the id column
 * @method HotSpotRadcheckQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method HotSpotRadcheckQuery orderByAttribute($order = Criteria::ASC) Order by the attribute column
 * @method HotSpotRadcheckQuery orderByOp($order = Criteria::ASC) Order by the op column
 * @method HotSpotRadcheckQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method HotSpotRadcheckQuery groupById() Group by the id column
 * @method HotSpotRadcheckQuery groupByUsername() Group by the username column
 * @method HotSpotRadcheckQuery groupByAttribute() Group by the attribute column
 * @method HotSpotRadcheckQuery groupByOp() Group by the op column
 * @method HotSpotRadcheckQuery groupByValue() Group by the value column
 *
 * @method HotSpotRadcheckQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method HotSpotRadcheckQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method HotSpotRadcheckQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method HotSpotRadcheck findOne(PropelPDO $con = null) Return the first HotSpotRadcheck matching the query
 * @method HotSpotRadcheck findOneOrCreate(PropelPDO $con = null) Return the first HotSpotRadcheck matching the query, or a new HotSpotRadcheck object populated from the query conditions when no match is found
 *
 * @method HotSpotRadcheck findOneById(int $id) Return the first HotSpotRadcheck filtered by the id column
 * @method HotSpotRadcheck findOneByUsername(string $username) Return the first HotSpotRadcheck filtered by the username column
 * @method HotSpotRadcheck findOneByAttribute(string $attribute) Return the first HotSpotRadcheck filtered by the attribute column
 * @method HotSpotRadcheck findOneByOp(string $op) Return the first HotSpotRadcheck filtered by the op column
 * @method HotSpotRadcheck findOneByValue(string $value) Return the first HotSpotRadcheck filtered by the value column
 *
 * @method array findById(int $id) Return HotSpotRadcheck objects filtered by the id column
 * @method array findByUsername(string $username) Return HotSpotRadcheck objects filtered by the username column
 * @method array findByAttribute(string $attribute) Return HotSpotRadcheck objects filtered by the attribute column
 * @method array findByOp(string $op) Return HotSpotRadcheck objects filtered by the op column
 * @method array findByValue(string $value) Return HotSpotRadcheck objects filtered by the value column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseHotSpotRadcheckQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseHotSpotRadcheckQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hotspot_aluno', $modelName = 'HotSpotRadcheck', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new HotSpotRadcheckQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     HotSpotRadcheckQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return HotSpotRadcheckQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof HotSpotRadcheckQuery) {
            return $criteria;
        }
        $query = new HotSpotRadcheckQuery();
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
     * @return   HotSpotRadcheck|HotSpotRadcheck[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = HotSpotRadcheckPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(HotSpotRadcheckPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   HotSpotRadcheck A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, USERNAME, ATTRIBUTE, OP, VALUE FROM radcheck WHERE ID = :p0';
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
            $obj = new HotSpotRadcheck();
            $obj->hydrate($row);
            HotSpotRadcheckPeer::addInstanceToPool($obj, (string) $key);
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
     * @return HotSpotRadcheck|HotSpotRadcheck[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|HotSpotRadcheck[]|mixed the list of results, formatted by the current formatter
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
     * @return HotSpotRadcheckQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HotSpotRadcheckPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return HotSpotRadcheckQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HotSpotRadcheckPeer::ID, $keys, Criteria::IN);
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
     * @return HotSpotRadcheckQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(HotSpotRadcheckPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%'); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HotSpotRadcheckQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $username)) {
                $username = str_replace('*', '%', $username);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(HotSpotRadcheckPeer::USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the attribute column
     *
     * Example usage:
     * <code>
     * $query->filterByAttribute('fooValue');   // WHERE attribute = 'fooValue'
     * $query->filterByAttribute('%fooValue%'); // WHERE attribute LIKE '%fooValue%'
     * </code>
     *
     * @param     string $attribute The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HotSpotRadcheckQuery The current query, for fluid interface
     */
    public function filterByAttribute($attribute = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($attribute)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $attribute)) {
                $attribute = str_replace('*', '%', $attribute);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(HotSpotRadcheckPeer::ATTRIBUTE, $attribute, $comparison);
    }

    /**
     * Filter the query on the op column
     *
     * Example usage:
     * <code>
     * $query->filterByOp('fooValue');   // WHERE op = 'fooValue'
     * $query->filterByOp('%fooValue%'); // WHERE op LIKE '%fooValue%'
     * </code>
     *
     * @param     string $op The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HotSpotRadcheckQuery The current query, for fluid interface
     */
    public function filterByOp($op = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($op)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $op)) {
                $op = str_replace('*', '%', $op);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(HotSpotRadcheckPeer::OP, $op, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE value = 'fooValue'
     * $query->filterByValue('%fooValue%'); // WHERE value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HotSpotRadcheckQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $value)) {
                $value = str_replace('*', '%', $value);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(HotSpotRadcheckPeer::VALUE, $value, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   HotSpotRadcheck $hotSpotRadcheck Object to remove from the list of results
     *
     * @return HotSpotRadcheckQuery The current query, for fluid interface
     */
    public function prune($hotSpotRadcheck = null)
    {
        if ($hotSpotRadcheck) {
            $this->addUsingAlias(HotSpotRadcheckPeer::ID, $hotSpotRadcheck->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}