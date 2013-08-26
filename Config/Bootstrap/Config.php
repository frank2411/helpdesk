<?php

  //Constants to build up db connection
  define('DESK_HOST','localhost');
  define('DESK_USERNAME','francesco');
  define('DESK_DBPASSWD','admin');
  define('DESK_DBNAME','help_desk_db');
  
  /*Hacks to include the Personal And Helpers folder with include path*/
  define("APPLICATION_PATH",realpath("../helpdesk/Personal"));  
  define("HELPERS_PATH",realpath("../helpdesk/Personal/Helpers"));  
  define("HELPERS_PATH",realpath("../helpdesk/Personal/Widgets"));  
  define("CURRENT_PATH",getcwd());//get current working directory
?>
