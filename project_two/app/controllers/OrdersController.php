<?php

namespace App\Controllers;

require_once 'autoloader.php';

use Core\Controller;
use Core\Model;
use App\Models\Orders;
use PDO;

class OrdersController extends Controller
{
    /**
     * Class OrdersController shows data for /orders page
     *
     * See below how the $_POST is handled
     * $_POST comes from: see /app.js -- 20. Get orders data
    */

    public static function showDoubledEmails()
    {
        $obj = new Orders;
        $data = $obj->getDoubledEmails();

        $countRecords = $data->rowCount();

        // Show ressults
        while ($row = $data->fetch(PDO::FETCH_OBJ)) {

            echo "<p>$row->email</p>";
        }

        echo "<p class='mt-4'>Found $countRecords doubled emails</p>";
    }

    public static function showLoginsWithoutOrders()
    {
        $obj = new Orders;
        $data = $obj->getLoginsWithoutOrders();

        $countRecords = $data->rowCount();

        // Show ressults
        while ($row = $data->fetch(PDO::FETCH_OBJ)) {

            echo "<p>$row->login</p>";
        }

        echo "<p class='mt-4'>Found $countRecords logins</p>";
    }

    public static function showLoginsWithMoreThanTwoOrders()
    {
        $obj = new Orders;
        $data = $obj->getLoginsWithMoreThanTwoOrders();

        $countRecords = $data->rowCount();

        // Show ressults
        while ($row = $data->fetch(PDO::FETCH_OBJ)) {

            echo "<p>$row->login</p>";
        }

        echo "<p class='mt-4'>Found $countRecords logins</p>";
    }
}

// ----------------------------------- 1. If div 'show-order-data' was clicked

if (isset($_POST['showOrderData']) &&
          $_POST['showOrderData'] == "show-doubled-emails") {

    OrdersController::showDoubledEmails();

} elseif (isset($_POST['showOrderData']) &&
                $_POST['showOrderData'] == "show-logins-without-orders") {

    OrdersController::showLoginsWithoutOrders();

} elseif (isset($_POST['showOrderData']) &&
                $_POST['showOrderData'] == "show-logins-with-more-than-two-orders") {

    OrdersController::showLoginsWithMoreThanTwoOrders();
}
