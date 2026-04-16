<?php

// Vercel Serverless Environment Variables
$_ENV['APP_ENV'] = 'production';
$_ENV['APP_DEBUG'] = 'true'; // Kita aktifkan dulu agar kalau ada error lain, kita bisa tahu!
$_ENV['APP_URL'] = 'https://' . $_SERVER['HTTP_HOST'];
$_ENV['APP_KEY'] = 'base64:/IU4mIk9nBx8wvXVD2Gdu/g81HdY2TX0KRPGTU6mykU=';
$_ENV['LOG_CHANNEL'] = 'stderr';
$_ENV['SESSION_DRIVER'] = 'cookie'; // SQLite tidak bisa digunakan di Vercel karena Read-Only
$_ENV['CACHE_STORE'] = 'array'; // Cache tidak bisa ditulis ke file
$_ENV['VIEW_COMPILED_PATH'] = '/tmp'; // Vercel hanya mengizinkan tulis file di folder /tmp

// Forward Vercel requests to normal index.php
require __DIR__ . '/../public/index.php';
