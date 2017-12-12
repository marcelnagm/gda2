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
class ProfessorSigninValidator extends sfValidatorBase {
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

        $this->setMessage('invalid', 'SIAPE e/ou senha inválido(s)');
    }

    /**
     * @see sfValidatorBase
     */
    protected function doClean($values) {


        try {

            $c = new Criteria();
            $c->add(TbprofessorPeer::SIAPE, $values['siape']);
            $professor = TbprofessorPeer::doSelectOne($c);

            if( ! $professor instanceof Tbprofessor ) {
                throw new Exception();
            }

            $professorsenha = ($professor->countTbprofessorsenhas() == 1) ? current($professor->getTbprofessorsenhas()) : new Tbprofessorsenha();

            if ($values['siape'] == $professor->getSiape() && ( md5($values['senha']) == $professorsenha->getSenha() ) ) {

                return array_merge( $values, array('professor' => $professor) );

            } else {
                throw new Exception();
            }

        } catch (Exception $e) {
            
            if ($this->getOption('throw_global_error')) {
                throw new sfValidatorError($this, 'invalid');
            }

            throw new sfValidatorErrorSchema($this, array(
                    'siape' => new sfValidatorError($this, 'invalid'),
            ));
        }

    }
    
}
