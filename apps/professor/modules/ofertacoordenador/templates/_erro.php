   <?php if(sfContext::getInstance()->getUser()->hasAttribute('oferta_horario_erro')){
              
       echo 'Outra disciplina ja esta sendo ofertada na mesma e no mesmo horário
           , disciplina com horário em choque com a(s) disciplina(s):<br>';
       foreach (TbofertaPeer::retrieveByPKs(sfContext::getInstance()->getUser()->getAttribute('oferta_horario_erro')) as $oferta){
           echo $oferta.'<br>';
        }
   }
   ?>

