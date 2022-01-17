<?php

namespace App\Controllers;
session_start();

require_once 'autoloader.php';

use Core\Controller;
use Core\Validator;
use Core\Model;
use App\Models\Account;
use App\Controllers\MessageController;

class AccountController extends Controller
{
    /**
     * Updates user's info, data comes from app.js -- 15.2 Click button 'Update'
     */
    public static function update($userId, $columnName, $columnValue) {

        $modelObj = new Account();

        // Rename $columnValue and set it as coLumn name in 'users' table
        ($columnName == 'user-name') ? $columnName = 'name' : '';
        ($columnName == 'user-last-name') ? $columnName = 'last_name' : '';
        ($columnName == 'user-pw') ? $columnName = 'password' : '';

        if ($columnName == 'password') {

            $userPw = hash('ripemd160', trim($columnValue));

            $modelObj->save($userId, $columnName, $userPw);

        } else {

            $modelObj->save($userId, $columnName, $columnValue);
        }
    }
}

// ---------------------------------------- 1. If 'Upadate' button was clicked
//  $_POST comes from /app.js see,---
//  15.2 Click button 'Update' for the current '.info-block' and update the info

if (isset($_POST['updateAccountInfo'])) {

    $coreModelObj = new Model();

    // If 'Name' is being updated
    if ($_POST['columnName'] == "user-name") {

        // If returns 'true'
        if (Validator::checkNameLastNameLogin("user-name", $_POST['newColumnValue'])) {

            MessageController::removeLoadImgAndFormMessagesAndInputValues('account');

        } else {

            AccountController::update(
                $_POST['userId'],
                $_POST['columnName'],
                $_POST['newColumnValue']
            );
        }

    // If 'last name' is being updated
    } elseif ($_POST['columnName'] == "user-last-name") {

        // If returns 'true'
        if (Validator::checkNameLastNameLogin(

              "user-last-name", $_POST['newColumnValue']
            )) {

            MessageController::removeLoadImgAndFormMessagesAndInputValues('account');

        //  If returns 'false' update user's last name
        } else {

            AccountController::update(
                $_POST['userId'],
                $_POST['columnName'],
                $_POST['newColumnValue']
            );
        }

    // If 'password' is being updated
    } elseif ($_POST['columnName'] == "user-pw") {

        // If returns 'true'
        if (Validator::checkUserPw(

              "user-pw", $_POST['newColumnValue']
            )) {

            MessageController::removeLoadImgAndFormMessagesAndInputValues('account');

          //  If returns 'false' update user's password
          } else {

              AccountController::update(
                  $_POST['userId'],
                  $_POST['columnName'],
                  $_POST['newColumnValue']
              );
          }
    }
}
