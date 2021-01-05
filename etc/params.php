<?php
return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
];

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock;dbname=middleware',
    'username' => 'middleware',
    'password' => 'middleware',
    'charset' => 'utf8mb4',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];