<?php
use_helper('I18N');
use_helper('jQuery');
use_stylesheet('/sfPropelPlugin/css/default.css');
use_stylesheet('/sfPropelPlugin/css/global.css');
?>
<h2><?php echo $title; ?></h2>

<table>
    <tbody>
        <?php foreach ($fields as $field): ?>
        <?php $value = $tbaluno->__call('get' . $field, array()); ?>
                <tr>
                    <td>
                <?php echo TbalunomatriculaPeer::getFieldLabel($field); ?>
            </td>
            <td>
        <?php if (isset($value)) {
                echo isset ($special_fields[$field]) ? $special_fields[$field] : $value ;
            } else {
                echo 'EM BRANCO';
            } ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>