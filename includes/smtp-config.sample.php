<?php
/* SMTP login for the catalog form (send-catalog.php).
   Copy this file to smtp-config.php in the same folder ON THE SERVER and fill in
   the real password. smtp-config.php is ignored by git so the password never
   goes to GitHub. Hostinger: smtp.hostinger.com, port 465. */
return [
    'host' => 'smtp.hostinger.com',
    'port' => 465,                       // 465 = SSL, 587 = TLS
    'user' => 'catalog@tyallc.com',      // full mailbox address
    'pass' => 'YOUR-MAILBOX-PASSWORD',
    'from' => 'catalog@tyallc.com',      // usually the same as 'user'
];
