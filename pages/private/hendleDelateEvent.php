<?php
require_once '../../core/functions.php';
require_once '../../core/database.php';

if (isset($_POST['idEvento'])) {
    $id = $_POST['idEvento'];

    deleteEvent($pdo, $id);

}