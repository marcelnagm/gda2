   <?php if(sfContext::getInstance()->getUser()->hasAttribute('fila_horario_erro')){
              
echo nl2br(sfContext::getInstance()->getUser()->getAttribute('fila_horario_erro'));
 sfContext::getInstance()->getUser()->setAttribute('fila_horario_erro',null);
       
   }
   ?>

