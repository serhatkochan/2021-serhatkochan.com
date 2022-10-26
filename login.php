<?php
if(!isset($_SESSION)) {
    session_start();
}

require_once('BusinessManager.php');
$businessManager = new BusinessManager();

if(isset($_SESSION['username'])){
    echo '<script>location.href = "index.php"</script>';
    exit();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-script-type" content="text/javascript" />
    <meta http-equiv="content-style-type" content="text/css" />
    <meta http-equiv="content-language" content="en" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="author" content="Serhat Koçhan />
    <meta name="description" content="I'm Serhat Koçhan, a software developer." />
    <meta name="keywords" content="Serhat Koçhan, Software developer, PHP programmer, Web developer, Startup, CV, Flutter, Javascript, Js, CPP, PHP, MySQL, OOP" />
    <meta name="robots" content="index, follow" />
    <meta name="revisit-after" content="14 days" />

    <title>Serhat Koçhan - serhatkochan.com - serhatkochan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600,700" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/ece2b606f8.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>


<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <form action="" METHOD="POST">
                            <h3 class="mb-5">Sign in</h3>

                            <div class="form-outline mb-4">
                                <i class="fa fa-user icon"></i>
                                <input type="text" id="username" class="form-control form-control-lg" placeholder="Username" />
                            </div>

                            <div class="form-outline mb-4">
                                <i class="fa fa-key icon"></i>
                                <input type="password" id="password" class="form-control form-control-lg" placeholder="Password" />
                            </div>

                            <div style="display: none" class="message text-danger" id="message">$message</div>
                            <span onclick="submitLogin()" id="btnLogin" class="btn btn-primary btn-lg btn-block" type="button">Login</span>

                        </form>

                        <script>
                            function submitLogin(){
                                var username = document.getElementById('username').value;
                                var password = document.getElementById('password').value;
                                document.getElementById('message').style.display = 'block';
                                $('#btnLogin').html('<div class="spinner-border text-dark" role="status"><span class="visually-hidden">Loading...</span></div>').addClass('disabled');
                                if(username && password){ // bos birikilan input yoksa
                                    $.ajax({
                                        url: 'loginControl.php?',
                                        type: "POST",
                                        data: {username:username, password:password},
                                        success: function(rep) {
                                            if(rep == '1'){ // bos veri girilmistir
                                                document.getElementById('message').style.display = 'block';
                                                $('#message').html('<p>Hatalı Giriş Yapıldı</p>');
                                                $('#btnLogin').html('Login').removeClass('disabled');
                                            }
                                            else if(rep == '2'){ // baglanti sorunu
                                                document.getElementById('message').style.display = 'block';
                                                $('#message').html('<p>Yerel Ağa Bağlanırken Bir Sorun Oluştu !</p>');
                                                $('#btnLogin').html('Login').removeClass('disabled');
                                            }
                                            else if(rep == '0'){ // kayit vardir.
                                                document.getElementById('message').style.display = 'block';
                                                $('#message').html('<p>Yönlendiriliyor...</p>');
                                                location.href = "index.php";
                                                $('#btnLogin').html('Login').removeClass('disabled');
                                            }
                                            else{ // not almadigimiz bir hata gelirse?
                                                document.getElementById('message').style.display = 'block';
                                                $('#message').html('<p>Bilinmeyen Bir Hata Oluştu. Lütfen Yönetici ile İletişime Geçin.</p>');
                                                $('#btnLogin').html('Login').removeClass('disabled');
                                            }
                                        }
                                    });
                                }
                                else{ // inputlardan herhangi biri bossa hata mesaji yazdirir
                                    document.getElementById('message').style.display = 'block';
                                    $('#message').html('<p>Kullanıcı Adı veya Şifrenizi Eksik Girdiniz !</p>');
                                    $('#btnLogin').html('Login').removeClass('disabled');
                                }
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
