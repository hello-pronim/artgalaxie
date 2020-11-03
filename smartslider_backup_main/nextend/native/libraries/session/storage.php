<?php

class N2SessionStorage extends N2SessionStorageAbstract
{

    public function __construct() {
        parent::__construct(1);
    }

    /**
     * Load the whole session
     */
    protected function load() {
        $this->storage = $_SESSION;
    }

    /**
     * Store the whole session
     */
    protected function store() {
        $_SESSION = $this->storage;
    }

    /**
     * Register our method for PHP shut down
     */
    protected function register() {
        register_shutdown_function(array(
            $this,
            'shutdown'
        ));
    }

}