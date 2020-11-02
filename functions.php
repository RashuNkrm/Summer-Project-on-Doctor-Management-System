<?php
    
    function isLoggedIn()
    {
        if (isset($_SESSION['admin'])) {
            if ($_SESSION['admin']['id'] > 0) {
                return true;
            }
        }

        return false;
    }
    function login($username, $email)
    {
        //Get super password
        $sql = "select id, username, email from doctorlogin where username ='$username' ";
        $userRow = query($sql);
        {
            $_SESSION['admin'] = $userRow;

            return true;
        }

        return false;
    }
?>