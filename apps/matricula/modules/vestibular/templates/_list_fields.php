<div class="lista">
    <?php if($list->count()): ?>
      Quantidade: <?php echo $list->count() ?>
    <table>
        <thead>
            <tr>
                    <?php foreach($show_fields as $field_key): ?>
                <th><?php echo $field_key ?></th>
                    <?php endforeach ?>
            </tr>
        </thead>

            <?php

            foreach ($list as $object):
                $even = @$i++ % 2;
                ?>
        <tbody>
            <tr class="row-<?php echo $even ?>">
                        <?php foreach($show_fields as $field_key): ?>
                <td>
                                <?php
                                $value = $object->__call('get'.$field_key,array());
                                if(is_array($value) || $value instanceof sfOutputEscaperArrayDecorator) {
                                    foreach($value as $v)
                                        echo $v.',<br/>';
                                } else {
                                    echo $value;
                                }
                                ?>
                </td>
                        <?php endforeach ?>
            </tr>
                <?php endforeach ?>
        </tbody>
    </table>
    <?php else: ?>
    Nenhum registro
    <?php endif ?>
</div>