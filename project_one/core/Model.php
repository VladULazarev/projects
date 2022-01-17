<?php

namespace Core;

use PDO;

class Model extends DbConnection
{
    /** @var string $numbers_tb name of the DB table 'numbers' */
    protected $numbers_tb = 'numbers';
}
