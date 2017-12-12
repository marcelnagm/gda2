<?php

/**
 * Use a simple select in a filter instead of a raw input text.
 * Indeed the actual behaviour for a input inside a filter is to generate this
 * kind of name : name="grr_ticket_filters[login][text]" but if you switch to
 * a select the name is not the quite the same : name="grr_ticket_filters[login]"
 * and is not taken in account by the "class ???" that handle the filter to build
 * the query.
 *
 * Michael Courcy michael.courcy@gmail.com
 */
class sfWidgetFormFilterSelect extends sfWidgetFormSelect
{
  
  /**
   * @param  string $name        The element name
   * @param  string $value       The value selected in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    if ($this->getOption('multiple'))
    {
      $attributes['multiple'] = 'multiple';

      if ('[]' != substr($name, -2))
      {
        $name .= '[]';
      }
    }

    $choices = $this->getChoices();

    return $this->renderContentTag('select', "\n".implode("\n", $this->getOptionsForSelect($value, $choices))."\n", array_merge(array('name' => $name.'[text]'), $attributes));
  }


}
