<?php

require_once dirname(__FILE__) . '/../lib/loadfileGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/loadfileGeneratorHelper.class.php';

/**
 * loadfile actions.
 *
 * @package    derca
 * @subpackage loadfile
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class loadfileActions extends autoLoadfileActions {

    /**
     * Action que inicialmente exibe form para escolha de tipo de arquivo<br>
     * a ser processado. Depois, redireciona para o tipo de processamento<br>
     * escolhido
     * @param sfWebRequest $request
     */
    public function executeListParsing(sfWebRequest $request) {
        if ($request->isMethod(sfRequest::POST)) {
            switch ($request->getParameter('tipo')) {
                case 0:
                    $this->forward('loadfile', 'VestibularParsing');
                    break;
                case 2:
                    $this->forward('loadfile', 'ListaEsperaParsing');
                    break;
                case 3:
                    $this->forward('loadfile', 'GradTranParsing');
                    break;
                case 4:
                    $this->forward('loadfile', 'SisuEsperaParsing');
                    break;
                case 1:
                    $this->forward('loadfile', 'DisciplinaParsing');
                    break;
                case 5:
                    $this->forward('loadfile', 'GradeParsing');
                    break;
                case 6:
                    $this->forward('loadfile', 'PreRequisitoParsing');
                    break;
                case 7:
                    $this->forward('loadfile', 'EADParsing');
                    break;
                case 8:
                    $this->forward('loadfile', 'SisuParsing');
                    break;
                case 9:
                    $this->forward('loadfile', 'CorrigeCPV');
                    break;
                case 10:
                    $this->forward('loadfile', 'ImportCenso');
                    break;
                case 11:
                    $this->forward('loadfile', 'ImportAproveitamento');
                    break;
                case 12:
                    $this->forward('loadfile', 'ImportOferta');
                    break;
            }
        }
    }
    
    public function executeImportOferta(sfWebRequest $request) {
        $upload = TbloadfilePeer::retrieveByPK($request->getParameter('id'));
        $criteria = new Criteria();
        $row = 0;
        $errors = "";

        if (($handle = fopen(sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile(), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 2000, ";")) !== FALSE) {
                if ($row == 0) {
                } else {
                    $temp = new Tboferta();
                    $temp->setIdPeriodo($data[0]);
                    $temp->setCodDisciplina($data[1]);
                    $temp->setTurma($data[2]);
                    $temp->setVagas($data[3]);
                    $temp->setCodCurso($data[4]);
                    $temp->setCodCursoDestino($data[5]);
                    $temp->setIdPolo($data[6]);
                    $temp->setIdMatriculaProf($data[7]);
                    $temp->setIdSituacao(1);
                    $temp->setIdTurno(7);
                    $temp->setIdSala(0);
                    $temp->setIdSetor(16);
//                    $test = TbloadalunoPeer::validateData($temp, $row);

                    try {
                        TbofertaPeer::doInsert($temp);
                    } catch (Exception $ex) {
                        $errors .= $row . $ex->getMessage() . ": Insert error. |||\r\n";
                    }
                }
                $row++;
            }
            fclose($handle);

            if ($errors == "") {
                $this->getUser()->setFlash('notice', 'Alunos Importados para a tabela tboferta.');
            } else {
                $this->getUser()->setFlash('error', $errors);
            }

            $this->redirect('@tbloadfile');
        } else {
            $this->getUser()->setFlash('error', 'Não foi possivel abrir o arquivo: ' . sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile());
            $this->redirect('@tbloadfile');
        }
    }

    /**
     * Processa arquivos de classificados no vestibular nas modalidades de<br>
     * <b>graduação e transferência</b>
     * <br>
     * <b>PROCEDIMENTO:</b> Abre o arquivo no servidor no modo de leitura, e<br>
     * para cada linha, gera a matricula e atribui os valores numa variavel<br>
     * do tipo Tbloadaluno.<br>
     * @param sfWebRequest $request
     */
    public function executeGradTranParsing(sfWebRequest $request) {
        $upload = TbloadfilePeer::retrieveByPK($request->getParameter('id'));
        $criteria = new Criteria();
        $row = 0;
        $errors = "";

        if (($handle = fopen(sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile(), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 2000, ";")) !== FALSE) {
                if ($row == 0) {
//                    $label = array($data[0], $data[1], $data[2], $data[3]);
                } else {
                    $temp = new Tbloadaluno();
                    $temp->setIdTipoIngresso($data[0]);
                    $temp->setIdVersaoCurso($data[1]);
                    $temp->setNome($data[2]);
                    $temp->setSexo($data[3]);
                    $temp->setCpf(str_replace(array('.', '-'), '', '' . $data[4] . ''));
                    $temp->setRg($data[5]);
                    $temp->setRgOrgExped($data[6]);
                    $temp->setMatricula('2012' . $data[8] . (TbcursoversaoPeer::retrieveByPK($data[1])->getCodCurso()) . ($data[7] < 10 ? '0' . $data[7] : $data[7] ));
                    $temp->setIdSituacao($data[8] == 1 ? 0 : 13);
                    $temp->setOpcao($data[9]);
//                    $test = TbloadalunoPeer::validateData($temp, $row);

                    try {
                        $temp = TbalunoPeer::MatriculaCorrige($temp);
                        $temp->setRgOrgExped(mb_strtoupper($temp->getRgOrgExped(), 'UTF-8'));
                        $temp->setNome(mb_strtoupper($temp->getNome(), 'UTF-8'));

                        try {
                            TbloadalunoPeer::doInsert($temp);
                        } catch (Exception $ex) {
                            $errors .= $row . $ex->getMessage() . ": Insert error. |||\r\n";
                        }
                    } catch (Exception $ex) {
                        $errors .= $row . ": String conversion error. |||\r\n";
                        $row++;
                        continue;
                    }
                }
                $row++;
            }
            fclose($handle);

            if ($errors == "") {
                $this->getUser()->setFlash('notice', 'Alunos Importados para a tabela tbloadaluno.');
            } else {
                $this->getUser()->setFlash('error', $errors);
            }

            $this->redirect('@tbloadfile');
        } else {
            $this->getUser()->setFlash('error', 'Não foi possivel abrir o arquivo: ' . sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile());
            $this->redirect('@tbloadfile');
        }
    }

    public function executeImportAproveitamento(sfWebRequest $request) {
        $upload = TbloadfilePeer::retrieveByPK($request->getParameter('id'));
        $criteria = new Criteria();
        $row = 0;
        $errors = "";

        if (($handle = fopen(sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile(), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 2000, ";")) !== FALSE) {
                if ($row == 0) {
                    $matricula = $data[0];
                    $id_periodo = $data[1];
                } else {
                    $temp = new Tbhistorico();
                    $temp->setIdPeriodo($id_periodo);
                    $temp->setMatricula($matricula);
                    $temp->setCodDisciplina($data[0]);
                    $temp->setMedia($data[1]);
                    $temp->setFaltas(0);
                    $temp->setIdConceito(13);
//                    $test = TbloadalunoPeer::validateData($temp, $row);

                    try {
                        TbhistoricoPeer::doInsert($temp);
                    } catch (Exception $ex) {
                        $errors .= $row . $ex->getMessage() . ": Insert error. |||\r\n";
                    }
                }
                $row++;
            }
            fclose($handle);

            if ($errors == "") {
                $this->getUser()->setFlash('notice', 'Alunos Importados para a tabela tbloadaluno.');
            } else {
                $this->getUser()->setFlash('error', $errors);
            }

            $this->redirect('@tbloadfile');
        } else {
            $this->getUser()->setFlash('error', 'Não foi possivel abrir o arquivo: ' . sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile());
            $this->redirect('@tbloadfile');
        }
    }

    /**
     * Processa arquivos de classificados no vestibular nas modalidades de<br>
     * <b>educacao a distancia.</b>
     * <br>
     * <b>PROCEDIMENTO:</b> Abre o arquivo no servidor no modo de leitura, e<br>
     * para cada linha, gera a matricula e atribui os valores numa variavel<br>
     * do tipo Tbloadaluno.<br>
     * @param sfWebRequest $request
     */
    public function executeEADParsing(sfWebRequest $request) {
        $upload = TbloadfilePeer::retrieveByPK($request->getParameter('id'));
        $criteria = new Criteria();
        $row = 0;
        $errors = "";

        if (($handle = fopen(sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile(), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 2000, ";")) !== FALSE) {
                if ($row == 0) {
//                    $label = array($data[0], $data[1], $data[2], $data[3]);
                } else {
                    $temp = new Tbloadaluno();
                    $temp->setIdTipoIngresso($data[0]);
                    $temp->setIdVersaoCurso($data[1]);
                    $temp->setNome($data[2]);
                    $temp->setSexo($data[3]);
                    $temp->setCpf(str_replace(array('.', '-'), '', '' . $data[4] . ''));
                    $temp->setRg($data[5]);
                    $temp->setRgOrgExped($data[6]);
                    $temp->setClassificacao($data[9]);
                    $temp->setMatricula('12011' . $data[7] . (TbcursoversaoPeer::retrieveByPK($data[1])->getCodCurso()) . ($data[9] < 10 ? '0' . $data[9] : $data[9]) . $data[8]);
                    $temp->setIdSituacao($data[7] == 2 ? 0 : 13);
                    $temp->setOpcao($data[10]);
//                    $test = TbloadalunoPeer::validateData($temp, $row);

                    try {
//                        $temp = TbalunoPeer::MatriculaCorrige($temp);
                        $temp->setRgOrgExped(mb_strtoupper($temp->getRgOrgExped(), 'UTF-8'));
                        $temp->setNome(mb_strtoupper($temp->getNome(), 'UTF-8'));

                        try {
                            TbloadalunoPeer::doInsert($temp);
                        } catch (Exception $ex) {
                            $errors .= $row . $ex->getMessage() . ": Insert error. |||\r\n";
                        }
                    } catch (Exception $ex) {
                        $errors .= $row . ": String conversion error. |||\r\n";
                        $row++;
                        continue;
                    }
                }
                $row++;
            }
            fclose($handle);

            if ($errors == "") {
                $this->getUser()->setFlash('notice', 'Alunos Importados para a tabela tbloadaluno.');
            } else {
                $this->getUser()->setFlash('error', $errors);
            }

            $this->redirect('@tbloadfile');
        } else {
            $this->getUser()->setFlash('error', 'Não foi possivel abrir o arquivo: ' . sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile());
            $this->redirect('@tbloadfile');
        }
    }

    /**
     * Processa arquivos de <b>disciplinas</b>
     * <br>
     * @param sfWebRequest $request
     */
    public function executeDisciplinaParsing(sfWebRequest $request) {
        $upload = TbloadfilePeer::retrieveByPK($request->getParameter('id'));
        $row = 0;
        $errors = "";

        if (($handle = fopen(sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile(), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 2000, ";")) !== FALSE) {
                if ($row == 0) {
//                    $label = array($data[0], $data[1], $data[2], $data[3]);
                } else {
                    $temp = new Tbdisciplina();
                    $temp->setCodDisciplina($data[0]);
                    $temp->setDescricao($data[1]);
                    $temp->setSucinto($data[2]);
                    $temp->setInicio($data[3]);
                    $temp->setCh($data[4]);
                    $temp->setChPratica($data[5]);
                    $temp->setChTeorica($data[6]);
                    $temp->setCredPratico($data[7]);
                    $temp->setCredTeorico($data[8]);
                    $temp->setIdSituacao($data[9]);

                    $criteria = new Criteria();
                    $criteria->add(TbdisciplinaPeer::COD_DISCIPLINA, $temp->getCodDisciplina());
                    if (TbdisciplinaPeer::doCount($criteria) > 0) {
                        $errors .= $row . " Duplicado em Tbdisciplina - " . $temp->getCodDisciplina() . "|||\r\n";
                    } else {
                        try {
                            TbdisciplinaPeer::doInsert($temp);
                        } catch (Exception $ex) {
                            $errors .= $row . ": Insert error. |||\r\n";
                        }
                    }
                }
                $row++;
            }
            fclose($handle);

            if ($errors == "") {
                $this->getUser()->setFlash('notice', 'Disciplinas Importadas para a tabela tbdisciplina.');
            } else {
                $this->getUser()->setFlash('error', $errors);
            }
        } else {
            $this->getUser()->setFlash('error', 'Não foi possivel abrir o arquivo: ' . sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile());
        }

        $this->redirect('@tbloadfile');
    }

    /**
     * Processa arquivos de <b>grades curriculares</b>
     * <br>
     * @param sfWebRequest $request
     */
    public function executeGradeParsing(sfWebRequest $request) {
        $upload = TbloadfilePeer::retrieveByPK($request->getParameter('id'));
        $row = 0;
        $errors = "";

        if (($handle = fopen(sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile(), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 2000, ";")) !== FALSE) {
                if ($row == 0) {
//                    $label = array($data[0], $data[1], $data[2], $data[3]);
                } else {
                    $temp = new Tbcurriculodisciplinas();
                    $temp->setIdVersaoCurso($data[0]);
                    $temp->setIdSetor($data[1]);
                    $temp->setCodDisciplina($data[2]);
                    $temp->setSemestreDisciplina($data[3]);
                    $temp->setIdCarater($data[4]);

                    $criteria = new Criteria();
                    $criteria->add(TbcurriculodisciplinasPeer::ID_VERSAO_CURSO, $temp->getIdVersaoCurso());
                    $criteria->addAnd(TbcurriculodisciplinasPeer::COD_DISCIPLINA, $temp->getCodDisciplina());
                    if (TbcurriculodisciplinasPeer::doCount($criteria) > 0) {
                        $errors .= $row . "Duplicado em Tbcurriculodisciplinas. |||\r\n";
                    } else {
                        try {
                            TbcurriculodisciplinasPeer::doInsert($temp);
                        } catch (Exception $ex) {
                            $errors .= $row . ": Insert error. |||\r\n";
                        }
                    }
                }
                $row++;
            }
            fclose($handle);

            if ($errors == "") {
                $this->getUser()->setFlash('notice', 'Grades Importadas para a tabela tbcurriculodisciplinas.');
            } else {
                $this->getUser()->setFlash('error', $errors);
            }
        } else {
            $this->getUser()->setFlash('error', 'Não foi possivel abrir o arquivo: ' . sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile());
        }

        $this->redirect('@tbloadfile');
    }

    /**
     * Processa arquivos de <b>pre-requisitos de disciplinas</b>
     * <br>
     * @param sfWebRequest $request
     */
    public function executePreRequisitoParsing(sfWebRequest $request) {
        $upload = TbloadfilePeer::retrieveByPK($request->getParameter('id'));
        $row = 0;
        $errors = "";

        if (($handle = fopen(sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile(), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 2000, ";")) !== FALSE) {
                if ($row == 0) {
//                    $label = array($data[0], $data[1], $data[2], $data[3]);
                } else {
                    $temp = new Tbdisciplinarequisitos();
                    $temp->setIdVersaoCurso($data[0]);
                    $temp->setCodDisciplina($data[1]);
                    $temp->setCodDiscRequisito($data[2]);

                    try {
                        TbdisciplinarequisitosPeer::doInsert($temp);
                    } catch (Exception $ex) {
                        $errors .= $row . ": Insert error. |||\r\n";
                    }
                }
                $row++;
            }
            fclose($handle);

            if ($errors == "") {
                $this->getUser()->setFlash('notice', 'Pré-requisitos Importados para a tabela tbdisciplinarequisitos.');
            } else {
                $this->getUser()->setFlash('error', $errors);
            }
        } else {
            $this->getUser()->setFlash('error', 'Não foi possivel abrir o arquivo: ' . sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile());
        }

        $this->redirect('@tbloadfile');
    }

    /**
     * Processa arquivos de classificados no <b>vestibular</b>
     * <br>
     * <b>PROCEDIMENTO:</b> Abre o arquivo no servidor no modo de leitura, <br>
     * e para cada linha, atribui os valores numa variavel do tipo <br>
     * Tbloadaluno. Verifica se o item está duplicado na tabela.
     * <br>
     * @param sfWebRequest $request
     */
    public function executeVestibularParsing(sfWebRequest $request) {$upload = TbloadfilePeer::retrieveByPK($request->getParameter('id'));
        $criteria = new Criteria();
        $row = 0;
        $errors = "";

        if (($handle = fopen(sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile(), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 2000, ";")) !== FALSE) {
                if ($row == 0) {
//                    $label = array($data[0], $data[1], $data[2], $data[3]);
                } else {
                    $temp = new Tbalunomatricula();
                    $temp->setIdVersaoCurso($data[0]);
//                    $temp->setClassificacao($data[1]);
                    $temp->setIdTipoIngresso($data[2]);
                    $temp->setNome($data[3]);
                    $cpf = $data[4];
                    while (strlen($cpf) < 11) {
                        $cpf = "0" . $cpf;
                    }
                    $temp->setCpf($cpf);
                    $temp->setDtNascimento($data[5]);
                    $temp->setSexo($data[6]);
                    $temp->setRg($data[7]);
                    $temp->setMae($data[8]);
                    $temp->setNumero($data[9]);
                    $temp->setComplemento($data[10]);
                    $cep = $data[11];
                    $criteria = new Criteria();
                    $criteria->add(TblogradouroPeer::CEP, $cep);
                    if (TblogradouroPeer::doCount($criteria) < 1) {
                        $cep = '69000000';
                    }
                    $temp->setCep($cep);
                    $temp->setFoneResidencial($data[12]);
                    $temp->setCelular($data[13]);
                    $temp->setEmail($data[14]);
                    $temp->setIdSituacao($data[15] == 1 ? 0 : 13);
                    $temp->setMatricula(date('Y') . $data[15] . (TbcursoversaoPeer::retrieveByPK($data[0])->getCodCurso()) . ($data[1] < 10 ? '0' . $data[1] : $data[1] ));
                    $temp->setRgOrgExped($data[16]);
                    $nat_cidade = $data[17];
                    $nat_estado = $data[18];
                    $criteria2 = new Criteria();
                    $criteria2->add(TbestadoPeer::UF, $nat_estado, Criteria::ILIKE);
                    if (TbestadoPeer::doCount($criteria2) < 1) {
                        $temp->setNaturalidade(null);
                    } else {
                        $criteria->clear();
                        $criteria->add(TbcidadePeer::DESCRICAO, $nat_cidade, Criteria::ILIKE);
                        $criteria->add(TbcidadePeer::ID_ESTADO, TbestadoPeer::doSelectOne($criteria2)->getIdEstado());
                        if (TbcidadePeer::doCount($criteria) < 1) {
                            $temp->setNaturalidade(1);
                            $temp->setNacionalidade(1);
                        } else {
                            $temp->setNaturalidade(TbcidadePeer::doSelectOne($criteria)->getIdCidade());
                            $temp->setNacionalidade($temp->getTbcidade()->getIdPais());
                        }
                    }
                    $temp->setIdRaca($data[19]);
//                    $temp->setOpIngresso($data[20]);
                    $temp->setIdPolo($data[20]);

                    try {
                        $temp = TbalunomatriculaPeer::MatriculaCorrige($temp);

                        try {
                            TbalunomatriculaPeer::doInsert($temp);
                        } catch (Exception $ex) {
                            $errors .= $row . $ex->getMessage() . ": Insert error. |||\r\n";
                        }
                    } catch (Exception $ex) {
                        $errors .= $row . ": String conversion error. |||\r\n";
                        $row++;
                        continue;
                    }
                }
                $row++;
            }
            //... explicar � mesmo necess�rio?
            fclose($handle);

            if ($errors == "") {
                $this->getUser()->setFlash('notice', 'Alunos Importados para a tabela Tbalunomatricula.');
            } else {
                $this->getUser()->setFlash('error', $errors);
            }

            $this->redirect('@tbloadfile');
        } else {
            $this->getUser()->setFlash('error', 'Não foi possivel abrir o arquivo: ' . sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile());
            $this->redirect('@tbloadfile');
        }
    }

    /**
     * Processa arquivos de classificados no vestibular para a <b>lista de espera</b>
     * <br>
     * <b>PROCEDIMENTO:</b> Abre o arquivo no servidor no modo de leitura, <br>
     * e para cada linha, atribui os valores numa variavel do tipo <br>
     * Tbloadaluno.
     * <br>
     * @param sfWebRequest $request
     */
    public function executeListaEsperaParsing(sfWebRequest $request) {
        $upload = TbloadfilePeer::retrieveByPK($request->getParameter('id'));
        $criteria = new Criteria();
        $row = 0;
        $errors = "";

        if (($handle = fopen(sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile(), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 2000, ";")) !== FALSE) {
                if ($row == 0) {
//                    $label = array($data[0], $data[1], $data[2], $data[3]);
                } else {
                    $temp = new Tbloadaluno();
                    $temp->setIdTipoIngresso($data[0]);
                    $temp->setIdVersaoCurso($data[1]);
                    $temp->setNome($data[2]);
                    $temp->setSexo($data[3]);
                    $temp->setCpf(str_replace(array('.', '-'), '', '' . $data[4] . ''));
                    $temp->setRg($data[5]);
                    $temp->setRgOrgExped($data[6]);
                    $temp->setMatricula('2011' . $data[8] . (TbcursoversaoPeer::retrieveByPK($data[1])->getCodCurso()) . ($data[7] < 10 ? '0' . $data[7] : $data[7] ));
                    $temp->setClassificacao($data[7]);
                    $temp->setOpcao($data[9]);
                    $temp->setIdSituacao($data[8] == 1 ? 0 : 13);
//                    $test = TbloadalunoPeer::validateData($temp, $row);

                    try {
                        $temp = TbalunoPeer::MatriculaCorrige($temp);
                        $temp->setRgOrgExped(mb_strtoupper($temp->getRgOrgExped(), 'UTF-8'));
                        $temp->setNome(mb_strtoupper($temp->getNome(), 'UTF-8'));

                        try {
                            TbloadalunoPeer::doInsert($temp);
                        } catch (Exception $ex) {
                            $errors .= $row . $ex->getMessage() . ": Insert error. |||\r\n";
                        }
                    } catch (Exception $ex) {
                        $errors .= $row . ": String conversion error. |||\r\n";
                        $row++;
                        continue;
                    }
                }
                $row++;
            }
            //... explicar � mesmo necess�rio?
            fclose($handle);

            if ($errors == "") {
                $this->getUser()->setFlash('notice', 'Alunos Importados para a tabela tbloadaluno.');
            } else {
                $this->getUser()->setFlash('error', $errors);
            }

            $this->redirect('@tbloadfile');
        } else {
            $this->getUser()->setFlash('error', 'Não foi possivel abrir o arquivo: ' . sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile());
            $this->redirect('@tbloadfile');
        }
    }

    /**
     * Processa arquivos de classificados no ENEM SISU para a <b>lista de espera</b>
     * <br>
     * <b>PROCEDIMENTO:</b> Abre o arquivo no servidor no modo de leitura, <br>
     * e para cada linha, atribui os valores numa variavel do tipo <br>
     * Tbloadaluno.
     * <br>
     * @param sfWebRequest $request
     */
    public function executeSisuEsperaParsing(sfWebRequest $request) {
        $upload = TbloadfilePeer::retrieveByPK($request->getParameter('id'));
        $criteria = new Criteria();
        $row = 0;
        $errors = "";

        if (($handle = fopen(sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile(), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 2000, ";")) !== FALSE) {
                if ($row == 0) {
//                    $label = array($data[0], $data[1], $data[2], $data[3]);
                } else {
                    $temp = new Tbloadaluno();
                    $temp->setIdTipoIngresso($data[0]);
                    $temp->setIdVersaoCurso($data[1]);
                    $temp->setClassificacao($data[2]);
                    $temp->setNome($data[3]);
                    $temp->setSexo($data[4]);
                    $temp->setRg($data[5]);
                    $temp->setRgOrgExped($data[6]);
                    $temp->setIdSituacao($data[7] == 1 ? 0 : 13);
                    $cpf = $data[8];
                    while (strlen($cpf) < 11) {
                        $cpf = "0" . $cpf;
                    }
                    $temp->setCpf($cpf);
                    $temp->setOpcao('ESPERA');
                    $temp->setProcesso('SISU-2012');
                    $temp->setMatricula('2012' . $data[7] . (TbcursoversaoPeer::retrieveByPK($data[1])->getCodCurso()) . ($data[2] < 10 ? '0' . $data[2] : $data[2] ));

                    try {
                        $temp = TbalunoPeer::MatriculaCorrige($temp);

                        try {
                            TbloadalunoPeer::doInsert($temp);
                        } catch (Exception $ex) {
                            $errors .= $row . $ex->getMessage() . ": Insert error. |||\r\n";
                        }
                    } catch (Exception $ex) {
                        $errors .= $row . ": String conversion error. |||\r\n";
                        $row++;
                        continue;
                    }
                }
                $row++;
            }
            //... explicar � mesmo necess�rio?
            fclose($handle);

            if ($errors == "") {
                $this->getUser()->setFlash('notice', 'Alunos Importados para a tabela tbloadaluno.');
            } else {
                $this->getUser()->setFlash('error', $errors);
            }

            $this->redirect('@tbloadfile');
        } else {
            $this->getUser()->setFlash('error', 'Não foi possivel abrir o arquivo: ' . sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile());
            $this->redirect('@tbloadfile');
        }
    }

    /**
     * Processa arquivos de classificados no ENEM SISU para a <b>lista de espera</b>
     * <br>
     * <b>PROCEDIMENTO:</b> Abre o arquivo no servidor no modo de leitura, <br>
     * e para cada linha, atribui os valores numa variavel do tipo <br>
     * Tbloadaluno.
     * <br>
     * @param sfWebRequest $request
     */
    public function executeSisuParsing(sfWebRequest $request) {
        $upload = TbloadfilePeer::retrieveByPK($request->getParameter('id'));
        $criteria = new Criteria();
        $row = 0;
        $errors = "";

        if (($handle = fopen(sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile(), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 2000, ";")) !== FALSE) {
                if ($row == 0) {
//                    $label = array($data[0], $data[1], $data[2], $data[3]);
                } else {
                    $temp = new Tbalunomatricula();
                    $temp->setIdVersaoCurso($data[0]);
//                    $temp->setClassificacao($data[1]);
                    $temp->setIdTipoIngresso($data[2]);
                    $temp->setNome($data[3]);
                    $cpf = $data[4];
                    while (strlen($cpf) < 11) {
                        $cpf = "0" . $cpf;
                    }
                    $temp->setCpf($cpf);
                    $temp->setDtNascimento($data[5]);
                    $temp->setSexo($data[6]);
                    $temp->setRg($data[7]);
                    $temp->setMae($data[8]);
                    $temp->setNumero($data[9]);
                    $temp->setComplemento($data[10]);
                    $cep = $data[11];
                    $criteria = new Criteria();
                    $criteria->add(TblogradouroPeer::CEP, $cep);
                    if (TblogradouroPeer::doCount($criteria) < 1) {
                        $cep = '69000000';
                    }
                    $temp->setCep($cep);
                    $temp->setFoneResidencial($data[12]);
                    $temp->setCelular($data[13]);
                    $temp->setEmail($data[14]);
                    $temp->setIdSituacao($data[15] == 1 ? 0 : 13);
                    $temp->setMatricula('2013' . $data[15] . (TbcursoversaoPeer::retrieveByPK($data[0])->getCodCurso()) . ($data[1] < 10 ? '0' . $data[1] : $data[1] ));

                    try {
                        $temp = TbalunomatriculaPeer::MatriculaCorrige($temp);

                        try {
                            TbalunomatriculaPeer::doInsert($temp);
                        } catch (Exception $ex) {
                            $errors .= $row . $ex->getMessage() . ": Insert error. |||\r\n";
                        }
                    } catch (Exception $ex) {
                        $errors .= $row . ": String conversion error. |||\r\n";
                        $row++;
                        continue;
                    }
                }
                $row++;
            }
            //... explicar � mesmo necess�rio?
            fclose($handle);

            if ($errors == "") {
                $this->getUser()->setFlash('notice', 'Alunos Importados para a tabela Tbalunomatricula.');
            } else {
                $this->getUser()->setFlash('error', $errors);
            }

            $this->redirect('@tbloadfile');
        } else {
            $this->getUser()->setFlash('error', 'Não foi possivel abrir o arquivo: ' . sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile());
            $this->redirect('@tbloadfile');
        }
    }

    public function executeCorrigeCPV(sfWebRequest $request) {
        $upload = TbloadfilePeer::retrieveByPK($request->getParameter('id'));
        $criteria = new Criteria();
        $row = 0;
        $errors = "";

        if (($handle = fopen(sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile(), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 2000, ";")) !== FALSE) {
                $criteria->clear();
                if ($row == 0) {
//                    $label = array($data[0], $data[1], $data[2], $data[3]);
                } else {
                    $criteria->add(TbloadalunoPeer::NOME, $data[0], Criteria::LIKE);
                    if (TbloadalunoPeer::doCount($criteria) > 0) {

                        $load = new Tbloadaluno();
                        $load = TbloadalunoPeer::doSelectOne($criteria);

                        $cpf = str_replace(array('.', '-'), '', '' . $data[1] . '');
                        while (strlen($cpf) < 11) {
                            $cpf = "0" . $cpf;
                        }

                        $load->setCpf($cpf);

                        try {
                            $load->save();
                        } catch (Exception $ex) {
                            $errors .= $row . ": Could not save. ";
                            $row++;
                            continue;
                        }
                    } else {
                        $errors .= $row . ": Not Found. ";
                    }
                }
                $row++;
            }
            //... explicar � mesmo necess�rio?
            fclose($handle);

            if ($errors == "") {
                $this->getUser()->setFlash('notice', 'Alunos Importados para a tabela tbloadaluno.');
            } else {
                $this->getUser()->setFlash('error', $errors);
            }

            $this->redirect('@tbloadfile');
        } else {
            $this->getUser()->setFlash('error', 'Não foi possivel abrir o arquivo: ' . sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile());
            $this->redirect('@tbloadfile');
        }
    }

    public function executeImportCenso(sfWebRequest $request) {
        $upload = TbloadfilePeer::retrieveByPK($request->getParameter('id'));
        $row = 0;
        $last = '';
        $errors = "";

        if (($handle = fopen(sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile(), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 2000, "|")) !== FALSE) {
                $row++;
                if ($data[0] == '41') {
                    $aluno = new Censo2009();

                    if ('' != ($data[0])) $aluno->setAlunoC1($data[0]);
                    if ('' != ($data[1])) $aluno->setAlunoC2($data[1]);
                    if ('' != ($data[2])) $aluno->setAlunoC3($data[2]);
                    if ('' != ($data[3])) $aluno->setAlunoC4Nome($data[3]);
                    if ('' != ($data[4])) $aluno->setAlunoC5Cpf($data[4]);
                    if ('' != ($data[5])) $aluno->setAlunoC6DocEstrangeiro($data[5]);
                    if ('' != ($data[6])) $aluno->setAlunoC7Nascimento($data[6]);
                    if ('' != ($data[7])) $aluno->setAlunoC8Sexo($data[7]);
                    if ('' != ($data[8])) $aluno->setAlunoC9CorRaca($data[8]);
                    if ('' != ($data[9])) $aluno->setAlunoC10Mae($data[9]);
                    if ('' != ($data[10])) $aluno->setAlunoC11Nacionalidade($data[10]);
                    if ('' != ($data[11])) $aluno->setAlunoC12UfNascimento($data[11]);
                    if ('' != ($data[12])) $aluno->setAlunoC13CidadeNascimento($data[12]);
                    if ('' != ($data[13])) $aluno->setAlunoC14PaisOrigem($data[13]);
                    if ('' != ($data[14])) $aluno->setAlunoC15Deficiencia($data[14]);
                    if ('' != ($data[15])) $aluno->setAlunoC16DefCegueria($data[15]);
                    if ('' != ($data[16])) $aluno->setAlunoC17DefBaixaVisao($data[16]);
                    if ('' != ($data[17])) $aluno->setAlunoC18DefSurdez($data[17]);
                    if ('' != ($data[18])) $aluno->setAlunoC19DefAuditiva($data[18]);
                    if ('' != ($data[19])) $aluno->setAlunoC20DefFisica($data[19]);
                    if ('' != ($data[20])) $aluno->setAlunoC21DefSurdocegueira($data[20]);
                    if ('' != ($data[21])) $aluno->setAlunoC22DefMultipla($data[21]);
                    if ('' != ($data[22])) $aluno->setAlunoC23DefMental($data[22]);
                    if ('' != ($data[23])) $aluno->setAlunoC24($data[23]);
                    if ('' != ($data[24])) $aluno->setAlunoC25($data[24]);
                    if ('' != ($data[25])) $aluno->setAlunoC26($data[25]);
                    if ('' != ($data[26])) $aluno->setAlunoC27($data[26]);
                    if ('' != ($data[27])) $aluno->setAlunoC28($data[27]);

                    $aluno->setExportado(false);
                    $aluno->save();
                    $last = $aluno->getAlunoC2();
                } else if ($data[0] == '42') {
                    $vinculo = new Censo2009();

                    if ('' != ($data[0])) $vinculo->setCursoC1TipoReg2($data[0]);
                    if ('' != ($data[1])) $vinculo->setCursoC51($data[1]);
                    if ('' != ($data[2])) $vinculo->setCursoC2IdInepCurso($data[2]);
                    if ('' != ($data[3])) $vinculo->setCursoC3CodPoloInep($data[3]);
                    if ('' != ($data[4])) $vinculo->setCursoC4TurnoAluno($data[4]);
                    if ('' != ($data[5])) $vinculo->setCursoC5SituacaoVinculo($data[5]);
                    if ('' != ($data[6])) $vinculo->setCursoC52($data[6]);
                    if ('' != ($data[7])) $vinculo->setCursoC49SemestreConclusao($data[7]);
                    if ('' != ($data[8])) $vinculo->setCursoC50AlunoParfor($data[8]);
                    if ('' != ($data[9])) $vinculo->setCursoC61($data[9]);
                    if ('' != ($data[10])) $vinculo->setCursoC7AlunoPublica($data[10]);
                    if ('' != ($data[11])) $vinculo->setCursoC8FormaIngressoSelecaoVestibular($data[11]);
                    if ('' != ($data[12])) $vinculo->setCursoC9FormaIngressoSelecaoEnem($data[12]);
                    if ('' != ($data[13])) $vinculo->setCursoC53($data[13]);
                    if ('' != ($data[14])) $vinculo->setCursoC62($data[14]);
                    if ('' != ($data[15])) $vinculo->setCursoC11FormaIngressoSelecaoPecg($data[15]);
                    if ('' != ($data[16])) $vinculo->setCursoC54($data[16]);
                    if ('' != ($data[17])) $vinculo->setCursoC55($data[17]);
                    if ('' != ($data[18])) $vinculo->setCursoC63($data[18]);
                    if ('' != ($data[19])) $vinculo->setCursoC64($data[19]);
                    if ('' != ($data[20])) $vinculo->setCursoC56($data[20]);
                    if ('' != ($data[21])) $vinculo->setCursoC57($data[21]);
                    if ('' != ($data[22])) $vinculo->setCursoC58($data[22]);
                    if ('' != ($data[23])) $vinculo->setCursoC59($data[23]);
                    if ('' != ($data[24])) $vinculo->setCursoC60($data[24]);
                    if ('' != ($data[25])) $vinculo->setCursoC13ProgramaReservaVagas($data[25]);
                    if ('' != ($data[26])) $vinculo->setCursoC14ProgramaReservaVagas($data[26]);
                    if ('' != ($data[27])) $vinculo->setCursoC15ProgramaReservaVagas($data[27]);
                    if ('' != ($data[28])) $vinculo->setCursoC16ProgramaReservaVagas($data[28]);
                    if ('' != ($data[29])) $vinculo->setCursoC17ProgramaReservaVagas($data[29]);
                    if ('' != ($data[30])) $vinculo->setCursoC18ProgramaReservaVagas($data[30]);
                    if ('' != ($data[31])) $vinculo->setCursoC19FinanciamentoEstudantil($data[31]);
                    if ('' != ($data[32])) $vinculo->setCursoC20FinanciamentoEstudantil($data[32]);
                    if ('' != ($data[33])) $vinculo->setCursoC21FinanciamentoEstudantil($data[33]);
                    if ('' != ($data[34])) $vinculo->setCursoC22FinanciamentoEstudantil($data[34]);
                    if ('' != ($data[35])) $vinculo->setCursoC23FinanciamentoEstudantil($data[35]);
                    if ('' != ($data[36])) $vinculo->setCursoC24FinanciamentoEstudantil($data[36]);
                    if ('' != ($data[37])) $vinculo->setCursoC26FinanciamentoEstudantilNReemb($data[37]);
                    if ('' != ($data[38])) $vinculo->setCursoC27FinanciamentoEstudantilNReemb($data[38]);
                    if ('' != ($data[39])) $vinculo->setCursoC28FinanciamentoEstudantilNReemb($data[39]);
                    if ('' != ($data[40])) $vinculo->setCursoC29FinanciamentoEstudantilNReemb($data[40]);
                    if ('' != ($data[41])) $vinculo->setCursoC30FinanciamentoEstudantilNReemb($data[41]);
                    if ('' != ($data[42])) $vinculo->setCursoC31FinanciamentoEstudantilNReemb($data[42]);
                    if ('' != ($data[43])) $vinculo->setCursoC33ApoioSocial($data[43]);
                    if ('' != ($data[44])) $vinculo->setCursoC34TipoApoioSocial($data[44]);
                    if ('' != ($data[45])) $vinculo->setCursoC35TipoApoioSocial($data[45]);
                    if ('' != ($data[46])) $vinculo->setCursoC36TipoApoioSocial($data[46]);
                    if ('' != ($data[47])) $vinculo->setCursoC37TipoApoioSocial($data[47]);
                    if ('' != ($data[48])) $vinculo->setCursoC38TipoApoioSocial($data[48]);
                    if ('' != ($data[49])) $vinculo->setCursoC39TipoApoioSocial($data[49]);
                    if ('' != ($data[50])) $vinculo->setCursoC40AtividadeComplementar($data[50]);
                    if ('' != ($data[51])) $vinculo->setCursoC41AtividadeComplementar($data[51]);
                    if ('' != ($data[52])) $vinculo->setCursoC42Bolsa($data[52]);
                    if ('' != ($data[53])) $vinculo->setCursoC43AtividadeComplementar($data[53]);
                    if ('' != ($data[54])) $vinculo->setCursoC44Bolsa($data[54]);
                    if ('' != ($data[55])) $vinculo->setCursoC45AtividadeComplementar($data[55]);
                    if ('' != ($data[56])) $vinculo->setCursoC46Bolsa($data[56]);
                    if ('' != ($data[57])) $vinculo->setCursoC47AtividadeComplementar($data[57]);
                    if ('' != ($data[58])) $vinculo->setCursoC48Bolsa($data[58]);
                    //if ('' != ($data[58])) $vinculo->($data[58]);


                    $vinculo->setExportado(false);
                    $vinculo->setAlunoC2($last);
                    $vinculo->save();
                }
            }
            //... explicar � mesmo necess�rio?
            fclose($handle);

            if ($errors == "") {
                $this->getUser()->setFlash('notice', 'Dados Importados para a tabela do censo.');
            } else {
                $this->getUser()->setFlash('error', $errors);
            }

            $this->redirect('@tbloadfile');
        } else {
            $this->getUser()->setFlash('error', 'Não foi possivel abrir o arquivo: ' . sfConfig::get('sf_upload_dir') . '/files/' . $upload->getfile());
            $this->redirect('@tbloadfile');
        }
    }

}
