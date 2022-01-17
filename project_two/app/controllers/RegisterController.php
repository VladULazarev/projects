<?php

namespace App\Controllers;
session_start();

require_once 'autoloader.php';

use Core\Controller;
use Core\Validator;
use Core\Model;
use App\Models\Register;
use App\Controllers\MessageController;

class RegisterController extends Controller
{
    /**
     * See below how the $_POST is handled
     * 1. If the form 'Register' was submited,
     *    $_POST comes from: /app.js -- 11. Click 'Register' button
     */

    /**
     * Checks input fields from the Form
     * @return $error 'false' if there are no 'bad' symbols, otherwise 'true'
     */
    public static function checkFormInputFields()
    {
        // Set variables from $_POST
        $userLogin    = $_POST['userLogin'];
        $userName     = $_POST['userName'];
        $userLastName = $_POST['userLastName'];
        $userEmail    = $_POST['userEmail'];
        $userPw       = $_POST['userPw'];

        // Check
        $error = Validator::checkNameLastNameLogin("user-login", $userLogin) |
                 Validator::checkNameLastNameLogin("user-name", $userName) |
                 Validator::checkNameLastNameLogin("user-last-name", $userLastName) |
                 Validator::checkUserEmail("user-email", $userEmail) |
                 Validator::checkUserPw("user-pw", $userPw);

        return $error;
    }

    /**
     * Store the new user
     */
    public static function store()
    {
        // Set variables from $_POST
        $userLogin    = trim($_POST['userLogin']);
        $userName     = trim($_POST['userName']);
        $userLastName = trim($_POST['userLastName']);
        $userEmail    = trim($_POST['userEmail']);
        $userPw       = trim($_POST['userPw']);

        // Get the user's IP
  			$userIp = Model::getUsersIp();

        // Set password hash
    		$userPw = hash('ripemd160', $userPw);

        // Create new user
        $modelReg = new Register();

        $modelReg->create(
            $userLogin, $userName, $userLastName,
            $userEmail, $userPw, $userIp
        );

        MessageController::showPopupMessageFromCurrentForm('register', 'user-was-added');
    }
}

// -------------------------------------- 1. If a form 'Register' was submited
if (isset($_POST['registerUser'])) {

    $coreModelObj = new Model();

    // Set $userPw to check if it exists in DB
    $userPw = hash('ripemd160', trim($_POST['userPw']));

    // If 'true' it means there are some 'bad' characters
    if (RegisterController::checkFormInputFields()) {

        MessageController::removeLoadImgAndFormMessages('register');

    // If 'true' it means there is already such email
    } elseif ($coreModelObj->checkIfCellValueExists(

              'email', trim($_POST['userEmail'])
           )) {

        MessageController::showPopupMessageFromRegisterForm('register', 'email-exists');

    // If 'true' it means there IS already such password
    } elseif ($coreModelObj->checkIfCellValueExists(

              'password', $userPw
            )) {

        MessageController::showPopupMessageFromRegisterForm('register', 'password-exists');

    // If NO errors -> store the new user
    } else {

  	    RegisterController::store();
	  }
}
