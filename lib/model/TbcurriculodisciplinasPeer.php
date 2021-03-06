<?php

/**
 * Skeleton subclass for performing query and update operations on the 'tbcurriculodisciplinas' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Tue May  4 12:14:33 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class TbcurriculodisciplinasPeer extends BaseTbcurriculodisciplinasPeer {

    public static function doSelect(Criteria $criteria, PropelPDO $con = null) {
        $criteria->addJoin(self::ID_VERSAO_CURSO, TbcursoversaoPeer::ID_VERSAO_CURSO);
        $criteria->addAscendingOrderByColumn(TbcursoversaoPeer::DESCRICAO);
        $criteria->addAscendingOrderByColumn(self::COD_DISCIPLINA);
        return parent::doSelect($criteria, $con);
    }

    public static function getDemandasAlunos($id_versao_curso, $cod_disciplina) {

        $con = Propel::getConnection();

        $sql = 'select 
                    a.matricula,
                    a.nome
                from tbaluno as a 
                where a.id_situacao=0 
                    and a.id_versao_curso= ?
                    and checa_prerequisitos(?,a.matricula) = true 
                    and a.matricula not in (
                        select 
                            matricula 
                        from 
                            tbhistorico
                        where
                            cod_disciplina=?
                            and id_conceito in (8,4,1,7,11,13,6))
                order by 2';

        $stmt = $con->prepare($sql);
        $stmt->bindValue(1, $id_versao_curso);
        $stmt->bindValue(2, $cod_disciplina);
        $stmt->bindValue(3, $cod_disciplina);
        $stmt->execute();        

        return $stmt->fetchAll();
    }

    public static function getDemandas($id_versao_curso) {

        $con = Propel::getConnection();

        $sql = 'select 
                    tc.id_versao_curso,
                    tc.cod_disciplina,
                    (select count(*) 
                    from tbaluno as a 
                    where a.id_situacao=0 
                        and a.id_versao_curso=tc.id_versao_curso 
                        and checa_prerequisitos(tc.cod_disciplina,a.matricula) = true 
                        and a.matricula not in (
                            select 
                                matricula 
                            from 
                                tbhistorico
                            where
                                cod_disciplina=tc.cod_disciplina
                                and id_conceito in (8,4,1,7,11,13,6))
                    ) as "Demanda"
                from tbcurriculodisciplinas as tc 
                where tc.id_versao_curso = ?
                order by 1, 2';

        $stmt = $con->prepare($sql);
        $stmt->bindValue(1, $id_versao_curso);
        $stmt->execute();        

        return $stmt->fetchAll();
    }

    public static function getDemandasPorCurso($cod_curso, $id_periodo) {

        $con = Propel::getConnection();

        $sql = 'select 
            tc.cod_disciplina,
            td.descricao,
            count(tc.cod_disciplina) as count
        from
            tbaluno as  a,
            tbcurriculodisciplinas as tc,
            tbdisciplina as td
        where
            a.id_versao_curso = tc.id_versao_curso
            and td.cod_disciplina = tc.cod_disciplina
            and tc.cod_disciplina not in
                (select
                    cod_disciplina
                from
                    tbhistorico
                where
                    matricula = a.matricula
                    and id_conceito in (8,4,1,7,11) )
            and tc.cod_disciplina not in
                (select
                    tbo.cod_disciplina
                from
                    tbfila as tbf
                    join tboferta as tbo on tbo.id_oferta = tbf.id_oferta
                where
                    tbf.matricula = a.matricula
                    and tbf.id_situacao = 1
                    and tbo.id_periodo = ? )
            and a.id_situacao = 0
            and a.id_versao_curso in
                (select
                    tcv.id_versao_curso
                from
                    tbcursoversao as tcv
                where
                    cod_curso = ?
                    and situacao like \'ATIV%\')
            and checa_prerequisitos(tc.cod_disciplina,a.matricula) = true
        group by
            tc.cod_disciplina,
            td.descricao
        order by
            count desc,
            td.descricao asc';

        $stmt = $con->prepare($sql);
        $stmt->bindValue(1, $id_periodo);
        $stmt->bindValue(2, $cod_curso);
        $stmt->execute();        

        return $stmt->fetchAll();
    }

   

}

// TbcurriculodisciplinasPeer
