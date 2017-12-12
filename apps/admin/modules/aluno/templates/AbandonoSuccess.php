<?php
use_stylesheet('/sfPropelPlugin/css/default.css');
use_stylesheet('/sfPropelPlugin/css/global.css');
$list1off = $sf_data->getRaw('list1');
$list2off = $sf_data->getRaw('list2');
$list3off = $sf_data->getRaw('list3');
$list4off = $sf_data->getRaw('list4');
$criteria = new Criteria();
?>
<script type="text/javascript">
function display(str)
  {
  alert(str);
  }
</script>
<div class="botoes">
<a class="imprimir" href="javascript: window.print()">Imprimir</a>
</div>
<div class="lista">
    <?php if($list->count()): ?>
      Quantidade: <?php echo $list->count() ?>
    <table>
        <thead>
            <tr>
                    <?php foreach($show_fields as $field_key): ?>
                <th><?php echo $field_key ?></th>
                    <?php endforeach ?>
                <th>Modalidade</th>
            </tr>
        </thead>

            <?php

            foreach ($list as $object):
                $even = @$i++ % 2;
                ?>
        <tbody>
            <tr class="row-<?php echo $even ?>">
                        <?php foreach($show_fields as $field_key): ?>
                <td>
                                <?php
                                $value = $object->__call('get'.$field_key,array());
                                if(is_array($value) || $value instanceof sfOutputEscaperArrayDecorator) {
                                    foreach($value as $v)
                                        echo $v.',<br/>';
                                } else {
                                    echo $value;
                                }
                                ?>
                </td>
                        <?php endforeach ?>
                <td style="text-align: center">
                   <?php
                        $temp = '';
                        if (in_array($object->getMatricula(), $list1off)) {
                            $criteria->clear();
                            $criteria->add(TbhistoricoPeer::MATRICULA, $object->getMatricula());
                            $criteria->add(TbhistoricoPeer::COD_DISCIPLINA, 'ST999');
                            $historico = new Tbhistorico();
                            $temp = $temp . 'Trancamentos: ST999 x '. TbhistoricoPeer::doCount($criteria) . '\n';
                            echo 'T';
                        }
                        if (in_array($object->getMatricula(), $list2off)) {
                            $temp = $temp . 'Reprovações: ';
                            $sql = 'select A.cod_disciplina as cod_disciplina, A.cnt from 
                                (select cod_disciplina, count(cod_disciplina) as cnt from 
                                tbhistorico where id_conceito in (2,3) and matricula='.$object->getMatricula().
                                    ' group by cod_disciplina) as A where A.cnt >= 4';
                            $con = Propel::getConnection();
                            $stmt = $con->prepare($sql);
                            $stmt->execute();
                            for ($i = 0; $i < $stmt->rowCount(); $i++) {
                                $line = $stmt->fetch();
                                $temp = $temp . $line[0] . " x " . $line[1] . ', ';
                            }
                            $temp = $temp . '\n';
                            echo 'R';
                        }
                        if (in_array($object->getMatricula(), $list3off)) {
                            $temp = $temp . 'Abandono: dois últimos semestres inativo;\n';
                            echo 'A';
                        }
                        if (in_array($object->getMatricula(), $list4off)) {
                            $temp = $temp . 'Prazo Máximo: ultrapassado o limite de tempo.';
                            echo 'P';
                        }
                        echo '<br>' . str_replace('\n', '<br>', $temp);
                        ?>
<!--                    <br>
                        <button onclick="display('<?php echo $temp ?>')">Mostrar Razões</button>-->
                </td>
            </tr>
                <?php endforeach ?>
        </tbody>
    </table>
    <?php else: ?>
    Nenhum registro
    <?php endif ?>
</div>