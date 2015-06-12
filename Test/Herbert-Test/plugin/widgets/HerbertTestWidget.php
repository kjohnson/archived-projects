<?php

class HerbertTestWidget extends Herbert\Framework\BaseWidget {

    public function __construct() {
        parent::__construct(
            'herbert_test_widget', // Base ID
            'Herbert Test Widget', // Name
            array( 'description' => __( 'Herbert Test Widget', 'herbert-test' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {
        // outputs the content of the widget
        echo $this->view->render('widget', []);
    }

    public function form( $instance ) {
        // outputs the options form on admin
    }

    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
    }

}