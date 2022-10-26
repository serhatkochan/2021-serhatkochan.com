<?php

if(!isset($_SESSION)) {
    session_start();
}

require_once('BusinessManager.php');
$businessManager = new BusinessManager();

// eger daha onceden giris yapildiysa baska ekrana atsin

// eger POST verileri gelmediyse bu ekrana hic girmesin
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = htmlspecialchars(strip_tags(addslashes(trim($_POST['username']))));
    $password = htmlspecialchars(strip_tags(addslashes(trim($_POST['password']))));

    $kullaniciBilgileri = $businessManager->loginGetir();
    if(!empty($kullaniciBilgileri)){
        foreach ($kullaniciBilgileri as $item){
            if(($item['username'] == $username) && ($item['password'] == $password)){
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['role'] = $item['role'];
                die('0'); // giris dogru
            }
            else{
                die('1'); // kullanici yok
            }
        }
    }
    else{
        die('2'); // veri tabani hatasi
    }
}
else{
    // Bilinmeyen Bir Hata Oluştu. Lütfen Yönetici ile İletişime Geçin
    exit();
}



?>
