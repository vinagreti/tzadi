<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('../config/mongo.conf.php');
# The file included Set these vars
//$config['mongo_host'] = "";
//$config['mongo_db'] = "";
//$config['mongo_user'] = "";
//$config['mongo_pass'] = "";

// Generally will be 27017 unless you've configured Mongo otherwise
$config['mongo_port'] = 27017;

// Persistant connections
$config['mongo_persist'] = TRUE;
$config['mongo_persist_key'] = 'tzd_mongo_persist';

// Get results as an object instead of an array
$config['mongo_return'] = 'array'; // Set to object

// When you run an insert/update/delete how sure do you want to be that the database has received the query?
// safe = the database has receieved and executed the query
// fysnc = as above + the change has been committed to harddisk <- NOTE: will introduce a performance penalty
$config['mongo_query_safety'] = 'safe';

// Supress connection error password display
$config['mongo_supress_connect_error'] = FALSE;

// If you are having problems connecting try changing this to TRUE
$config['host_db_flag'] = TRUE;