<?php
use_helper('I18N');
use_helper('jQuery');
use_stylesheet('/sfPropelPlugin/css/default.css');
use_stylesheet('/sfPropelPlugin/css/global.css');
?>
<?php if (isset($form)) { ?>
    <h1><?php ?></h1>
    <style>
        matricula{
            text-decoration: underline;
            color: red;
        }

    </style>
    <div id="sf_admin_container">
        <h1>Matricula de um Novo Aluno</h1>
        <form action="<?php echo url_for1('matricula/NovoAluno'); ?>" method="POST">

            <div id="sf_admin_content">
                <fieldset class="content">
                <?php include_partial('aluno/flashes') ?>
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
            <?php include_partial('aluno/form_fields', array('tbaluno' => $form->getObject(), 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
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
                    <h2 style="background-color: red;color: white;" > Sua matricula ainda não foi efetivada com Sucesso</h2>
                    <h2 style="background-color: red;color: white;" > Para concluir siga o passo 2.</h2>
                    <h2 style="background-color: red;color: white;" > e em seguida siga o passo 4.</h2>
                    <table>
                        <thead>
                        <th>
                            Passo 2
                        </th>
                        <th>
                            Passo 3
                        </th>
                        <th>
                            Passo 4
                        </th>
                    </thead>

                    <tr>
                        <td>
                            <b style="font-size: 18px;">IMPRIMA ELA !!!!</b>
                            <h3>Clique <a style="text-decoration: underline;" href="<?php echo url_for1('matricula/GerarFicha'); ?>">aqui</a> para gerar a sua ficha.<br>
                                Verifique se os dados estão corretos, pois está será sua ficha permanente na instituição.
                                
                            </h3>
                        </td>
                        <td>
                            <b style="font-size: 18px;">APENAS EM CASO DE ERRO VOCÊ EXECUTA ESTE PASSO,CASO ESTA CORRETA A SUA FICHA PROSSIGA PARA O PROXIMO PASSO</b>
                            <h3><br>Caso exista algum dado incorreto, clique <a  href="<?php echo url_for1('matricula/NovoAluno'); ?>" style="color: red;text-decoration: underline;">aqui</a>, e corrija os seus dados incorretos.</h3>
                        </td>
                        <td>
                            <h3><br>Se todos os seus dados estiverem corretos, clique <a style="color: seagreen;text-decoration: underline;" href="<?php echo url_for1('matricula/FinalizarMatricula'); ?>">aqui</a> para finalizar sua matrícula.</h3>
                        </td>
                    </tr>
                    </table>



<?php }
            } ?>

