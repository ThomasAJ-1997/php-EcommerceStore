<?php

class Cookies
{
    public string $remember;
    public string $email;

    public function __construct($remember, $email)
    {
        $this->remember = $remember;
        $this->email = $email;
    }

    public function checkCookies()
    {

        if (isset($_POST['remember'])) {
            $this->remember = $_POST['remember'];
            setcookie("remember_email", $this->email, time() + 36000*24*365);
            setcookie("remember", $this->remember, time() + 36000*24*365);

        } else {
            setcookie("remember_email", $this->email, time() - 360000 );setcookie("remember", $this->remember, time() - 3600);
        }

        return $this->remember;
    }
}