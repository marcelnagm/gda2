<?php
use_helper('I18N');
use_helper('jQuery');
use_stylesheet('/sfPropelPlugin/css/default.css');
use_stylesheet('/sfPropelPlugin/css/global.css');
?>
<?php if (isset($form)) { ?>
    <h1><?php ?></h1>
    <style type="text/css">
        .item-menu {
        }
    </style>
    <div id="sf_admin_container">
        <h1>Matricula de um Novo Aluno</h1>
        <form action="<?php echo url_for1('vestibular/NovoAluno'); ?>" method="POST">

            <div id="sf_admin_content">
                <fieldset class="content">
                <?php if (isset($message)): ?>
                    <span style="color: white;background-color: red; "><?php echo $message; ?></span>
                <?php endif; ?>
                <?php
                    if (isset($form['_csrf_token']))
                        echo $form['_csrf_token'];
                    unset($form['_csrf_token']);
                    if (!sfContext::getInstance()->getUser()->getAttribute('import')) {
                ?>                
                <?php echo 'Ano de Ingresso:' . ($form['ano_ingresso']); ?>
                <?php echo 'Semestre de Ingresso:' . ($form['semestre']); ?>
                <?php //echo 'Código do Curso:' . $form['cod_curso']; ?>
                <?php echo 'Colocação no Vestibular:' . $form['posicao']; ?>
                    </fieldset>
            <?php } ?>
            <?php include_partial('vestibular/form_fields', array('tbaluno' => $form->getObject(), 'form' => $form, 'configuration' => $configuration)) ?>
                </div>
                <input type="submit" value="Matricular"/>
            </form>
        </div>

<?php
                } else {
                    if (isset($message)) {
?>
                        <font class="error"> <?php echo $message; ?></font>
                        <a onclick="history.go(-1);">Voltar</a>
<?php
                    } else {
?>
                        <table align="center">
                            <thead>
                            <th colspan="2" align="center">
                                <b style="font-size: 30px;">Clique no botão abaixo e verifique seus dados.</b>
                            </th>
                        </thead>
                        <tr>
                            <td colspan="2" align="center">
                                <a href="<?php echo url_for1('vestibular/GerarFicha'); ?>">
                                    <div align="center" style="
                                         border:3px solid #999999;                        
                                         width:300px;                        
                                         height:100px;                        
                                         margin:15px 15px 15px 15px;                        
                                         font-size:27px;                        
                                         font-weight:bold;                        
                                         background-color:#EBEBEB;" align="center">
                                        <br>FICHA DE ALUNO<br>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        <thead>
                        <th align="center"><b style="font-size: 23px;">Para corrigir seus dados,<br>clique em "CORRIGIR".</b></th>
                        <th align="center"><b style="font-size: 23px;">Para continuar,<br>clique "FINALIZAR".</b></th>
                        </thead>
                        <tr>
                            <td>
                                <a href="<?php echo url_for1('vestibular/NovoAluno'); ?>">
                                    <div align="center" style="
                                         border:3px solid #999999;
                                         width:300px;
                                         height:100px;
                                         margin:15px 15px 15px 15px;
                                         font-size:27px;
                                         font-weight:bold;
                                         background-color:lightcoral;" align="center">
                                        <br>CORRIGIR<br>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo url_for1('vestibular/FinalizarMatricula'); ?>">
                                    <div align="center" style="
                                         border:3px solid #999999;
                                         width:300px;
                                         height:100px;
                                         margin:15px 15px 15px 15px;
                                         font-size:27px;
                                         font-weight:bold;
                                         background-color:lightgreen;" align="center">
                                        <br>FINALIZAR<br>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        </table>



<?php }
                } ?>

