<?php
(new Symfony\Component\Dotenv\Dotenv())
    ->usePutenv()
    ->bootEnv('.env');
