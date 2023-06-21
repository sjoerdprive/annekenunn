<?php

class CustomPostType
{

    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;

        add_action('init', [$this, "register"]);

    }

    function register()
    {
        register_post_type($this->name, $args = array());
    }
}