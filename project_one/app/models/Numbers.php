<?php

namespace App\Models;

use Core\Model;
use PDO;

class Numbers extends Model
{
    /**
     * Delete previous generation
     * @return Void
     */
    public function delete(): void
    {
        $deleteRecords = $this->connect()->prepare("DELETE FROM $this->numbers_tb");
        $deleteRecords->execute();
    }

    /**
     * Store a number in DB
     * @param int $key 'id' of current number
     * @param int $number current number
     * @return true if all is 'ok'
     */
    public function store(int $key, int $number): bool
    {
        $pre_insert = "INSERT INTO $this->numbers_tb (

            id,
            rand_num

        ) VALUES (?, ?)";

        $insert = $this->connect()->prepare($pre_insert);
        $insert->execute([

            $key,
            $number

        ]);

        return true;
    }

    /**
     * Find a number in DB
     * @param int $id 'id' of current number
     * @return object if number was found otherwise 'false'
     */
    public function findOne(int $id)
    {
        $data = $this->connect()->prepare("SELECT
          rand_num
            FROM $this->numbers_tb
              WHERE id = ?
        ");

        $data->execute([$id]);

        return $data;
    }
}
