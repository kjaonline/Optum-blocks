<?php
    header("Access-Control-Allow-Origin: *");
    define( 'WP_USE_THEMES', false );
    require( '../../../../wp-load.php' );

    require_once('setup-db.php');

    //Error handling for required fields
    $response = new stdClass();
    $response->error = false;

    $values = array();

    foreach($options_db as $option){
        if($option->required == true && $_POST[$option->slug] == ""){
            $response->error = true;
            $response->error_at = $option->slug;
            break;
        }
        $values[$option->slug] = filter_var($_POST[$option->slug], FILTER_SANITIZE_STRING);
    }

    $values["ip"] = $_POST["ip"];
    $values["date"] = date("m/d/Y");
    $values["payload"] = json_encode($_POST, JSON_HEX_QUOT|JSON_HEX_TAG|JSON_HEX_AMP|JSON_HEX_APOS);

    if(!$response->error){
        $table_name = $wpdb->prefix . "users_subscribed";
        
        $wpdb->insert(
            $table_name,
            $values
        );

        require "../mailer.php";
    }

    echo(json_encode($response));
?>