<?php

if(!isset($_SESSION)) {
    session_start();
}

require_once('BusinessManager.php');
$businessManager = new BusinessManager();


?>
<!doctype html>
<html lang="en">
<head>

    <title>Serhat Koçhan - serhatkochan.com - serhatkochan</title>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-script-type" content="text/javascript" />
    <meta http-equiv="content-style-type" content="text/css" />
    <meta name="author" content="Serhat Koçhan /">
    <meta name="creator" content="@serhatkochan"/>
    <meta data-n-head="ssr" name="viewport" content="width=device-width, initial-scale=1">
    <meta data-n-head="ssr" data-hid="application-name" name="application-name" content="Serhat Koçhan - serhatkochan.com - serhatkochan">
    <meta data-n-head="ssr" data-hid="apple-mobile-web-app-title" name="apple-mobile-web-app-title" content="Serhat Koçhan - serhatkochan.com - serhatkochan">
    <meta data-n-head="ssr" data-hid="mobile-web-app-capable" name="mobile-web-app-capable" content="yes">
    <meta data-n-head="ssr" data-hid="og:type" name="og:type" property="og:type" content="website">
    <meta data-n-head="ssr" data-hid="og:site_name" name="og:site_name" property="og:site_name" content="Serhat Koçhan - serhatkochan.com - serhatkochan">
    <meta data-n-head="ssr" data-hid="description" name="description" content="Serhat Koçhan için oluşturulmuş tek sayfa bir web sitesi...">
    <meta data-n-head="ssr" data-hid="robots" name="robots" content="index, follow">
    <meta data-n-head="ssr" data-hid="og:title" property="og:title" content="Serhat Koçhan - serhatkochan.com - serhatkochan">
    <meta data-n-head="ssr" data-hid="og:description" property="og:description" content="Serhat Koçhan için oluşturulmuş tek sayfa bir web sitesi...">
    <meta data-n-head="ssr" data-hid="twitter:url" name="twitter:url" content="http://serhatkochan.com">
    <meta data-n-head="ssr" data-hid="twitter:domain" name="twitter:domain" content="onedio.com">
    <meta data-n-head="ssr" data-hid="twitter:title" name="twitter:title" content="Serhat Koçhan - serhatkochan.com - serhatkochan">
    <meta data-n-head="ssr" data-hid="twitter:description" name="twitter:description" content="Serhat Koçhan için oluşturulmuş tek sayfa bir web sitesi...">
    <meta data-n-head="ssr" data-hid="twitter:creator" name="twitter:creator" content="@serhatkochancom"><meta data-n-head="ssr" data-hid="twitter:site" name="twitter:site" content="@serhatkochancom">
    <link data-n-head="ssr" data-hid="canonical" rel="canonical" href="http://serhatkochan.com">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600,700" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/ece2b606f8.js" crossorigin="anonymous"></script>

    <style>
        .lead{
            font-size: 21px;
        }
        @media (max-width: 768px) {
            .lead{
                font-size: 16px;
            }
        }
    </style>


</head>

<body id="page-container">

<h1 hidden>Serhat Koçhan</h1>

<?php require_once ('navbar.php')?>
<div class="background-white">
    <div id="profile" class="container">
        <div class="text-center">
            <h2>Profile</h2>
            <p class="lead mb-5">
                <?php
                $input_profile_title = $businessManager->profilBasligiGetir();
                $profile_title = '';
                if(!empty($input_profile_title)){
                    foreach ($input_profile_title as $item){
                        $profile_title = $item['profile'];
                    }
                }
                echo $profile_title;
                ?>
            </p>
            <hr>
        </div>
        <div class="row my-5">
            <div class="col-md-3">
                <h3>About me</h3>
                <p>
                    <?php
                    $input_profile_about_me = $businessManager->aboutGetir();
                    $profile_about_me = '';
                    if(!empty($input_profile_about_me)){
                        foreach ($input_profile_about_me as $item){
                            $profile_about_me = $item['about'];
                        }
                    }
                    echo $profile_about_me;
                    ?>
                </p>
            </div>
            <div class="col-md-5 text-center">
                <?php
                $input_profile_image = $businessManager->profileImageGetir();
                $profile_image = '';
                if(!empty($input_profile_image)){
                    foreach ($input_profile_image as $item){
                        $profile_image = $item['imageName'];
                    }
                }
                ?>
                <img src="img/<?php echo $profile_image; ?>" alt="Serhat Koçhan" width="246" height="246" style="border-radius: 100%; border: 10px solid #f3efe0;">
            </div>
            <div class="col-md-4">
                <h3>Details</h3>
                <p>
                    <?php
                    $input_profile_details = $businessManager->detailsGetir();
                    $profile_details_name = '';
                    $profile_details_age = '';
                    $profile_details_location = '';
                    if(!empty($input_profile_details)){
                        foreach ($input_profile_details as $item){
                            $profile_details_name = $item['name'];
                            $profile_details_age = date('Y') - $item['age'];
                            $profile_details_location = $item['location'];
                        }
                    }
                    ?>
                    <strong>Name:</strong>
                    <br>
                    <?php echo $profile_details_name; ?>
                    <br>
                    <strong>Age:</strong>
                    <br>
                    <?php echo $profile_details_age. ' years'; ?>
                    <br>
                    <strong>Location:</strong>
                    <br>
                    <?php echo $profile_details_location; ?>
                </p>
            </div>
        </div>
    </div>
</div>

<div id="experiences" class="container">
    <div class="text-center">
        <h2>Experiences</h2>
        <?php
        $input_experiences_title = $businessManager->experiencesBasligiGetir();
        $experiences_title = '';
        if(!empty($input_experiences_title)){
            foreach ($input_experiences_title as $item){
                $experiences_title = $item['experiences'];
                echo '<p>'. $experiences_title .'</p>';
            }
        }
        ?>
        <hr>
    </div>

    <h3>Educations</h3>
    <div class="experiences">
        <?php
        $input_educations = $businessManager->educationsGetir();
        $educationsName = '';
        $educationsDate = '';
        $educationsHeader = '';
        $educationsDetails = '';
        $educationsLocation = '';
        if(!empty($input_educations)){
            foreach ($input_educations as $item){
                $educationsName = $item['name'];
                $educationsDate = $item['date'];
                $educationsHeader = $item['header'];
                $educationsDetails = $item['details'];
                $educationsLocation = $item['location'];
                echo '<div class="experience row">
                        <div class="col-md-4">
                            <h4>'.$educationsName. '</h4>
                            <p>'.$educationsDate. '</p>
                        </div>
                        <div class="col-md-8">
                            <p>
                                <strong>'.$educationsHeader. '</strong>
                                <span>
                                    '.$educationsDetails. '
                                </span>
                                <span class="experience-details">
                                    <span class="location">
                                        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                        '.$educationsLocation. '
                                    </span>
                                </span>
                            </p>
                        </div>
                    </div>';
            }
        }
        ?>
    </div>

    <hr>
    <h3>Careers</h3>
    <div class="experiences">
        <?php
        $input_careers = $businessManager->careersGetir();
        $careersName = '';
        $careersDate = '';
        $careersHeader = '';
        $careersDetails = '';
        $careersLocation = '';
        if(!empty($input_careers)){
            foreach ($input_careers as $item){
                $careersName = $item['name'];
                $careersDate = $item['date'];
                $careersHeader = $item['header'];
                $careersDetails = $item['details'];
                $careersLocation = $item['location'];
                echo '<div class="experience row">
                        <div class="col-md-4">
                            <h4>'.$careersName. '</h4>
                            <p>'.$careersDate. '</p>
                        </div>
                        <div class="col-md-8">
                            <p>
                                <strong>'.$careersHeader. '</strong>
                                <span>
                                    '.$careersDetails. '
                                </span>
                                <span class="experience-details">
                                    <span class="location">
                                        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                        '.$careersLocation. '
                                    </span>
                                </span>
                            </p>
                        </div>
                    </div>';
            }
        }
        ?>
    </div>


</div>

<div class="bg-white">
    <div id="abilities" class="container">
        <div class="text-center">
            <h2>Abilities</h2>
            <?php
            $input_abilities_title = $businessManager->abilitiesBasligiGetir();
            if(!empty($input_abilities_title)){
                foreach ($input_abilities_title as $item){
                    $abilities_title = $item['abilities'];
                    echo '<p>'. $abilities_title .'</p>';
                }
            }
            ?>
        </div>

        <h3>Skills</h3>
        <div class="row">
            <?php
            $input_skills = $businessManager->skillsGetir();
            if(!empty($input_skills)){
                $row_count = count($input_skills);
                for($i = 0; $i<=$row_count/2; $i++){
                    echo '<div class="col-md-6">
                            <ul class="no-bullets">
                                <li>
                                    <span class="ability-title">'. $input_skills[$i]["name"] .'</span>
                                    <span class="ability-score">';

                    for($s = 0; $s < $input_skills[$i]["score"]; $s++){
                        echo '<span class="glyphicon glyphicon-star filled"></span>';
                    }
                    for($sm = 0; $sm < (5-$input_skills[$i]["score"]); $sm++){
                        echo '<span class="glyphicon glyphicon-star"></span>';
                    }
                    echo ' </span>
                                </li>
                            </ul>
                        </div>';
                }
                for($i = $row_count/2+1; $i<$row_count; $i++){
                    echo '<div class="col-md-6">
                            <ul class="no-bullets">
                                <li>
                                    <span class="ability-title">'. $input_skills[$i]["name"] .'</span>
                                    <span class="ability-score">';

                    for($s = 0; $s < $input_skills[$i]["score"]; $s++){
                        echo '<span class="glyphicon glyphicon-star filled"></span>';
                    }
                    for($sm = 0; $sm < (5-$input_skills[$i]["score"]); $sm++){
                        echo '<span class="glyphicon glyphicon-star"></span>';
                    }
                    echo ' </span>
                                </li>
                            </ul>
                        </div>';
                }
            }
            ?>
        </div>
        <hr>
        <h3>Languages</h3>
        <div class="row">
            <?php
            $input_languages = $businessManager->languagesGetir();
            if(!empty($input_languages)){
                $row_count = count($input_languages);
                for($i = 0; $i<=$row_count/2; $i++){
                    echo '<div class="col-md-6">
                            <ul class="no-bullets">
                                <li>
                                    <span class="ability-title">'. $input_languages[$i]["name"] .'</span>
                                    <span class="ability-score">';

                    for($s = 0; $s < $input_languages[$i]["score"]; $s++){
                        echo '<span class="glyphicon glyphicon-star filled"></span>';
                    }
                    for($sm = 0; $sm < (5-$input_languages[$i]["score"]); $sm++){
                        echo '<span class="glyphicon glyphicon-star"></span>';
                    }
                    echo ' </span>
                                </li>
                            </ul>
                        </div>';
                }
                for($i = $row_count/2+1; $i<$row_count; $i++){
                    echo '<div class="col-md-6">
                            <ul class="no-bullets">
                                <li>
                                    <span class="ability-title">'. $input_languages[$i]["name"] .'</span>
                                    <span class="ability-score">';

                    for($s = 0; $s < $input_languages[$i]["score"]; $s++){
                        echo '<span class="glyphicon glyphicon-star filled"></span>';
                    }
                    for($sm = 0; $sm < (5-$input_languages[$i]["score"]); $sm++){
                        echo '<span class="glyphicon glyphicon-star"></span>';
                    }
                    echo ' </span>
                                </li>
                            </ul>
                        </div>';
                }
            }
            ?>
        </div>
        <hr>
        <h3>Tools</h3>
        <div class="row">
            <?php
            $input_tools = $businessManager->toolsGetir();
            if(!empty($input_tools)){
                $row_count = count($input_tools);
                for($i = 0; $i<=$row_count/2; $i++){
                    echo '<div class="col-md-6">
                            <ul class="no-bullets">
                                <li>
                                    <span class="ability-title">'. $input_tools[$i]["name"] .'</span>
                                    <span class="ability-score">';

                    for($s = 0; $s < $input_tools[$i]["score"]; $s++){
                        echo '<span class="glyphicon glyphicon-star filled"></span>';
                    }
                    for($sm = 0; $sm < (5-$input_tools[$i]["score"]); $sm++){
                        echo '<span class="glyphicon glyphicon-star"></span>';
                    }
                    echo ' </span>
                                </li>
                            </ul>
                        </div>';
                }
                for($i = $row_count/2+1; $i<$row_count; $i++){
                    echo '<div class="col-md-6">
                            <ul class="no-bullets">
                                <li>
                                    <span class="ability-title">'. $input_tools[$i]["name"] .'</span>
                                    <span class="ability-score">';

                    for($s = 0; $s < $input_tools[$i]["score"]; $s++){
                        echo '<span class="glyphicon glyphicon-star filled"></span>';
                    }
                    for($sm = 0; $sm < (5-$input_tools[$i]["score"]); $sm++){
                        echo '<span class="glyphicon glyphicon-star"></span>';
                    }
                    echo ' </span>
                                </li>
                            </ul>
                        </div>';
                }
            }
            ?>
        </div>
    </div>

</div>

<div id="projects" class="container">
    <div class="text-center">
        <h2>Projects</h2>
    </div>
    <hr>
    <div class="row">
        <?php
        $input_projects = $businessManager->figcaptionGetir();
        if(!empty($input_projects)){
            foreach ($input_projects as $item){
                $projectName = $item['name'];
                $projectDetails = $item['details'];
                $projectTag = $item['tags'];
                $projectImageName = $item['image_name'];
                $projectLink = $item['link'];
                $projectDate = $item['date'];
                echo '<div class="col-md-6 col-sm-12 col-xs-12">
                        <figure class="effect" style="border-radius: 5px; border: 1px solid #D0CCC0; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                            <img width="600" height="400" style="object-fit: fill" src="img/'. $projectImageName .'" alt="'. $projectName .'">
                            <figcaption>
                                <h3>'. $projectName .'</h3>
                                <p>'. $projectDetails .'</p>
                                <p>
                                    <strong>Tags:</strong>
                                    <br>
                                    '. $projectTag .'
                                </p>
                                <p>
                                    <strong>Date:</strong>
                                    <br>
                                    '. $projectDate .'
                                </p>
                                <a href="'. $projectLink .'" target="_blank">View more</a>
                                <span class="icon">
                                    <span class="glyphicon glyphicon-new-window"></span>
                                </span>
                            </figcaption>
                        </figure>
                    </div>';
            }
        }
        ?>

    </div>

</div>

<div class="background-gray">
    <div id="contact" class="container">
        <h2>Contact</h2>
        <hr>
        <div class="row">
            <?php
            $input_contact = $businessManager->contactGetir();
            if(!empty($input_contact)){
                $row_count = count($input_contact);
                for($i = 0; $i<$row_count-1; $i+=2){
                    echo '<div class="col-md-6">
                            <ul class="no-bullets">
                                <li>
                                        <a href="'. $input_contact[$i]['link'] .'" target="_blank">
                                        <span class="'. $input_contact[$i]['style'] .'" style="font-size: 34px; margin-right: 20px; float: left;"></span>
                                        '. $input_contact[$i]['name'] .'
                                    </a>
                                </li>
                                <li>
                                    <a href="'. $input_contact[$i+1]['link'] .'" target="_blank">
                                        <span class="'. $input_contact[$i+1]['style'] .'" style="font-size: 34px; margin-right: 20px; float: left;"></span>
                                        '. $input_contact[$i+1]['name'] .'
                                    </a>
                                </li>
                            </ul>
                        </div>';
                }
            }
            ?>

        </div>
    </div>
</div>




</body>
</html>