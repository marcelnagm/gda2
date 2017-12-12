<?php

//header('HTTP/1.0 401 Unauthorized',true,401);

echo json_encode(array(
'error'       => array(
        'code'      => '401',
        'message'   => 'Unauthorized',
))) ?>
