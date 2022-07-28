<?php

namespace App\Http\Controllers;

/**
 * Get data from remote resource
 */
class Resource
{
    public function getData(): string
    {
        return file_get_contents('https://jsonplaceholder.typicode.com/users');
    }
}
