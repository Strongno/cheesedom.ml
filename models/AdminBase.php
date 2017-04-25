<?php

abstract class AdminBase {
  /**
   * Checks if current user is admin
   * @return true
   */
  public static function checkAdmin() {
    //Check if user has logged in
    $userId = User::checkLogged();
    //Receiving array of user information
    $user = User::getUserById($userId);
    
    if ($user['user_status'] == '1') {
        return true;
    }
    die('Access denied');
  } 
  
}