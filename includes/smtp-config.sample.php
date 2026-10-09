<?php
/* SMTP login for the catalog form (send-catalog.php).
   Copy this file to smtp-config.php in the same folder ON THE SERVER and fill in
   the real password. smtp-config.php is ignored by git so the password never
   goes to GitHub.
   Uses the same Gmail account as the nails inquiry form: 'pass' is the Google
   App Password (16 letters), not the normal Gmail password. */
return [
    'host' => 'smtp.gmail.com',
    'port' => 587,                       // 587 = STARTTLS
    'user' => 'contact@tya.one',
    'pass' => 'YOUR-GOOGLE-APP-PASSWORD',
    'from' => 'contact@tya.one',         // Gmail requires this to match 'user'
];
