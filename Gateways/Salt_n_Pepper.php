<?php
/**
 * Drew Rife and Zachary Thompson
 *
 * manages hashing passwords and checking those hashed passwords
 */
require_once ('UsersGateway.php');

  /**
   * hashes the password passed in
   *
   * passwordHasher takes a flag of 'insert' or 'update' to indicate what function in the UsersGateway to call
   * ************ PASSWORD_DefAUlt automatically adds a salt to the hashed password ************
   * @param  $username
   * @param  $password
   * @param  $flag
   * @return true if function executed correctly, false if code doesn't execute correctly or wrong flag sent
   */
  function passwordHasher($username, $password, $flag)
  {
    if(strcasecmp($flag, 'insert') == 0)
    {
      return (UsersGateway::insert($username, password_hash($password, PASSWORD_DEFAULT))) ? TRUE:FALSE;
    }
    else if(strcasecmp($flag, 'update') == 0)
    {
      return (UsersGateway::updatePassword($username, password_hash($password, PASSWORD_DEFAULT))) ? TRUE:FALSE;
    }
    else
    {
      echo 'Error, incorrect flag<br/>';
      return false;
    }
  }

  /**
   * checks the user by passing in the username and then checking if the password is correct
   *
   * @param  $username
   * @param  $password
   * @return true if password matches; false otherwise
   */
  function checkUser($username, $password)
  {
    $userData = UsersGateway::findUser($username);
    return (password_verify($password, $userData[0]["Password"])) ? TRUE:FALSE;
  }
/*
  $result = UsersGateway::findUser('test');

  if(!is_null($result) && is_null($result[0]['LastLogin']))
  {
    echo "This shouldn't happen";
  }
  else
  {
    echo "Last Login is not null";
  }*/
?>
