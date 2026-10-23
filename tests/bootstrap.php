<?php
(new Symfony\Component\Dotenv\Dotenv())
    ->usePutenv()
    ->bootEnv('.env');

require_once __DIR__ . '/ClientResponseStub.php';
