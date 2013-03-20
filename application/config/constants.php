<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
|--------------------------------------------------------------------------
| TZADI Products - dynamic paths
|--------------------------------------------------------------------------
|
| define the path to the aplication relative to the environment
|
*/

switch (ENVIRONMENT) {

  case 'production':

    define('TZADI_PATH', 'http://tzadi.com/'); // define o local da aplicação tzadi
    define('TASK_PATH', 'http://task.tzadi.com/'); // define o ocal da aplicação task
    define('AGENCY_PATH', 'http://agency.tzadi.com/'); // define o local da aplicação agency

  break;

  case 'staging':

    define('TZADI_PATH', 'http://staging.tzadi.com/'); // define o local da aplicação tzadi
    define('TASK_PATH', 'http://taskstaging.tzadi.com/'); // define o ocal da aplicação task
    define('AGENCY_PATH', 'http://agencystaging.tzadi.com/'); // define o local da aplicação agency

  break;

  default:
    $host = "http://".$_SERVER["HTTP_HOST"];
    define('TZADI_PATH', "$host/tzadi"); // define o local da aplicação tzadi
    define('TASK_PATH', "$host/task"); // define o ocal da aplicação task
    define('AGENCY_PATH', "$host/agency"); // define o local da aplicação agency

  break;

}

/*
|--------------------------------------------------------------------------
| TZADI LANGUAGE - dynamic languege
|--------------------------------------------------------------------------
|
| define the path to the aplication relative to the environment
|
*/

$language = explode(';',$_SERVER["HTTP_ACCEPT_LANGUAGE"]);

$language = explode('-', $language[0]);

$language = explode(',', $language[0]);

switch ($language[0]) {

  case 'pt':

    $language = 'pt-BR';
    define('LANGUAGE', "pt-BR"); // DEFINE A VARIAVEL GLOBAL LANGUAGE PARA SER UTILIZADA NO

    break;

  default:

    $language = 'english';
    define('LANGUAGE', "english"); // DEFINE A VARIAVEL GLOBAL LANGUAGE PARA SER UTILIZADA NO

    break;

}


/* End of file constants.php */
/* Location: ./application/config/constants.php */