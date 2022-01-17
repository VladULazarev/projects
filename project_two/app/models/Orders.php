<?php

namespace App\Models;

use Core\Model;
use PDO;

class Orders extends Model
{
    /**
     * Gets all needed data
     * @return $data Object
     */
    public function getDoubledEmails(): object
    {
        $data = $this->connect()->query("SELECT
          email
            FROM (
              SELECT email, count(email) AS count
              FROM $this->users_tb
              GROUP BY email
            ) as email_count
            WHERE count > 1
        ");

        return $data;
    }

    /**
     * Gets all needed data
     * @return $data Object
     */
    public function getLoginsWithoutOrders(): object
    {
        $data = $this->connect()->query("SELECT
        login
            FROM (
              SELECT u.login, count(u.login) AS count
                FROM $this->users_tb as u
                INNER JOIN orders as o
                ON u.id = o.user_id
                WHERE o.price = 0
                GROUP BY u.login
            ) as login_count
            WHERE count > 1
        ");

        return $data;
    }

    /**
     * Gets all needed data
     * @return $data Object
     */
    public function getLoginsWithMoreThanTwoOrders(): object
    {
        $data = $this->connect()->query("SELECT
        login
            FROM (
              SELECT u.login, count(u.login) AS count
                FROM $this->users_tb as u
                INNER JOIN orders as o
                ON u.id = o.user_id
                WHERE o.price > 0
                GROUP BY u.login
            ) as login_count
            WHERE count > 2
        ");

        return $data;
    }
}
