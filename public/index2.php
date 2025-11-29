<?php

// ---------------------------------------------------------------
// FRONT CONTROLLER - CodeIgniter 4
// ---------------------------------------------------------------

// Path ke folder project (app, system, vendor, writable)
// Sesuaikan dengan posisi folder project kamu
$projectRoot = dirname(__DIR__);

// Load Paths config
require $projectRoot . '/app/Config/Paths.php';
$paths = new Config\Paths();

// Jalankan bootstrap CodeIgniter
require $projectRoot . '/system/bootstrap.php';