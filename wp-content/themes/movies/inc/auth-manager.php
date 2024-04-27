<?php

class Auth_Manager {
    public function can_access_movies() {
        // add more validation...
        return isset($_COOKIE['token_key']) && !empty($_COOKIE['token_key'] 
        && isset($_COOKIE['refresh_token_key']) && !empty($_COOKIE['refresh_token_key'])
        && isset($_COOKIE['user_email']) && !empty($_COOKIE['user_email']));
    }
}

