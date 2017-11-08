<?php

require_once 'vendor/autoload.php';

ini_set('session.save_handler', 'memcached');
ini_set('session.save_path', '127.0.0.1:11211');
ini_set('session.lazy_write', 0);
ini_set('memcached.sess_locking', 0);
ini_set('memcached.sess_lock_retries', 15);
ini_set('memcached.sess_lock_expire', ini_get('max_execution_time'));
ini_set('memcached.sess_consistent_hash', 1);
ini_set('memcached.sess_binary_protocol', 0);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

