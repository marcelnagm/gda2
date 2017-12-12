<?php

/**
 * Radacct filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseRadacctFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'acctsessionid'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'acctuniqueid'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'username'             => new sfWidgetFormFilterInput(),
      'groupname'            => new sfWidgetFormFilterInput(),
      'realm'                => new sfWidgetFormFilterInput(),
      'nasipaddress'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nasportid'            => new sfWidgetFormFilterInput(),
      'nasporttype'          => new sfWidgetFormFilterInput(),
      'acctstarttime'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'acctstoptime'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'acctsessiontime'      => new sfWidgetFormFilterInput(),
      'acctauthentic'        => new sfWidgetFormFilterInput(),
      'connectinfo_start'    => new sfWidgetFormFilterInput(),
      'connectinfo_stop'     => new sfWidgetFormFilterInput(),
      'acctinputoctets'      => new sfWidgetFormFilterInput(),
      'acctoutputoctets'     => new sfWidgetFormFilterInput(),
      'calledstationid'      => new sfWidgetFormFilterInput(),
      'callingstationid'     => new sfWidgetFormFilterInput(),
      'acctterminatecause'   => new sfWidgetFormFilterInput(),
      'servicetype'          => new sfWidgetFormFilterInput(),
      'xascendsessionsvrkey' => new sfWidgetFormFilterInput(),
      'framedprotocol'       => new sfWidgetFormFilterInput(),
      'framedipaddress'      => new sfWidgetFormFilterInput(),
      'acctstartdelay'       => new sfWidgetFormFilterInput(),
      'acctstopdelay'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'acctsessionid'        => new sfValidatorPass(array('required' => false)),
      'acctuniqueid'         => new sfValidatorPass(array('required' => false)),
      'username'             => new sfValidatorPass(array('required' => false)),
      'groupname'            => new sfValidatorPass(array('required' => false)),
      'realm'                => new sfValidatorPass(array('required' => false)),
      'nasipaddress'         => new sfValidatorPass(array('required' => false)),
      'nasportid'            => new sfValidatorPass(array('required' => false)),
      'nasporttype'          => new sfValidatorPass(array('required' => false)),
      'acctstarttime'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'acctstoptime'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'acctsessiontime'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'acctauthentic'        => new sfValidatorPass(array('required' => false)),
      'connectinfo_start'    => new sfValidatorPass(array('required' => false)),
      'connectinfo_stop'     => new sfValidatorPass(array('required' => false)),
      'acctinputoctets'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'acctoutputoctets'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'calledstationid'      => new sfValidatorPass(array('required' => false)),
      'callingstationid'     => new sfValidatorPass(array('required' => false)),
      'acctterminatecause'   => new sfValidatorPass(array('required' => false)),
      'servicetype'          => new sfValidatorPass(array('required' => false)),
      'xascendsessionsvrkey' => new sfValidatorPass(array('required' => false)),
      'framedprotocol'       => new sfValidatorPass(array('required' => false)),
      'framedipaddress'      => new sfValidatorPass(array('required' => false)),
      'acctstartdelay'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'acctstopdelay'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('radacct_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Radacct';
  }

  public function getFields()
  {
    return array(
      'radacctid'            => 'Number',
      'acctsessionid'        => 'Text',
      'acctuniqueid'         => 'Text',
      'username'             => 'Text',
      'groupname'            => 'Text',
      'realm'                => 'Text',
      'nasipaddress'         => 'Text',
      'nasportid'            => 'Text',
      'nasporttype'          => 'Text',
      'acctstarttime'        => 'Date',
      'acctstoptime'         => 'Date',
      'acctsessiontime'      => 'Number',
      'acctauthentic'        => 'Text',
      'connectinfo_start'    => 'Text',
      'connectinfo_stop'     => 'Text',
      'acctinputoctets'      => 'Number',
      'acctoutputoctets'     => 'Number',
      'calledstationid'      => 'Text',
      'callingstationid'     => 'Text',
      'acctterminatecause'   => 'Text',
      'servicetype'          => 'Text',
      'xascendsessionsvrkey' => 'Text',
      'framedprotocol'       => 'Text',
      'framedipaddress'      => 'Text',
      'acctstartdelay'       => 'Number',
      'acctstopdelay'        => 'Number',
    );
  }
}
