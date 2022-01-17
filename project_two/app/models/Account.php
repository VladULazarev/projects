<?php

namespace App\Models;

use App\Controllers\SessionsController;
use App\Controllers\MessageController;
use Core\Model;
use PDO;

require_once 'constants.inc.php';

class Account extends Model
{
    /**
     * Get user's data (just in case, not using so far)
     */
    public function getOne($userId)
    {
        $query = $this->connect()->query("SELECT
           *
              FROM $this->users_tb
                WHERE id = '$userId'
        ");

        $data = $query->fetch(PDO::FETCH_OBJ);

        return $data;
    }

    /**
     * Save new info (login or email) in 'users' table
     * @param string $userId
     * @param string $columnName
     * @param string $value
      */
    public function save($userId, $columnName, $columnValue)
    {

        // Update current info (Name, Last name, password) in 'users' table
        $pre_update = "UPDATE $this->users_tb SET

            $columnName = ?

            WHERE id = ?";

        $update = $this->connect()->prepare($pre_update)->execute([

            $columnValue,

            $userId
        ]);

        MessageController::showMessageFromUpdatePwForm('account');

        // If 'name' or 'last name' was updated reload the /account page
        //    and see the updated info
        if ($columnName != "password") {
            MessageController::redirect("account");
        }
    }
}
