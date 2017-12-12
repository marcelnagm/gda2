<?php


/**
 * Base class that represents a query for the 'tbcoordenadorcurso' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue Apr 23 17:54:39 2013
 *
 * @method TbcoordenadorcursoQuery orderByIdCoordenadorCurso($order = Criteria::ASC) Order by the id_coordenador_curso column
 * @method TbcoordenadorcursoQuery orderByMatriculaProf($order = Criteria::ASC) Order by the matricula_prof column
 * @method TbcoordenadorcursoQuery orderByIdVersaoCurso($order = Criteria::ASC) Order by the id_versao_curso column
 * @method TbcoordenadorcursoQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method TbcoordenadorcursoQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method TbcoordenadorcursoQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method TbcoordenadorcursoQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method TbcoordenadorcursoQuery groupByIdCoordenadorCurso() Group by the id_coordenador_curso column
 * @method TbcoordenadorcursoQuery groupByMatriculaProf() Group by the matricula_prof column
 * @method TbcoordenadorcursoQuery groupByIdVersaoCurso() Group by the id_versao_curso column
 * @method TbcoordenadorcursoQuery groupByCreatedAt() Group by the created_at column
 * @method TbcoordenadorcursoQuery groupByUpdatedAt() Group by the updated_at column
 * @method TbcoordenadorcursoQuery groupByCreatedBy() Group by the created_by column
 * @method TbcoordenadorcursoQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method TbcoordenadorcursoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TbcoordenadorcursoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TbcoordenadorcursoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TbcoordenadorcursoQuery leftJoinTbprofessor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tbprofessor relation
 * @method TbcoordenadorcursoQuery rightJoinTbprofessor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tbprofessor relation
 * @method TbcoordenadorcursoQuery innerJoinTbprofessor($relationAlias = null) Adds a INNER JOIN clause to the query using the Tbprofessor relation
 *
 * @method TbcoordenadorcursoQuery leftJoinTbcursoversao($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tbcursoversao relation
 * @method TbcoordenadorcursoQuery rightJoinTbcursoversao($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tbcursoversao relation
 * @method TbcoordenadorcursoQuery innerJoinTbcursoversao($relationAlias = null) Adds a INNER JOIN clause to the query using the Tbcursoversao relation
 *
 * @method Tbcoordenadorcurso findOne(PropelPDO $con = null) Return the first Tbcoordenadorcurso matching the query
 * @method Tbcoordenadorcurso findOneOrCreate(PropelPDO $con = null) Return the first Tbcoordenadorcurso matching the query, or a new Tbcoordenadorcurso object populated from the query conditions when no match is found
 *
 * @method Tbcoordenadorcurso findOneByIdCoordenadorCurso(int $id_coordenador_curso) Return the first Tbcoordenadorcurso filtered by the id_coordenador_curso column
 * @method Tbcoordenadorcurso findOneByMatriculaProf(int $matricula_prof) Return the first Tbcoordenadorcurso filtered by the matricula_prof column
 * @method Tbcoordenadorcurso findOneByIdVersaoCurso(int $id_versao_curso) Return the first Tbcoordenadorcurso filtered by the id_versao_curso column
 * @method Tbcoordenadorcurso findOneByCreatedAt(string $created_at) Return the first Tbcoordenadorcurso filtered by the created_at column
 * @method Tbcoordenadorcurso findOneByUpdatedAt(string $updated_at) Return the first Tbcoordenadorcurso filtered by the updated_at column
 * @method Tbcoordenadorcurso findOneByCreatedBy(string $created_by) Return the first Tbcoordenadorcurso filtered by the created_by column
 * @method Tbcoordenadorcurso findOneByUpdatedBy(string $updated_by) Return the first Tbcoordenadorcurso filtered by the updated_by column
 *
 * @method array findByIdCoordenadorCurso(int $id_coordenador_curso) Return Tbcoordenadorcurso objects filtered by the id_coordenador_curso column
 * @method array findByMatriculaProf(int $matricula_prof) Return Tbcoordenadorcurso objects filtered by the matricula_prof column
 * @method array findByIdVersaoCurso(int $id_versao_curso) Return Tbcoordenadorcurso objects filtered by the id_versao_curso column
 * @method array findByCreatedAt(string $created_at) Return Tbcoordenadorcurso objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Tbcoordenadorcurso objects filtered by the updated_at column
 * @method array findByCreatedBy(string $created_by) Return Tbcoordenadorcurso objects filtered by the created_by column
 * @method array findByUpdatedBy(string $updated_by) Return Tbcoordenadorcurso objects filtered by the updated_by column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTbcoordenadorcursoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTbcoordenadorcursoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Tbcoordenadorcurso', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TbcoordenadorcursoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     TbcoordenadorcursoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TbcoordenadorcursoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TbcoordenadorcursoQuery) {
            return $criteria;
        }
        $query = new TbcoordenadorcursoQuery();
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
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$id_coordenador_curso, $matricula_prof, $id_versao_curso]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Tbcoordenadorcurso|Tbcoordenadorcurso[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TbcoordenadorcursoPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1], (string) $key[2]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TbcoordenadorcursoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Tbcoordenadorcurso A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID_COORDENADOR_CURSO, MATRICULA_PROF, ID_VERSAO_CURSO, CREATED_AT, UPDATED_AT, CREATED_BY, UPDATED_BY FROM tbcoordenadorcurso WHERE ID_COORDENADOR_CURSO = :p0 AND MATRICULA_PROF = :p1 AND ID_VERSAO_CURSO = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Tbcoordenadorcurso();
            $obj->hydrate($row);
            TbcoordenadorcursoPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1], (string) $key[2])));
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
     * @return Tbcoordenadorcurso|Tbcoordenadorcurso[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Tbcoordenadorcurso[]|mixed the list of results, formatted by the current formatter
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
     * @return TbcoordenadorcursoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(TbcoordenadorcursoPeer::ID_COORDENADOR_CURSO, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(TbcoordenadorcursoPeer::MATRICULA_PROF, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(TbcoordenadorcursoPeer::ID_VERSAO_CURSO, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TbcoordenadorcursoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(TbcoordenadorcursoPeer::ID_COORDENADOR_CURSO, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(TbcoordenadorcursoPeer::MATRICULA_PROF, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(TbcoordenadorcursoPeer::ID_VERSAO_CURSO, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id_coordenador_curso column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCoordenadorCurso(1234); // WHERE id_coordenador_curso = 1234
     * $query->filterByIdCoordenadorCurso(array(12, 34)); // WHERE id_coordenador_curso IN (12, 34)
     * $query->filterByIdCoordenadorCurso(array('min' => 12)); // WHERE id_coordenador_curso > 12
     * </code>
     *
     * @param     mixed $idCoordenadorCurso The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbcoordenadorcursoQuery The current query, for fluid interface
     */
    public function filterByIdCoordenadorCurso($idCoordenadorCurso = null, $comparison = null)
    {
        if (is_array($idCoordenadorCurso) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TbcoordenadorcursoPeer::ID_COORDENADOR_CURSO, $idCoordenadorCurso, $comparison);
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
     * @return TbcoordenadorcursoQuery The current query, for fluid interface
     */
    public function filterByMatriculaProf($matriculaProf = null, $comparison = null)
    {
        if (is_array($matriculaProf) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TbcoordenadorcursoPeer::MATRICULA_PROF, $matriculaProf, $comparison);
    }

    /**
     * Filter the query on the id_versao_curso column
     *
     * Example usage:
     * <code>
     * $query->filterByIdVersaoCurso(1234); // WHERE id_versao_curso = 1234
     * $query->filterByIdVersaoCurso(array(12, 34)); // WHERE id_versao_curso IN (12, 34)
     * $query->filterByIdVersaoCurso(array('min' => 12)); // WHERE id_versao_curso > 12
     * </code>
     *
     * @see       filterByTbcursoversao()
     *
     * @param     mixed $idVersaoCurso The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TbcoordenadorcursoQuery The current query, for fluid interface
     */
    public function filterByIdVersaoCurso($idVersaoCurso = null, $comparison = null)
    {
        if (is_array($idVersaoCurso) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TbcoordenadorcursoPeer::ID_VERSAO_CURSO, $idVersaoCurso, $comparison);
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
     * @return TbcoordenadorcursoQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TbcoordenadorcursoPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TbcoordenadorcursoPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbcoordenadorcursoPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return TbcoordenadorcursoQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TbcoordenadorcursoPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TbcoordenadorcursoPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TbcoordenadorcursoPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return TbcoordenadorcursoQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbcoordenadorcursoPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return TbcoordenadorcursoQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TbcoordenadorcursoPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related Tbprofessor object
     *
     * @param   Tbprofessor|PropelObjectCollection $tbprofessor The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TbcoordenadorcursoQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTbprofessor($tbprofessor, $comparison = null)
    {
        if ($tbprofessor instanceof Tbprofessor) {
            return $this
                ->addUsingAlias(TbcoordenadorcursoPeer::MATRICULA_PROF, $tbprofessor->getMatriculaProf(), $comparison);
        } elseif ($tbprofessor instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TbcoordenadorcursoPeer::MATRICULA_PROF, $tbprofessor->toKeyValue('PrimaryKey', 'MatriculaProf'), $comparison);
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
     * @return TbcoordenadorcursoQuery The current query, for fluid interface
     */
    public function joinTbprofessor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useTbprofessorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTbprofessor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tbprofessor', 'TbprofessorQuery');
    }

    /**
     * Filter the query by a related Tbcursoversao object
     *
     * @param   Tbcursoversao|PropelObjectCollection $tbcursoversao The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TbcoordenadorcursoQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTbcursoversao($tbcursoversao, $comparison = null)
    {
        if ($tbcursoversao instanceof Tbcursoversao) {
            return $this
                ->addUsingAlias(TbcoordenadorcursoPeer::ID_VERSAO_CURSO, $tbcursoversao->getIdVersaoCurso(), $comparison);
        } elseif ($tbcursoversao instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TbcoordenadorcursoPeer::ID_VERSAO_CURSO, $tbcursoversao->toKeyValue('PrimaryKey', 'IdVersaoCurso'), $comparison);
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
     * @return TbcoordenadorcursoQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Tbcoordenadorcurso $tbcoordenadorcurso Object to remove from the list of results
     *
     * @return TbcoordenadorcursoQuery The current query, for fluid interface
     */
    public function prune($tbcoordenadorcurso = null)
    {
        if ($tbcoordenadorcurso) {
            $this->addCond('pruneCond0', $this->getAliasedColName(TbcoordenadorcursoPeer::ID_COORDENADOR_CURSO), $tbcoordenadorcurso->getIdCoordenadorCurso(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(TbcoordenadorcursoPeer::MATRICULA_PROF), $tbcoordenadorcurso->getMatriculaProf(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(TbcoordenadorcursoPeer::ID_VERSAO_CURSO), $tbcoordenadorcurso->getIdVersaoCurso(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}