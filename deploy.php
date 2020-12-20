<?php

// The secret token to add as a GitHub or GitLab secret, or otherwise as https://www.example.com/?token=secret-token
// --> https://randomkeygen.com/
define("TOKEN", "9EDA37B7285AC2EF2DA6B9A2684EA");                                       

// The SSH URL to your repository
define("REMOTE_REPOSITORY", "git@github.com:<your_username>/<your_repo>.git"); 

// The path to your repostiroy; this must begin with a forward slash (/)
define("DIR", "auto-deploy/");                          

// The branch route
define("BRANCH", "refs/heads/master");                                 

// The name of the file you want to log to.
define("LOGFILE", "deploy.log");                                       

// The path to the git executable
define("GIT", "/usr/bin/git");                                         

// Override for PHP's max_execution_time (may need set in php.ini)
define("MAX_EXECUTION_TIME", 180);                                     

// A command to execute before pulling
define("BEFORE_PULL", "");                                             

// A command to execute after successfully pulling
define("AFTER_PULL", "");                                              

require_once("deployer.php");
