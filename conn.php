<?php

$connect = mysqli_connect('127.0.0.1', 'root', '', 'librarydb') or
    die("Mysql error: " . mysqli_connect_error($connect));
    