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
class AtualizaSenhaValidator extends sfValidatorBase {
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
        $this->addOption('throw_global_error', false);

        $this->setMessage('invalid', 'Dados não conferem!');
    }

    /**
     * @see sfValidatorBase
     */
    protected function doClean($values) {

        if ($values['senha_nova'] != $values['senha_nova_2'] ) {
            $this->setMessage('invalid', 'Repita a senha neste campo');

            throw new sfValidatorErrorSchema($this, array(
                    'senha_nova_2' => new sfValidatorError($this, 'invalid')
            ));
        }
    }
}
