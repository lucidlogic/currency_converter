<?php
include('../config/config.php');
include('../db/db.php');
include('../model/ExchangeRate.php');
include('../controller/Controller.php');
$C = new Controller();
$C->run();
