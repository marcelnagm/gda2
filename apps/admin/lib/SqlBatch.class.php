<?php

class SqlBatch {

    public static function  BatchSqls($sqls){
        $con = Propel::getConnection();
//        $con->beginTransaction();
        $message = '';
        $i = 0;
        sfContext::getInstance()->getLogger()->alert('FILHA DA PUTAAAAAAA:'+  var_dump($sqls));
        try {
            foreach ($sqls as $sql) {                
                $stm = $con->prepare($sql);
                $stm->execute();
                $i++;                     
            }


        } catch (Exception $ex) {
//            $con->rollBack();
            throw new Exception($ex->getMessage()+'-Erro na instrução '.$i.' Linha -'.$message. 'ha'. var_dump($sql));
        }
//        $con->commit();
//        $sqls= array();
    }


}


?>