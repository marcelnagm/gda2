<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

/**
 * Valida o login do professor.
 *
 * @package    derca
 * @subpackage auth
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class AlterarSenhaValidator extends sfValidatorBase {
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

        $this->setMessage('invalid', 'Dados não conferem. Digite novamente.');
    }

    /**
     * @see sfValidatorBase
     */
    protected function doClean($values) {

        if ($values['senha_nova'] != $values['senha_nova_2'] ) {
            $this->setMessage('invalid', 'Repita a senha nova neste campo');
            throw new sfValidatorErrorSchema($this, array(
                    'senha_nova_2' => new sfValidatorError($this, 'invalid'),
            ));
        }

        // check if the user exists
        $professor = sfContext::getInstance()->getUser()->getAttribute('professor');
        $c = new Criteria();
        $c->add(TbprofessorsenhaPeer::MATRICULA_PROF, $professor->getMatriculaProf());
        $user = TbprofessorsenhaPeer::doSelectOne($c);
        
        if ($user && md5($values['senha_atual']) == $user->getSenha() ) {

            // return values
            return array_merge( $values, array('senha_nova' => $values['senha_nova']) );

        } else {
            if ($this->getOption('throw_global_error')) {
                throw new sfValidatorError($this, 'invalid');
            }

            throw new sfValidatorErrorSchema($this, array(
                    'senha_atual' => new sfValidatorError($this, 'invalid'),
            ));
        }

    }
}
