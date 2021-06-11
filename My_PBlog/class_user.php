<?php

class Main
{
    private $db;
    function __construct($db)
    {
        $this->db = $db;
    }
    function login()
    {
        if (isset($_POST['btn'])){
            $user = addslashes(strip_tags($_POST['user']));
            $pw = addslashes(strip_tags($_POST['pw']));
            
            if (!empty($user) AND !empty($pw)) {
                $sql = $this->db->prepare("SELECT * FROM `users` WHERE username = :user AND password = :pw")
                ;
                $sql->execute(array('user' => $user, 'pw' => $pw));

                if ($sql->rowCount()){
                    $data = $sql->fetch();
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['id'] = true;
                    header('Location:home_article.php');
                } else {
                    echo "your email or password are wrong";
                }
            }else {
                echo "Please enter your email and password";
            }
        }
    }
}
