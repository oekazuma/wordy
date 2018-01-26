<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Conf.php';

session_destroy();

header('Location: /wordy/index.php');
exit;