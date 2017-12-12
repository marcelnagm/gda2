<h2><?php echo $title; ?></h2>

<table>
    <tbody>
        <?php foreach ($fields as $field): ?>
        <?php $value = $tbaluno->__call('get' . $field, array()); ?>
        <?php if (isset($value)): ?>
                <tr>
                    <td>
                <?php echo $field; ?>
            </td>
            <td>
                <?php echo isset ($special_fields[$field]) ? $special_fields[$field] : $value ; ?>
            </td>
        </tr>
        <?php endif; ?>        
        <?php endforeach; ?>
    </tbody>

</table>
