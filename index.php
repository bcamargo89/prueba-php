<?php

    require_once "UsersAPI.php";    
    require_once "NameAPI.php";  
    $userAPI = new UsersAPI();
    $userAPI->API();

    $nameAPI = new NameAPI();
    $nameAPI->API();

 ?>
