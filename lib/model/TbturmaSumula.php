<?php

/**
 * Skeleton subclass for representing a row from the 'tbturma_sumula' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Sun May 16 18:30:47 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class TbturmaSumula extends BaseTbturmaSumula {

    /**
     * Sobrescreve o metodo getDescricao para verificar se o mesmo esta formatado<br>
     * em HTML. Se estiver, retorna o mesmo, senão substitui as quebras de linha por<br>
     * tags br<br>
     * 
     * @return string
     */
    function getDescricao() {
        $descricao = parent::getDescricao();
        $descricao = (preg_match('/^<[a-z][^>]+>/i', $descricao)) ? $descricao : nl2br($descricao);
        #$descricao = str_replace(' ',' - ',$descricao);
        return $descricao;
    }

}

// TbturmaSumula
