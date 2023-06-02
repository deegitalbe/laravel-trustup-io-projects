<?php

namespace Deegitalbe\LaravelTrustupIoProjects\Exceptions;

use Exception;

class InvalidAppKey extends Exception
{
    /**
     * Exception message.
     * 
     * @var string
     */
    protected $message = "Invalid app_key , please update 'deegitalbe/laravel-trustup-io-projects'";

    /**
     * Missing app key
     * 
     * @var string
     */
    protected $missing_app_key;

    public function setMissingAppKey(string $missing_app_key)
    {
        $this->missing_app_key = $missing_app_key;
    }

    public function context(): array
    {
        return [
            'missing_app_key' => $this->missing_app_key
        ];
    }
}
