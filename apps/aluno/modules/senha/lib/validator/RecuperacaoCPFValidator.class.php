<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Valida o login do aluno.
 *
 * @package    derca
 * @subpackage auth
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class RecuperacaoCPFValidator extends sfValidatorBase {

    /**
     * Configures the user validator.
     *
     * Available options:
     *
     *  * username_field      Field name of username field (username by default)
     *  * password_field      Field name of password field (password by default)
     *  * throw_global_error  Throws a global error if true (false by default)
     *
     * @see sfValidatorBase
     */
    public function configure($options = array(), $messages = array()) {
        $this->addOption('throw_global_error', true);
        $this->setMessage('invalid', 'Matrícula inválida');
    }

    /**
     * @see sfValidatorBase
     */
    protected function doClean($values) {

        if (empty($values['cpf']))
            return null;

        try {
            $criteria = new Criteria();
            $criteria->add(TbalunoPeer::CPF, $values['cpf']);
            $criteria->add(TbalunoPeer::MATRICULA, $_REQUEST['recuperaSenha[matricula]']);
            
            if (TbalunoPeer::doCount($criteria) < 1) {
                throw new Exception();
            }
        } catch (Exception $e) {

            if ($this->getOption('throw_global_error')) {
                throw new sfValidatorError($this, 'invalid');
            }

            throw new sfValidatorErrorSchema($this, array(
                'matricula' => new sfValidatorError($this, 'invalid'),
            ));
        }
    }

}
