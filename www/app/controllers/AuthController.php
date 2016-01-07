<?php

class AuthControllerextends BaseController {

public function getSignin()
    {
        // Is the user logged in?
        if (Sentry::check())
        {
            return Redirect::route('account');
        }
        // Show the page
        return View::make('a');
    }