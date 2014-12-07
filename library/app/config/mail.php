<?php

return array(


	'driver' => 'smtp',


	'host' => 'smtp.gmail.com',


	'port' => 587,


	'from' => array('address' => 'authapp@naszaksiegarniaaimsi.com', 'name' => 'Nasza ksiegarnia aimsi'),


	'encryption' => 'tls',


	'username' => 'nasza.ksiegarnia.aimsi@gmail.com',


	'password' => 'aimsi123',


	'sendmail' => '/usr/sbin/sendmail -bs',


	'pretend' => false,

);
