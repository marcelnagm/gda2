<?php

/**
 * Censo2009 form base class.
 *
 * @method Censo2009 getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCenso2009Form extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'aluno_c1'                                       => new sfWidgetFormInputText(),
      'aluno_c2'                                       => new sfWidgetFormTextarea(),
      'aluno_c3'                                       => new sfWidgetFormTextarea(),
      'aluno_c4_nome'                                  => new sfWidgetFormInputText(),
      'aluno_c5_cpf'                                   => new sfWidgetFormInputText(),
      'aluno_c6_doc_estrangeiro'                       => new sfWidgetFormTextarea(),
      'aluno_c7_nascimento'                            => new sfWidgetFormTextarea(),
      'aluno_c8_sexo'                                  => new sfWidgetFormInputText(),
      'aluno_c9_cor_raca'                              => new sfWidgetFormInputText(),
      'aluno_c10_mae'                                  => new sfWidgetFormInputText(),
      'aluno_c11_nacionalidade'                        => new sfWidgetFormInputText(),
      'aluno_c12_uf_nascimento'                        => new sfWidgetFormTextarea(),
      'aluno_c13_cidade_nascimento'                    => new sfWidgetFormTextarea(),
      'aluno_c14_pais_origem'                          => new sfWidgetFormTextarea(),
      'aluno_c15_deficiencia'                          => new sfWidgetFormInputText(),
      'aluno_c16_def_cegueria'                         => new sfWidgetFormTextarea(),
      'aluno_c17_def_baixa_visao'                      => new sfWidgetFormTextarea(),
      'aluno_c18_def_surdez'                           => new sfWidgetFormTextarea(),
      'aluno_c19_def_auditiva'                         => new sfWidgetFormTextarea(),
      'aluno_c20_def_fisica'                           => new sfWidgetFormTextarea(),
      'aluno_c21_def_surdocegueira'                    => new sfWidgetFormTextarea(),
      'aluno_c22_def_multipla'                         => new sfWidgetFormTextarea(),
      'aluno_c23_def_mental'                           => new sfWidgetFormTextarea(),
      'curso_c1_tipo_reg2'                             => new sfWidgetFormInputText(),
      'curso_c2_id_inep_curso'                         => new sfWidgetFormTextarea(),
      'curso_c3_cod_polo_inep'                         => new sfWidgetFormTextarea(),
      'curso_c4_turno_aluno'                           => new sfWidgetFormTextarea(),
      'curso_c5_situacao_vinculo'                      => new sfWidgetFormInputText(),
      'curso_c6_data_ingresso'                         => new sfWidgetFormTextarea(),
      'curso_c7_aluno_publica'                         => new sfWidgetFormTextarea(),
      'curso_c8_forma_ingresso_selecao_vestibular'     => new sfWidgetFormInputText(),
      'curso_c9_forma_ingresso_selecao_enem'           => new sfWidgetFormInputText(),
      'curso_c10_forma_ingresso_selecao_outros'        => new sfWidgetFormInputText(),
      'curso_c11_forma_ingresso_selecao_pecg'          => new sfWidgetFormInputText(),
      'curso_c12_forma_ingresso_outras'                => new sfWidgetFormInputText(),
      'curso_c13_programa_reserva_vagas'               => new sfWidgetFormInputText(),
      'curso_c14_programa_reserva_vagas'               => new sfWidgetFormInputText(),
      'curso_c15_programa_reserva_vagas'               => new sfWidgetFormInputText(),
      'curso_c16_programa_reserva_vagas'               => new sfWidgetFormInputText(),
      'curso_c17_programa_reserva_vagas'               => new sfWidgetFormInputText(),
      'curso_c18_programa_reserva_vagas'               => new sfWidgetFormInputText(),
      'curso_c19_financiamento_estudantil'             => new sfWidgetFormInputText(),
      'curso_c20_financiamento_estudantil'             => new sfWidgetFormInputText(),
      'curso_c21_financiamento_estudantil'             => new sfWidgetFormInputText(),
      'curso_c22_financiamento_estudantil'             => new sfWidgetFormInputText(),
      'curso_c23_financiamento_estudantil'             => new sfWidgetFormInputText(),
      'curso_c24_financiamento_estudantil'             => new sfWidgetFormInputText(),
      'curso_c25_financiamento_estudantil'             => new sfWidgetFormInputText(),
      'curso_c26_financiamento_estudantil_n_reemb'     => new sfWidgetFormInputText(),
      'curso_c27_financiamento_estudantil_n_reemb'     => new sfWidgetFormInputText(),
      'curso_c28_financiamento_estudantil_n_reemb'     => new sfWidgetFormInputText(),
      'curso_c29_financiamento_estudantil_n_reemb'     => new sfWidgetFormInputText(),
      'curso_c30_financiamento_estudantil_n_reemb'     => new sfWidgetFormInputText(),
      'curso_c31_financiamento_estudantil_n_reemb'     => new sfWidgetFormInputText(),
      'curso_c32_financiamento_estudantil_n_reemb'     => new sfWidgetFormInputText(),
      'curso_c33_apoio_social'                         => new sfWidgetFormInputText(),
      'curso_c34_tipo_apoio_social'                    => new sfWidgetFormInputText(),
      'curso_c35_tipo_apoio_social'                    => new sfWidgetFormInputText(),
      'curso_c36_tipo_apoio_social'                    => new sfWidgetFormInputText(),
      'curso_c37_tipo_apoio_social'                    => new sfWidgetFormInputText(),
      'curso_c38_tipo_apoio_social'                    => new sfWidgetFormInputText(),
      'curso_c39_tipo_apoio_social'                    => new sfWidgetFormInputText(),
      'curso_c40_atividade_complementar'               => new sfWidgetFormInputText(),
      'curso_c41_atividade_complementar'               => new sfWidgetFormInputText(),
      'curso_c42_bolsa'                                => new sfWidgetFormInputText(),
      'curso_c43_atividade_complementar'               => new sfWidgetFormInputText(),
      'curso_c44_bolsa'                                => new sfWidgetFormInputText(),
      'curso_c45_atividade_complementar'               => new sfWidgetFormInputText(),
      'curso_c46_bolsa'                                => new sfWidgetFormInputText(),
      'curso_c47_atividade_complementar'               => new sfWidgetFormInputText(),
      'curso_c48_bolsa'                                => new sfWidgetFormInputText(),
      'curso_c49_semestre_conclusao'                   => new sfWidgetFormInputText(),
      'curso_c50_aluno_parfor'                         => new sfWidgetFormInputText(),
      'aluno_c24_def_autismo'                          => new sfWidgetFormTextarea(),
      'aluno_c25_def_asperger'                         => new sfWidgetFormTextarea(),
      'aluno_c26_def_rett'                             => new sfWidgetFormTextarea(),
      'aluno_c27_def_tdi'                              => new sfWidgetFormTextarea(),
      'aluno_c28_def_superdotado'                      => new sfWidgetFormTextarea(),
      'curso_c51_semestre_referencia'                  => new sfWidgetFormTextarea(),
      'curso_c52_curso_origem_transferencia'           => new sfWidgetFormTextarea(),
      'curso_c53_forma_ingresso_seriada'               => new sfWidgetFormTextarea(),
      'curso_c54_forma_ingresso_exofficio'             => new sfWidgetFormTextarea(),
      'curso_c55_forma_ingresso_judicial'              => new sfWidgetFormTextarea(),
      'curso_c56_mobilidade_academica'                 => new sfWidgetFormTextarea(),
      'curso_c57_mobilidade_tipo'                      => new sfWidgetFormTextarea(),
      'curso_c58_mobilidade_ies_destino'               => new sfWidgetFormTextarea(),
      'curso_c59_mobilidade_tipo_internacional'        => new sfWidgetFormTextarea(),
      'curso_c60_mobilidade_pais_destino'              => new sfWidgetFormTextarea(),
      'curso_c61_semestre_ingresso_curso'              => new sfWidgetFormTextarea(),
      'curso_c62_forma_ingresso_selecao_simples'       => new sfWidgetFormInputText(),
      'curso_c63_forma_ingresso_selecao_remanescentes' => new sfWidgetFormInputText(),
      'curso_c64_forma_ingresso_selecao_especiais'     => new sfWidgetFormInputText(),
      'exportado'                                      => new sfWidgetFormInputCheckbox(),
      'id'                                             => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'aluno_c1'                                       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'aluno_c2'                                       => new sfValidatorString(array('required' => false)),
      'aluno_c3'                                       => new sfValidatorString(array('required' => false)),
      'aluno_c4_nome'                                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'aluno_c5_cpf'                                   => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'aluno_c6_doc_estrangeiro'                       => new sfValidatorString(array('required' => false)),
      'aluno_c7_nascimento'                            => new sfValidatorString(array('required' => false)),
      'aluno_c8_sexo'                                  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'aluno_c9_cor_raca'                              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'aluno_c10_mae'                                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'aluno_c11_nacionalidade'                        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'aluno_c12_uf_nascimento'                        => new sfValidatorString(array('required' => false)),
      'aluno_c13_cidade_nascimento'                    => new sfValidatorString(array('required' => false)),
      'aluno_c14_pais_origem'                          => new sfValidatorString(array('required' => false)),
      'aluno_c15_deficiencia'                          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'aluno_c16_def_cegueria'                         => new sfValidatorString(array('required' => false)),
      'aluno_c17_def_baixa_visao'                      => new sfValidatorString(array('required' => false)),
      'aluno_c18_def_surdez'                           => new sfValidatorString(array('required' => false)),
      'aluno_c19_def_auditiva'                         => new sfValidatorString(array('required' => false)),
      'aluno_c20_def_fisica'                           => new sfValidatorString(array('required' => false)),
      'aluno_c21_def_surdocegueira'                    => new sfValidatorString(array('required' => false)),
      'aluno_c22_def_multipla'                         => new sfValidatorString(array('required' => false)),
      'aluno_c23_def_mental'                           => new sfValidatorString(array('required' => false)),
      'curso_c1_tipo_reg2'                             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c2_id_inep_curso'                         => new sfValidatorString(array('required' => false)),
      'curso_c3_cod_polo_inep'                         => new sfValidatorString(array('required' => false)),
      'curso_c4_turno_aluno'                           => new sfValidatorString(array('required' => false)),
      'curso_c5_situacao_vinculo'                      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c6_data_ingresso'                         => new sfValidatorString(array('required' => false)),
      'curso_c7_aluno_publica'                         => new sfValidatorString(array('required' => false)),
      'curso_c8_forma_ingresso_selecao_vestibular'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c9_forma_ingresso_selecao_enem'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c10_forma_ingresso_selecao_outros'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c11_forma_ingresso_selecao_pecg'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c12_forma_ingresso_outras'                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c13_programa_reserva_vagas'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c14_programa_reserva_vagas'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c15_programa_reserva_vagas'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c16_programa_reserva_vagas'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c17_programa_reserva_vagas'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c18_programa_reserva_vagas'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c19_financiamento_estudantil'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c20_financiamento_estudantil'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c21_financiamento_estudantil'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c22_financiamento_estudantil'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c23_financiamento_estudantil'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c24_financiamento_estudantil'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c25_financiamento_estudantil'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c26_financiamento_estudantil_n_reemb'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c27_financiamento_estudantil_n_reemb'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c28_financiamento_estudantil_n_reemb'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c29_financiamento_estudantil_n_reemb'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c30_financiamento_estudantil_n_reemb'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c31_financiamento_estudantil_n_reemb'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c32_financiamento_estudantil_n_reemb'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c33_apoio_social'                         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c34_tipo_apoio_social'                    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c35_tipo_apoio_social'                    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c36_tipo_apoio_social'                    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c37_tipo_apoio_social'                    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c38_tipo_apoio_social'                    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c39_tipo_apoio_social'                    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c40_atividade_complementar'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c41_atividade_complementar'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c42_bolsa'                                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c43_atividade_complementar'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c44_bolsa'                                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c45_atividade_complementar'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c46_bolsa'                                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c47_atividade_complementar'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c48_bolsa'                                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c49_semestre_conclusao'                   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c50_aluno_parfor'                         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'aluno_c24_def_autismo'                          => new sfValidatorString(array('required' => false)),
      'aluno_c25_def_asperger'                         => new sfValidatorString(array('required' => false)),
      'aluno_c26_def_rett'                             => new sfValidatorString(array('required' => false)),
      'aluno_c27_def_tdi'                              => new sfValidatorString(array('required' => false)),
      'aluno_c28_def_superdotado'                      => new sfValidatorString(array('required' => false)),
      'curso_c51_semestre_referencia'                  => new sfValidatorString(array('required' => false)),
      'curso_c52_curso_origem_transferencia'           => new sfValidatorString(array('required' => false)),
      'curso_c53_forma_ingresso_seriada'               => new sfValidatorString(array('required' => false)),
      'curso_c54_forma_ingresso_exofficio'             => new sfValidatorString(array('required' => false)),
      'curso_c55_forma_ingresso_judicial'              => new sfValidatorString(array('required' => false)),
      'curso_c56_mobilidade_academica'                 => new sfValidatorString(array('required' => false)),
      'curso_c57_mobilidade_tipo'                      => new sfValidatorString(array('required' => false)),
      'curso_c58_mobilidade_ies_destino'               => new sfValidatorString(array('required' => false)),
      'curso_c59_mobilidade_tipo_internacional'        => new sfValidatorString(array('required' => false)),
      'curso_c60_mobilidade_pais_destino'              => new sfValidatorString(array('required' => false)),
      'curso_c61_semestre_ingresso_curso'              => new sfValidatorString(array('required' => false)),
      'curso_c62_forma_ingresso_selecao_simples'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c63_forma_ingresso_selecao_remanescentes' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'curso_c64_forma_ingresso_selecao_especiais'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'exportado'                                      => new sfValidatorBoolean(array('required' => false)),
      'id'                                             => new sfValidatorPropelChoice(array('model' => 'Censo2009', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('censo2009[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Censo2009';
  }


}
