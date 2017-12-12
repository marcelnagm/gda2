<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfPropelPlugin');
    $this->enablePlugins('sfJqueryReloadedPlugin');
    $this->enablePlugins('sfGuardPlugin');
    $this->enablePlugins('sfFormExtraPlugin');
    #$this->enablePlugins('sfPhpExcelPlugin');
    $this->enablePlugins('dcPropelReportsPlugin');
    $this->enablePlugins('sfPrototypePlugin');
    $this->enablePlugins('sfCaptchaGDPlugin');
    $this->enablePlugins('sfPaginationPlugin');
  }
}
