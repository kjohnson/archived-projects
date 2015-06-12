<?php

final class KJAutoload_ChildClass extends KJAutoload_BaseClass
{
    public function __construct()
    {
        add_action( 'in_admin_header', array( $this, 'foo' ) );
    }

    public function foo()
    {
        echo 'Foo';
    }

    public function bar()
    {
        echo 'Bar';
    }
}
