<?php

if(!isset($_SESSION)) {
    session_start();
}

require_once('BusinessManager.php');
$businessManager = new BusinessManager();

if(!isset($_SESSION['role'])){
    echo '<script>location.href = "index.php"</script>';
    exit();
}
else{
    if(!$_SESSION['role'] == '0'){
        echo '<script>location.href = "index.php"</script>';
        exit();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-script-type" content="text/javascript" />
    <meta http-equiv="content-style-type" content="text/css" />
    <meta http-equiv="content-language" content="tr" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="author" content="Serhat Koçhan />
    <meta name="description" content="serhatkochan" />
    <meta name="keywords" content="Serhat Koçhan, Software developer, PHP programmer, Web developer, Startup, CV, Flutter, Javascript, Js, CPP, PHP, MySQL, OOP" />
    <meta name="robots" content="index, follow" />
    <meta name="revisit-after" content="14 days" />

    <title>Serhat Koçhan - serhatkochan.com - serhatkochan</title>

    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="stylesheet" href="admin.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/ece2b606f8.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>


    <style>
        .table-wrapper {
            width: 100%;
            margin:auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }
        .table-title h2 {
            margin: 6px 0 0;
            font-size: 22px;
        }
        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }
        .table-title .add-new i {
            margin-right: 4px;
        }
        table.table {
            table-layout: fixed;
        }
        table.table tr th, table.table tr td     {
            border-color: #e9e9e9;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
        table.table th:last-child {
            width: 100px;
        }
        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }
        table.table td a.add {
            color: #27C46B;
        }
        table.table td a.edit {
            color: #FFC107;
        }
        table.table td a.delete {
            color: #E34724;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }
        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }
        table.table .form-control.error {
            border-color: #f50000;
        }
        table.table td .add {
            display: inline-block;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0; // remove the gap so it doesn't close
        }

    </style>

</head>
<body>

<?php
require_once('navbar.php');
require_once('alertModal.html');
?>

<div class="container mt-5 ">
    <nav>
        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
            <span>
                <ul class="nav">
                    <li class="nav-item dropdown">
                        <button class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Profile</button>
                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" id="nav-profile-title-tab" data-bs-toggle="tab" data-bs-target="#nav-profile-title" type="button" role="tab" aria-controls="nav-profile-title" aria-selected="true">Title</button></li>
                                <li><button class="dropdown-item" id="nav-profile-image-tab" data-bs-toggle="tab" data-bs-target="#nav-profile-image" type="button" role="tab" aria-controls="nav-profile-image" aria-selected="true">Image</button></li>
                                <li><button class="dropdown-item" id="nav-profile-about-me-tab" data-bs-toggle="tab" data-bs-target="#nav-profile-about-me" type="button" role="tab" aria-controls="nav-profile-about-me" aria-selected="false">About Me</button></li>
                                <li><button class="dropdown-item" id="nav-profile-details-tab" data-bs-toggle="tab" data-bs-target="#nav-profile-details" type="button" role="tab" aria-controls="nav-profile-details" aria-selected="false">Details</button></li>
                            </ul>
                        </button>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Experiences</button>
                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" id="nav-experiences-title-tab" data-bs-toggle="tab" data-bs-target="#nav-experiences-title" type="button" role="tab" aria-controls="nav-experiences-title" aria-selected="true">Title</button></li>
                                <li><button class="dropdown-item" id="nav-experiences-educations-tab" data-bs-toggle="tab" data-bs-target="#nav-experiences-educations" type="button" role="tab" aria-controls="nav-experiences-educations" aria-selected="false">Educations</button></li>
                                <li><button class="dropdown-item" id="nav-experiences-careers-tab" data-bs-toggle="tab" data-bs-target="#nav-experiences-careers" type="button" role="tab" aria-controls="nav-experiences-careers" aria-selected="false">Careers</button></li>
                            </ul>
                        </button>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Abilities</button>
                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" id="nav-abilities-title-tab" data-bs-toggle="tab" data-bs-target="#nav-abilities-title" type="button" role="tab" aria-controls="nav-abilities-title" aria-selected="true">Title</button></li>
                                <li><button class="dropdown-item" id="nav-abilities-skills-tab" data-bs-toggle="tab" data-bs-target="#nav-abilities-skills" type="button" role="tab" aria-controls="nav-abilities-skills" aria-selected="false">Skills</button></li>
                                <li><button class="dropdown-item" id="nav-abilities-languages-tab" data-bs-toggle="tab" data-bs-target="#nav-abilities-languages" type="button" role="tab" aria-controls="nav-abilities-languages" aria-selected="false">Languages</button></li>
                                <li><button class="dropdown-item" id="nav-abilities-tools-tab" data-bs-toggle="tab" data-bs-target="#nav-abilities-tools" type="button" role="tab" aria-controls="nav-abilities-tools" aria-selected="false">Tools</button></li>
                            </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Images</button>
                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" id="nav-images-list-tab" data-bs-toggle="tab" data-bs-target="#nav-images-list" type="button" role="tab" aria-controls="nav-images-list" aria-selected="true">Images List</button></li>
                                <li><button class="dropdown-item" id="nav-images-add-tab" data-bs-toggle="tab" data-bs-target="#nav-images-add" type="button" role="tab" aria-controls="nav-images-add" aria-selected="false">Images Add</button></li>
                            </ul>
                    </li>
                </ul>
            </span>
            <button class="nav-link" id="nav-projects-tab" data-bs-toggle="tab" data-bs-target="#nav-projects" type="button" role="tab" aria-controls="nav-projects" aria-selected="false">Projects</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <!-- Profile Title -->
        <div class="tab-pane fade" id="nav-profile-title" role="tabpanel" aria-labelledby="nav-profile-title-tab">
            <form id="form-profile-title" class="row" METHOD="POST" action="">
                <div class="input-group input-group-lg mt-5">
                    <?php
                    $input_profile_title = $businessManager->profilBasligiGetir();
                    $profile_title = '';
                    $idProfile = '';
                    if(!empty($input_profile_title)){
                        foreach ($input_profile_title as $item){
                            $profile_title = $item['profile'];
                            $idProfile = $item['idProfile'];
                        }
                    }
                    ?>
                    <input id="input-idProfile" name="input-idProfile" hidden type="text" value="<?php echo $idProfile; ?>">
                    <textarea class="form-control" rows="5" id="input-profile-title" name="input-profile-title" placeholder="Title"><?php echo $profile_title; ?></textarea>
                </div>
                <div class="input-group input-group-lg mt-3">
                    <span id="btn-profile-title" class="btn btn-primary">Confirm</span>
                </div>
            </form>
        </div>
        <!-- Profile Image -->
        <div class="tab-pane fade" id="nav-profile-image" role="tabpanel" aria-labelledby="nav-profile-image-tab">
            <form id="form-profile-image" class="row" METHOD="POST" action="">
                <div class="card mt-5 ml-auto mr-auto ">
                    <?php
                    $input_profile_image = $businessManager->profileImageGetir();
                    $profile_imageName = '';
                    $idProfileImage = '';
                    if(!empty($input_profile_image)){
                        foreach ($input_profile_image as $item){
                            $profile_imageName = $item['imageName'];
                            $idProfileImage = $item['idProfileImage'];
                            echo '<img style="max-width: 246px; height: auto;" src="img/'. $profile_imageName .'">';
                        }
                    }
                    ?>
                    <input id="input-idProfileImage" name="input-idProfileImage" hidden type="text" value="<?php echo $idProfileImage; ?>">
                    <input class="form-control" id="input-profile-image" name="input-profile-image" placeholder="Image Name" value="<?php echo $profile_imageName; ?>">
                    <span id="btn-profile-image" class="btn btn-primary">Confirm</span>
                </div>
            </form>
        </div>
        <!-- Profile About Me -->
        <div class="tab-pane fade" id="nav-profile-about-me" role="tabpanel" aria-labelledby="nav-profile-about-me-tab">
            <form id="form-profile-about-me" class="row">
                <div class="input-group input-group-lg mt-5">
                    <?php
                    $input_profile_about_me = $businessManager->aboutGetir();
                    $profile_about_me = '';
                    $idAbout = '';
                    if(!empty($input_profile_about_me)){
                        foreach ($input_profile_about_me as $item){
                            $profile_about_me = $item['about'];
                            $idAbout = $item['idAbout'];
                        }
                    }
                    ?>
                    <input id="input-idAbout" name="input-idAbout" hidden type="text" value="<?php echo $idAbout; ?>">
                    <textarea class="form-control" rows="5" id="input-profile-about-me" name="input-profile-about-me" placeholder="Title"><?php echo $profile_about_me; ?></textarea>
                </div>
                <div class="input-group input-group-lg mt-3">
                    <span id="btn-profile-about-me" class="btn btn-primary">Confirm</span>
                </div>
            </form>
        </div>
        <!-- Profile Details -->
        <div class="tab-pane fade" id="nav-profile-details" role="tabpanel" aria-labelledby="nav-profile-details-tab">
            <form id="form-profile-details" class="row">
                <div class="input-group input-group-lg mt-5 col-12">
                    <?php
                    $input_profile_details = $businessManager->detailsGetir();
                    $profile_details_name = '';
                    $profile_details_age = '';
                    $profile_details_location = '';
                    $idDetails = '';
                    if(!empty($input_profile_details)){
                        foreach ($input_profile_details as $item){
                            $profile_details_name = $item['name'];
                            $profile_details_age = $item['age'];
                            $profile_details_location = $item['location'];
                            $idDetails = $item['idDetails'];
                        }
                    }
                    ?>
                    <input id="input-idDetails" name="input-idDetails" hidden type="text" value="<?php echo $idDetails; ?>">
                    <textarea class="form-control" rows="4" id="input-profile-details-name" name="input-profile-details-name" placeholder="Name"><?php echo $profile_details_name; ?></textarea>
                </div>
                <div class="input-group input-group-lg mt-2 col-12">
                    <textarea class="form-control" rows="4" id="input-profile-details-age" name="input-profile-details-age" placeholder="Age Year"><?php echo $profile_details_age; ?></textarea>
                </div>
                <div class="input-group input-group-lg mt-2 col-12">
                    <textarea class="form-control" rows="4" id="input-profile-details-location" name="input-profile-details-location" placeholder="Location"><?php echo $profile_details_location; ?></textarea>
                </div>
                <div class="input-group input-group-lg mt-3">
                    <span id="btn-profile-details" class="btn btn-primary">Confirm</span>
                </div>
            </form>

        </div>

        <!-- Experiences Title -->
        <div class="tab-pane fade" id="nav-experiences-title" role="tabpanel" aria-labelledby="nav-experiences-title-tab">
            <form id="form-experiences-title" class="row" METHOD="POST" action="">
                <div class="input-group input-group-lg mt-5">
                    <?php
                    $input_experiences_title = $businessManager->experiencesBasligiGetir();
                    $experiences_title = '';
                    $idExperiences = '';
                    if(!empty($input_experiences_title)){
                        foreach ($input_experiences_title as $item){
                            $experiences_title = $item['experiences'];
                            $idExperiences = $item['idExperiences'];
                        }
                    }
                    ?>
                    <input id="input-idExperiences" name="input-idExperiences" hidden type="text" value="<?php echo $idExperiences; ?>">
                    <textarea class="form-control" rows="5" id="input-experiences-title" name="input-experiences-title" placeholder="Title"><?php echo $experiences_title;?></textarea>
                </div>
                <div class="input-group input-group-lg mt-3">
                    <span id="btn-experiences-title" class="btn btn-primary">Confirm</span>
                </div>
            </form>
        </div>
        <!-- Experiences Educations -->
        <div class="tab-pane fade" id="nav-experiences-educations" role="tabpanel" aria-labelledby="nav-experiences-educations-tab">
            <div class="container">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8"><h2>Educations <b>Details</b></h2></div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-info add-new add-new-experiences-educations"><i class="fa fa-plus"></i> Add New</button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-experiences-educations">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Header</th>
                            <th>Details</th>
                            <th>Locations</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr hidden>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a class="add add-experiences-educations" title="Add" ><i class="material-icons"></i></a>
                                <a class="delete delete-experiences-educations" title="Delete" ><i class="material-icons"></i></a>
                            </td>
                        </tr>
                        <?php
                        $input_experiences_educations = $businessManager->educationsGetir();
                        if(!empty($input_experiences_educations)){
                            foreach ($input_experiences_educations as $item){
                                echo '<tr>'.
                                    '<td><input readonly type="text" class="form-control" name="input-idEducations" value="'.$item["idEducations"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-educationsTitle" value="'.$item["name"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-educationsDate" value="'.$item["date"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-educationsHeader" value="'.$item["header"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-educationsDetails" value="'.$item["details"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-educationsLocation" value="'.$item["location"].'"></td>'.
                                    '<td>
                                                        <a class="add add-experiences-educations" title="Add" ><i class="material-icons"></i></a>
                                                        <a class="delete delete-experiences-educations" title="Delete" ><i class="material-icons"></i></a>
                                                    </td>'.
                                    '</tr>';
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Experiences Careers -->
        <div class="tab-pane fade" id="nav-experiences-careers" role="tabpanel" aria-labelledby="nav-experiences-careers-tab">
            <div class="container">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8"><h2>Careers <b>Details</b></h2></div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-info add-new add-new-experiences-careers"><i class="fa fa-plus"></i> Add New</button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-experiences-careers">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Header</th>
                            <th>Details</th>
                            <th>Locations</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr hidden>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a class="add add-experiences-careers" title="Add" ><i class="material-icons"></i></a>
                                <a class="delete delete-experiences-careers" title="Delete" ><i class="material-icons"></i></a>
                            </td>
                        </tr>
                        <?php
                        $input_experiences_careers = $businessManager->careersGetir();
                        if(!empty($input_experiences_careers)){
                            foreach ($input_experiences_careers as $item){
                                echo '<tr>'.
                                    '<td><input readonly type="text" class="form-control" name="input-idCareers" value="'.$item["idCareers"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-careersTitle" value="'.$item["name"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-careersDate" value="'.$item["date"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-careersHeader" value="'.$item["header"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-careersDetails" value="'.$item["details"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-careersLocation" value="'.$item["location"].'"></td>'.
                                    '<td>
                                                        <a class="add add-experiences-careers" title="Add" ><i class="material-icons"></i></a>
                                                        <a class="delete delete-experiences-careers" title="Delete" ><i class="material-icons"></i></a>
                                     </td>'.
                                    '</tr>';
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Abilities Title -->
        <div class="tab-pane fade" id="nav-abilities-title" role="tabpanel" aria-labelledby="nav-abilities-title-tab">
            <form id="form-abilities-title" class="row" METHOD="POST" action="">
                <div class="input-group input-group-lg mt-5">
                    <?php
                    $input_abilities_title = $businessManager->abilitiesBasligiGetir();
                    $abilities_title = '';
                    $idAbilities = '';
                    if(!empty($input_abilities_title)){
                        foreach ($input_abilities_title as $item){
                            $abilities_title = $item['abilities'];
                            $idAbilities = $item['idAbilities'];
                        }
                    }
                    ?>
                    <input id="input-idAbilities" name="input-idAbilities" hidden type="text" value="<?php echo $idAbilities; ?>">
                    <textarea class="form-control" rows="5" id="input-abilities-title" name="input-abilities-title" placeholder="Title"><?php echo $abilities_title;?></textarea>
                </div>
                <div class="input-group input-group-lg mt-3">
                    <span id="btn-abilities-title" class="btn btn-primary">Confirm</span>
                </div>
            </form>
        </div>
        <!-- Abilities Skills -->
        <div class="tab-pane fade" id="nav-abilities-skills" role="tabpanel" aria-labelledby="nav-abilities-skills-tab">
            <div class="container">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8"><h2>Abilities <b>Skills</b></h2></div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-info add-new add-new-abilities-skills"><i class="fa fa-plus"></i> Add New</button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-abilities-skills">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Score(1-5)</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr hidden>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a class="add add-abilities-skills" title="Add" ><i class="material-icons"></i></a>
                                <a class="delete delete-abilities-skills" title="Delete" ><i class="material-icons"></i></a>
                            </td>
                        </tr>
                        <?php
                        $input_abilities_educations = $businessManager->skillsGetir();
                        if(!empty($input_abilities_educations)){
                            foreach ($input_abilities_educations as $item){
                                echo '<tr>'.
                                    '<td><input readonly type="text" class="form-control" name="input-idSkills" value="'.$item["idSkills"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-skillsName" value="'.$item["name"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-skillsScore" value="'.$item["score"].'"></td>'.
                                    '<td>
                                                        <a class="add add-abilities-skills" title="Add" ><i class="material-icons"></i></a>
                                                        <a class="delete delete-abilities-skills" title="Delete" ><i class="material-icons"></i></a>
                                                    </td>'.
                                    '</tr>';
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Abilities Languages -->
        <div class="tab-pane fade" id="nav-abilities-languages" role="tabpanel" aria-labelledby="nav-abilities-languages-tab">
            <div class="container">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8"><h2>Abilities <b>Languages</b></h2></div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-info add-new add-new-abilities-languages"><i class="fa fa-plus"></i> Add New</button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-abilities-languages">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Score(1-5)</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr hidden>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a class="add add-abilities-languages" title="Add" ><i class="material-icons"></i></a>
                                <a class="delete delete-abilities-languages" title="Delete" ><i class="material-icons"></i></a>
                            </td>
                        </tr>
                        <?php
                        $input_abilities_languages = $businessManager->languagesGetir();
                        if(!empty($input_abilities_languages)){
                            foreach ($input_abilities_languages as $item){
                                echo '<tr>'.
                                    '<td><input readonly type="text" class="form-control" name="input-idLanguages" value="'.$item["idLanguages"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-languagesName" value="'.$item["name"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-languagesScore" value="'.$item["score"].'"></td>'.
                                    '<td>
                                                        <a class="add add-abilities-languages" title="Add" ><i class="material-icons"></i></a>
                                                        <a class="delete delete-abilities-languages" title="Delete" ><i class="material-icons"></i></a>
                                                    </td>'.
                                    '</tr>';
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Abilities Tools -->
        <div class="tab-pane fade" id="nav-abilities-tools" role="tabpanel" aria-labelledby="nav-abilities-tools-tab">
            <div class="container">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8"><h2>Abilities <b>Tools</b></h2></div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-info add-new add-new-abilities-tools"><i class="fa fa-plus"></i> Add New</button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-abilities-tools">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Score(1-5)</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr hidden>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a class="add add-abilities-tools" title="Add" ><i class="material-icons"></i></a>
                                <a class="delete delete-abilities-tools" title="Delete" ><i class="material-icons"></i></a>
                            </td>
                        </tr>
                        <?php
                        $input_abilities_tools = $businessManager->toolsGetir();
                        if(!empty($input_abilities_tools)){
                            foreach ($input_abilities_tools as $item){
                                echo '<tr>'.
                                    '<td><input readonly type="text" class="form-control" name="input-idTools" value="'.$item["idTools"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-toolsName" value="'.$item["name"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-toolsScore" value="'.$item["score"].'"></td>'.
                                    '<td>
                                                        <a class="add add-abilities-tools" title="Add" ><i class="material-icons"></i></a>
                                                        <a class="delete delete-abilities-tools" title="Delete" ><i class="material-icons"></i></a>
                                                    </td>'.
                                    '</tr>';
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Projects Container -->
        <div class="tab-pane fade" id="nav-projects" role="tabpanel" aria-labelledby="nav-projects-tab">
            <div class="container">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8"><h2>Projects</h2></div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-info add-new add-new-projects"><i class="fa fa-plus"></i> Add New</button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-projects">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Tags</th>
                            <th>Image Name</th>
                            <th>Link</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr hidden>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a class="add add-projects" title="Add" ><i class="material-icons"></i></a>
                                <a class="delete delete-projects" title="Delete" ><i class="material-icons"></i></a>
                            </td>
                        </tr>
                        <?php
                        $input_projects = $businessManager->figcaptionGetir();
                        if(!empty($input_projects)){
                            foreach ($input_projects as $item){
                                echo '<tr>'.
                                    '<td><input readonly type="text" class="form-control" name="input-idFigcaption" value="'.$item["idFigcaption"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-projectsName" value="'.$item["name"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-projectsDetails" value="'.$item["details"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-projectsTags" value="'.$item["tags"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-projectsImageName" value="'.$item["image_name"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-projectsLink" value="'.$item["link"].'"></td>'.
                                    '<td><input placeholder="YYYY-MM-DD" type="text" class="form-control" name="input-projectsDate" value="'.$item["date"].'"></td>'.
                                    '<td>
                                                        <a class="add add-projects" title="Add" ><i class="material-icons"></i></a>
                                                        <a class="delete delete-projects" title="Delete" ><i class="material-icons"></i></a>
                                                    </td>'.
                                    '</tr>';
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Contact Container -->
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="container">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8"><h2>Contact</h2></div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-info add-new add-new-contact"><i class="fa fa-plus"></i> Add New</button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-contact">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Link</th>
                            <th>Name</th>
                            <th>Style</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr hidden>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a class="add add-contact" title="Add" ><i class="material-icons"></i></a>
                                <a class="delete delete-contact" title="Delete" ><i class="material-icons"></i></a>
                            </td>
                        </tr>
                        <?php
                        $input_contact = $businessManager->contactGetir();
                        if(!empty($input_contact)){
                            foreach ($input_contact as $item){
                                echo '<tr>'.
                                    '<td><input readonly type="text" class="form-control" name="input-idContact" value="'.$item["idContact"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-contactLink" value="'.$item["link"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-contactName" value="'.$item["name"].'"></td>'.
                                    '<td><input type="text" class="form-control" name="input-contactStyle" value="'.$item["style"].'"></td>'.
                                    '<td>
                                                        <a class="add add-contact" title="Add" ><i class="material-icons"></i></a>
                                                        <a class="delete delete-contact" title="Delete" ><i class="material-icons"></i></a>
                                                    </td>'.
                                    '</tr>';
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Images List Container -->
        <div class="tab-pane fade" id="nav-images-list" role="tabpanel" aria-labelledby="nav-images-list-tab">
            <div class="card-columns mt-5">
                <?php
                $resimler = $businessManager->imagesGetir();
                if(!empty($resimler)){
                    foreach ($resimler as $item){
                        echo '<tr>'.
                            '<div class="card">
                                    <img class="card-img-top" src="img/'. $item["imagesName"] .'" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Resim ismi: '. $item["imagesName"]. '</h5>
                                        <td><input hidden name="input-idImages" type="text" value="'. $item['idImages'] . '"></td>
                                        <td><input hidden name="input-imagesName" type="text" value="'. $item['imagesName'] . '"></td>
                                        <td><span class="btn-images-delete btn btn-primary btn-sm ">Resmi Sil</span></td>
                                    </div>
                              </div>'.
                            '</tr>';
                    }
                }
                else{
                    echo '<p> Ekli Resim yok </p>';
                }
                ?>

            </div>
        </div>
        <!-- Images Add Container -->
        <div class="tab-pane fade" id="nav-images-add" role="tabpanel" aria-labelledby="nav-images-add-tab">
            <div class="card  mt-5" style="">
                <div class="card-header">
                    Fotoğraf yüklemek için dosya seç butonuna basıp bilgisayardan yüklenecek fotoğrafı seç.
                </div>
                <form id="form-images-add" class="row" METHOD="POST" action="">
                    <div class="input-group input-group-sm m-4">
                        <input style="padding-top: 2rem; padding-bottom: 3rem;" class="form-control" type="file" id="input-images-add" name="input-images-add" placeholder="Images">
                    </div>
                    <div class="input-group input-group-sm ml-4 mb-4" >
                        <span id="btn-images-add" class="btn btn-primary btn-sm">Confirm</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Images -->
<script>
    $('#btn-images-add').on('click', function (){
        var formData = new FormData($("#form-images-add ")[0]);
        $.ajax({
            url: 'adminControl.php',
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(rep) {
                if(rep == '1'){
                    $("#alertModal .modal-body").text('Images kayıt edildi.');
                    location.href = 'admin.php.';
                }
                else if(rep == '90'){
                    $('#alertModal .modal-body').text('Bir resim seçiniz.');
                }
                else if(rep == '100'){
                    $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                }
                else{
                    $('#alertModal .modal-body').text(rep);
                }
                $('#alertModal').modal('show');
            }
        });
    });
    $(document).on("click", ".btn-images-delete", function(){
        var deleteRep = '';
        $.ajax({
            url: 'adminControl.php?',
            type: 'POST',
            data: ($(this).parents(".card").find('input[type="text"]')),
            success: function (rep){
                deleteRep = rep;
                if(rep == '1'){
                    $("#alertModal .modal-body").text('Images Silindi');
                    $(this).parents("tr").remove();
                }
                else if(rep == '91'){
                    $('#alertModal .modal-body').text('Images gelmedi, işlem başarısız.');
                }
                else if(rep == '100'){
                    $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                }
                else{
                    $("#alertModal .modal-body").text(rep);
                    $(this).parents("tr").remove();
                    $(".add-new").removeAttr("disabled");
                }
                $('#alertModal').modal('show');
            }
        });
        if((deleteRep != '91') || (deleteRep != '100')){
            $(this).parents(".card").remove();
        }

    });
</script>

<!-- title vs. -->
<script>
    $('#btn-profile-image').on('click', function (){
        $.ajax({
            url: 'adminControl.php',
            type: "POST",
            data: $('#form-profile-image').serialize(),
            success: function(rep) {
                if(rep == '1'){
                    $("#alertModal .modal-body").text('Profil Image oluşturuldu.');
                    location.href = 'admin.php.';
                }
                else if(rep == '2'){
                    $('#alertModal .modal-body').text('Profil Image değiştirildi.');
                    location.href = 'admin.php.';
                }
                else if(rep == '90'){
                    $('#alertModal .modal-body').text('Boş yazı girmeyiniz.');
                }
                else if(rep == '91'){
                    $('#alertModal .modal-body').text('Profil Image bilgisi gelmedi, işlem başarısız.');
                }
                else if(rep == '100'){
                    $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                }
                else{
                    $('#alertModal .modal-body').text(rep);
                }
                $('#alertModal').modal('show');
            }
        });
    });
    $('#btn-profile-title').on('click', function (){
        $.ajax({
            url: 'adminControl.php',
            type: "POST",
            data: $('#form-profile-title').serialize(),
            success: function(rep) {
                if(rep == '1'){
                    $("#alertModal .modal-body").text('Profil başlığı oluşturuldu.');
                }
                else if(rep == '2'){
                    $('#alertModal .modal-body').text('Profil başlığı değiştirildi.');
                }
                else if(rep == '90'){
                    $('#alertModal .modal-body').text('Boş yazı girmeyiniz.');
                }
                else if(rep == '91'){
                    $('#alertModal .modal-body').text('Profil bilgisi gelmedi, işlem başarısız.');
                }
                else if(rep == '100'){
                    $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                }
                else{
                    $('#alertModal .modal-body').text(rep);
                }
                $('#alertModal').modal('show');
            }
        });
    });
    $('#btn-profile-about-me').on('click', function (){
        $.ajax({
            url: 'adminControl.php',
            type: "POST",
            data: $('#form-profile-about-me').serialize(),
            success: function(rep) {
                if(rep == '1'){
                    $("#alertModal .modal-body").text('About Me oluşturuldu.');
                }
                else if(rep == '2'){
                    $('#alertModal .modal-body').text('About Me değiştirildi.');
                }
                else if(rep == '90'){
                    $('#alertModal .modal-body').text('Boş yazı girmeyiniz.');
                }
                else if(rep == '91'){
                    $('#alertModal .modal-body').text('About Me bilgisi gelmedi, işlem başarısız.');
                }
                else if(rep == '100'){
                    $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                }
                else{
                    $('#alertModal .modal-body').text(rep);
                }
                $('#alertModal').modal('show');
            }
        });
    });
    $('#btn-profile-details').on('click', function (){
        $.ajax({
            url: 'adminControl.php',
            type: "POST",
            data: $('#form-profile-details').serialize(),
            success: function(rep) {
                if(rep == '1'){
                    $("#alertModal .modal-body").text('Details oluşturuldu.');
                }
                else if(rep == '2'){
                    $('#alertModal .modal-body').text('Details değiştirildi.');
                }
                else if(rep == '90'){
                    $('#alertModal .modal-body').text('Boş yazı girmeyiniz.');
                }
                else if(rep == '91'){
                    $('#alertModal .modal-body').text('Details bilgisi gelmedi, işlem başarısız.');
                }
                else if(rep == '100'){
                    $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                }
                else{
                    $('#alertModal .modal-body').text(rep);
                }
                $('#alertModal').modal('show');
            }
        });
    });
    $('#btn-experiences-title').on('click', function (){
        $.ajax({
            url: 'adminControl.php',
            type: 'POST',
            data: $('#form-experiences-title').serialize(),
            success: function (rep){
                if(rep == '1'){
                    $("#alertModal .modal-body").text('Experiences Title oluşturuldu.');
                }
                else if(rep == '2'){
                    $('#alertModal .modal-body').text('Experiences Title değiştirildi.');
                }
                else if(rep == '90'){
                    $('#alertModal .modal-body').text('Boş alan bırakmayınız.');
                }
                else if(rep == '91'){
                    $('#alertModal .modal-body').text('Experiences Title bilgisi gelmedi, işlem başarısız.');
                }
                else if(rep == '100'){
                    $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                }
                else{
                    $('#alertModal .modal-body').text(rep);
                }
                $('#alertModal').modal('show');
            }
        });
    });
    $('#btn-abilities-title').on('click', function (){
        $.ajax({
            url: 'adminControl.php',
            type: 'POST',
            data: $('#form-abilities-title').serialize(),
            success: function (rep){
                if(rep == '1'){
                    $("#alertModal .modal-body").text('Abilities Title oluşturuldu.');
                }
                else if(rep == '2'){
                    $('#alertModal .modal-body').text('Abilities Title değiştirildi.');
                }
                else if(rep == '90'){
                    $('#alertModal .modal-body').text('Boş alan bırakmayınız.');
                }
                else if(rep == '91'){
                    $('#alertModal .modal-body').text('Abilities Title bilgisi gelmedi, işlem başarısız.');
                }
                else if(rep == '100'){
                    $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                }
                else{
                    $('#alertModal .modal-body').text(rep);
                }
                $('#alertModal').modal('show');
            }
        });
    });

</script>

<!-- Experiences Educations -->
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        var actions = $("table td:last-child").html();
        // Append table with add row form on add new button click
        $(".add-new-experiences-educations").click(function(){
            $(this).attr("disabled", "disabled");
            var row = '<tr>' +
                '<td><input readonly type="text" class="form-control" name="input-idEducations" value="NULL"></td>' +
                '<td><input type="text" class="form-control" name="input-educationsTitle"></td>' +
                '<td><input type="text" class="form-control" name="input-educationsDate"></td>' +
                '<td><input type="text" class="form-control" name="input-educationsHeader"></td>' +
                '<td><input type="text" class="form-control" name="input-educationsDetails"></td>' +
                '<td><input type="text" class="form-control" name="input-educationsLocation"></td>' +
                '<td>' +
                '<a class="add add-experiences-educations" title="Add" ><i class="material-icons"></i></a>' +
                '<a class="delete delete-experiences-educations" title="Delete" ><i class="material-icons"></i></a>' +
                '</td>' +
                '</tr>';
            $(".table-experiences-educations").append(row);
            $('[data-toggle="tooltip"]').tooltip();
        });
        // Add row on add button click
        $(document).on("click", ".add-experiences-educations", function(){
            var empty = false;
            var input = $(this).parents("tr").find('input[type="text"]');
            $.ajax({
                url: 'adminControl.php',
                type: 'POST',
                data: ($(this).parents("tr").find('input[type="text"]')),
                success: function (rep){
                    if(rep == '2'){
                        $('#alertModal .modal-body').text('Educations değiştirildi.');
                    }
                    else if(rep == '90'){
                        $('#alertModal .modal-body').text('Boş alan bırakmayınız.');
                    }
                    else if(rep == '91'){
                        $('#alertModal .modal-body').text('Educations bilgisi gelmedi, işlem başarısız.');
                    }
                    else if(rep == '100'){
                        $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                    }
                    else{
                        $("#alertModal .modal-body").text('Educations oluşturuldu. id = ' + rep);
                        input.each(function (){
                            if($(this).val() == "NULL"){
                                $(this).parents("td").html('<input readonly type="text" class="form-control" name="input-idEducations" value="' + rep + '">');
                            }
                        });
                    }
                    $('#alertModal').modal('show');
                }
            });
            input.each(function(){
                if(!$(this).val()){
                    $(this).addClass("error");
                    empty = true;
                } else{
                    $(this).removeClass("error");
                }
            });
            $(this).parents("tr").find(".error").first().focus();
            if(!empty){
                $(".add-new").removeAttr("disabled");
            }
        });
        // Delete row on delete button click
        $(document).on("click", ".delete-experiences-educations", function(){
            var deleteRep = '';
            $.ajax({
                url: 'adminControl.php?delete=0',
                type: 'POST',
                data: ($(this).parents("tr").find('input[type="text"]')),
                success: function (rep){
                    deleteRep = rep;
                    if(rep == '1'){
                        $("#alertModal .modal-body").text('Satır Kaldırıldı');
                        $(this).parents("tr").remove();
                        $(".add-new").removeAttr("disabled");
                    }
                    else if(rep == '91'){
                        $('#alertModal .modal-body').text('Educations bilgisi gelmedi, işlem başarısız.');
                    }
                    else if(rep == '100'){
                        $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                    }
                    else{
                        $("#alertModal .modal-body").text(rep);
                        $(this).parents("tr").remove();
                        $(".add-new").removeAttr("disabled");
                    }
                    $('#alertModal').modal('show');
                }
            });
            if((deleteRep != '91') || (deleteRep != '100')){
                $(this).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            }

        });
    });
</script>
<!-- Experiences Careers -->
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        var actions = $("table td:last-child").html();
        // Append table with add row form on add new button click
        $(".add-new-experiences-careers").click(function(){
            $(this).attr("disabled", "disabled");
            var row = '<tr>' +
                '<td><input readonly type="text" class="form-control" name="input-idCareers" value="NULL"></td>' +
                '<td><input type="text" class="form-control" name="input-careersTitle"></td>' +
                '<td><input type="text" class="form-control" name="input-careersDate"></td>' +
                '<td><input type="text" class="form-control" name="input-careersHeader"></td>' +
                '<td><input type="text" class="form-control" name="input-careersDetails"></td>' +
                '<td><input type="text" class="form-control" name="input-careersLocation"></td>' +
                '<td>' +
                    '<a class="add add-experiences-careers" title="Add" ><i class="material-icons"></i></a>' +
                    '<a class="delete delete-experiences-careers" title="Delete" ><i class="material-icons"></i></a>' +
                    '</td>' +
                '</tr>';
            $(".table-experiences-careers").append(row);
            $('[data-toggle="tooltip"]').tooltip();
        });
        // Add row on add button click
        $(document).on("click", ".add-experiences-careers", function(){
            var empty = false;
            var input = $(this).parents("tr").find('input[type="text"]');
            $.ajax({
                url: 'adminControl.php',
                type: 'POST',
                data: ($(this).parents("tr").find('input[type="text"]')),
                success: function (rep){
                    if(rep == '2'){
                        $('#alertModal .modal-body').text('Careers değiştirildi.');
                    }
                    else if(rep == '90'){
                        $('#alertModal .modal-body').text('Boş alan bırakmayınız.');
                    }
                    else if(rep == '91'){
                        $('#alertModal .modal-body').text('Careers bilgisi gelmedi, işlem başarısız.');
                    }
                    else if(rep == '100'){
                        $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                    }
                    else{
                        $("#alertModal .modal-body").text('Careers oluşturuldu. id = ' + rep);
                        input.each(function (){
                            if($(this).val() == "NULL"){
                                $(this).parents("td").html('<input readonly type="text" class="form-control" name="input-idCareers" value="' + rep + '">');
                            }
                        });
                    }
                    $('#alertModal').modal('show');
                }
            });
            input.each(function(){
                if(!$(this).val()){
                    $(this).addClass("error");
                    empty = true;
                } else{
                    $(this).removeClass("error");
                }
            });
            $(this).parents("tr").find(".error").first().focus();
            if(!empty){
                $(".add-new").removeAttr("disabled");
            }
        });
        // Delete row on delete button click
        $(document).on("click", ".delete-experiences-careers", function(){
            var deleteRep = '';
            $.ajax({
                url: 'adminControl.php?delete=0',
                type: 'POST',
                data: ($(this).parents("tr").find('input[type="text"]')),
                success: function (rep){
                    deleteRep = rep;
                    if(rep == '1'){
                        $("#alertModal .modal-body").text('Satır Kaldırıldı');
                        $(this).parents("tr").remove();
                        $(".add-new").removeAttr("disabled");
                    }
                    else if(rep == '91'){
                        $('#alertModal .modal-body').text('Careers bilgisi gelmedi, işlem başarısız.');
                    }
                    else if(rep == '100'){
                        $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                    }
                    else{
                        $("#alertModal .modal-body").text(rep);
                        $(this).parents("tr").remove();
                        $(".add-new").removeAttr("disabled");
                    }
                    $('#alertModal').modal('show');
                }
            });
            if((deleteRep != '91') || (deleteRep != '100')){
                $(this).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            }

        });
    });
</script>

<!-- Abilities Skills -->
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        var actions = $("table td:last-child").html();
        // Append table with add row form on add new button click
        $(".add-new-abilities-skills").click(function(){
            $(this).attr("disabled", "disabled");
            var row = '<tr>' +
                '<td><input readonly type="text" class="form-control" name="input-idSkills" value="NULL"></td>' +
                '<td><input type="text" class="form-control" name="input-skillsName"></td>' +
                '<td><input type="text" class="form-control" name="input-skillsScore"></td>' +
                '<td>' +
                '<a class="add add-abilities-skills" title="Add" ><i class="material-icons"></i></a>' +
                '<a class="delete delete-abilities-skills" title="Delete" ><i class="material-icons"></i></a>' +
                '</td>' +
                '</tr>';
            $(".table-abilities-skills").append(row);
            $('[data-toggle="tooltip"]').tooltip();
        });
        // Add row on add button click
        $(document).on("click", ".add-abilities-skills", function(){
            var empty = false;
            var input = $(this).parents("tr").find('input[type="text"]');
            $.ajax({
                url: 'adminControl.php',
                type: 'POST',
                data: ($(this).parents("tr").find('input[type="text"]')),
                success: function (rep){
                    if(rep == '2'){
                        $('#alertModal .modal-body').text('Skills değiştirildi.');
                    }
                    else if(rep == '90'){
                        $('#alertModal .modal-body').text('Boş alan bırakmayınız.');
                    }
                    else if(rep == '91'){
                        $('#alertModal .modal-body').text('Skills bilgisi gelmedi, işlem başarısız.');
                    }
                    else if(rep == '100'){
                        $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                    }
                    else{
                        $("#alertModal .modal-body").text('Skills oluşturuldu. id = ' + rep);
                        input.each(function (){
                            if($(this).val() == "NULL"){
                                $(this).parents("td").html('<input readonly type="text" class="form-control" name="input-idSkills" value="' + rep + '">');
                            }
                        });
                    }
                    $('#alertModal').modal('show');
                }
            });
            input.each(function(){
                if(!$(this).val()){
                    $(this).addClass("error");
                    empty = true;
                } else{
                    $(this).removeClass("error");
                }
            });
            $(this).parents("tr").find(".error").first().focus();
            if(!empty){
                $(".add-new").removeAttr("disabled");
            }
        });
        // Delete row on delete button click
        $(document).on("click", ".delete-abilities-skills", function(){
            var deleteRep = '';
            $.ajax({
                url: 'adminControl.php?delete=0',
                type: 'POST',
                data: ($(this).parents("tr").find('input[type="text"]')),
                success: function (rep){
                    deleteRep = rep;
                    if(rep == '1'){
                        $("#alertModal .modal-body").text('Satır Kaldırıldı');
                        $(this).parents("tr").remove();
                        $(".add-new").removeAttr("disabled");
                    }
                    else if(rep == '91'){
                        $('#alertModal .modal-body').text('Skills bilgisi gelmedi, işlem başarısız.');
                    }
                    else if(rep == '100'){
                        $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                    }
                    else{
                        $("#alertModal .modal-body").text(rep);
                        $(this).parents("tr").remove();
                        $(".add-new").removeAttr("disabled");
                    }
                    $('#alertModal').modal('show');
                }
            });
            if((deleteRep != '91') || (deleteRep != '100')){
                $(this).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            }

        });
    });
</script>
<!-- Abilities Languages -->
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        var actions = $("table td:last-child").html();
        // Append table with add row form on add new button click
        $(".add-new-abilities-languages").click(function(){
            $(this).attr("disabled", "disabled");
            var row = '<tr>' +
                '<td><input readonly type="text" class="form-control" name="input-idLanguages" value="NULL"></td>' +
                '<td><input type="text" class="form-control" name="input-languagesName"></td>' +
                '<td><input type="text" class="form-control" name="input-languagesScore"></td>' +
                '<td>' +
                '<a class="add add-abilities-languages" title="Add" ><i class="material-icons"></i></a>' +
                '<a class="delete delete-abilities-languages" title="Delete" ><i class="material-icons"></i></a>' +
                '</td>' +
                '</tr>';
            $(".table-abilities-languages").append(row);
            $('[data-toggle="tooltip"]').tooltip();
        });
        // Add row on add button click
        $(document).on("click", ".add-abilities-languages", function(){
            var empty = false;
            var input = $(this).parents("tr").find('input[type="text"]');
            $.ajax({
                url: 'adminControl.php',
                type: 'POST',
                data: ($(this).parents("tr").find('input[type="text"]')),
                success: function (rep){
                    if(rep == '2'){
                        $('#alertModal .modal-body').text('Languages değiştirildi.');
                    }
                    else if(rep == '90'){
                        $('#alertModal .modal-body').text('Boş alan bırakmayınız.');
                    }
                    else if(rep == '91'){
                        $('#alertModal .modal-body').text('Languages bilgisi gelmedi, işlem başarısız.');
                    }
                    else if(rep == '100'){
                        $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                    }
                    else{
                        $("#alertModal .modal-body").text('Languages oluşturuldu. id = ' + rep);
                        input.each(function (){
                            if($(this).val() == "NULL"){
                                $(this).parents("td").html('<input readonly type="text" class="form-control" name="input-idLanguages" value="' + rep + '">');
                            }
                        });
                    }
                    $('#alertModal').modal('show');
                }
            });
            input.each(function(){
                if(!$(this).val()){
                    $(this).addClass("error");
                    empty = true;
                } else{
                    $(this).removeClass("error");
                }
            });
            $(this).parents("tr").find(".error").first().focus();
            if(!empty){
                $(".add-new").removeAttr("disabled");
            }
        });
        // Delete row on delete button click
        $(document).on("click", ".delete-abilities-languages", function(){
            var deleteRep = '';
            $.ajax({
                url: 'adminControl.php?delete=0',
                type: 'POST',
                data: ($(this).parents("tr").find('input[type="text"]')),
                success: function (rep){
                    deleteRep = rep;
                    if(rep == '1'){
                        $("#alertModal .modal-body").text('Satır Kaldırıldı');
                        $(this).parents("tr").remove();
                        $(".add-new").removeAttr("disabled");
                    }
                    else if(rep == '91'){
                        $('#alertModal .modal-body').text('Languages bilgisi gelmedi, işlem başarısız.');
                    }
                    else if(rep == '100'){
                        $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                    }
                    else{
                        $("#alertModal .modal-body").text(rep);
                        $(this).parents("tr").remove();
                        $(".add-new").removeAttr("disabled");
                    }
                    $('#alertModal').modal('show');
                }
            });
            if((deleteRep != '91') || (deleteRep != '100')){
                $(this).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            }

        });
    });
</script>
<!-- Abilities Tools -->
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        var actions = $("table td:last-child").html();
        // Append table with add row form on add new button click
        $(".add-new-abilities-tools").click(function(){
            $(this).attr("disabled", "disabled");
            var row = '<tr>' +
                '<td><input readonly type="text" class="form-control" name="input-idTools" value="NULL"></td>' +
                '<td><input type="text" class="form-control" name="input-toolsName"></td>' +
                '<td><input type="text" class="form-control" name="input-toolsScore"></td>' +
                '<td>' +
                '<a class="add add-abilities-tools" title="Add" ><i class="material-icons"></i></a>' +
                '<a class="delete delete-abilities-tools" title="Delete" ><i class="material-icons"></i></a>' +
                '</td>' +
                '</tr>';
            $(".table-abilities-tools").append(row);
            $('[data-toggle="tooltip"]').tooltip();
        });
        // Add row on add button click
        $(document).on("click", ".add-abilities-tools", function(){
            var empty = false;
            var input = $(this).parents("tr").find('input[type="text"]');
            $.ajax({
                url: 'adminControl.php',
                type: 'POST',
                data: ($(this).parents("tr").find('input[type="text"]')),
                success: function (rep){
                    if(rep == '2'){
                        $('#alertModal .modal-body').text('Tools değiştirildi.');
                    }
                    else if(rep == '90'){
                        $('#alertModal .modal-body').text('Boş alan bırakmayınız.');
                    }
                    else if(rep == '91'){
                        $('#alertModal .modal-body').text('Tools bilgisi gelmedi, işlem başarısız.');
                    }
                    else if(rep == '100'){
                        $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                    }
                    else{
                        $("#alertModal .modal-body").text('Tools oluşturuldu. id = ' + rep);
                        input.each(function (){
                            if($(this).val() == "NULL"){
                                $(this).parents("td").html('<input readonly type="text" class="form-control" name="input-idTools" value="' + rep + '">');
                            }
                        });
                    }
                    $('#alertModal').modal('show');
                }
            });
            input.each(function(){
                if(!$(this).val()){
                    $(this).addClass("error");
                    empty = true;
                } else{
                    $(this).removeClass("error");
                }
            });
            $(this).parents("tr").find(".error").first().focus();
            if(!empty){
                $(".add-new").removeAttr("disabled");
            }
        });
        // Delete row on delete button click
        $(document).on("click", ".delete-abilities-tools", function(){
            var deleteRep = '';
            $.ajax({
                url: 'adminControl.php?delete=0',
                type: 'POST',
                data: ($(this).parents("tr").find('input[type="text"]')),
                success: function (rep){
                    deleteRep = rep;
                    if(rep == '1'){
                        $("#alertModal .modal-body").text('Satır Kaldırıldı');
                        $(this).parents("tr").remove();
                        $(".add-new").removeAttr("disabled");
                    }
                    else if(rep == '91'){
                        $('#alertModal .modal-body').text('Tools bilgisi gelmedi, işlem başarısız.');
                    }
                    else if(rep == '100'){
                        $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                    }
                    else{
                        $("#alertModal .modal-body").text(rep);
                        $(this).parents("tr").remove();
                        $(".add-new").removeAttr("disabled");
                    }
                    $('#alertModal').modal('show');
                }
            });
            if((deleteRep != '91') || (deleteRep != '100')){
                $(this).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            }

        });
    });
</script>

<!-- Projects -->
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        var actions = $("table td:last-child").html();
        // Append table with add row form on add new button click
        $(".add-new-projects").click(function(){
            $(this).attr("disabled", "disabled");
            var row = '<tr>' +
                '<td><input readonly type="text" class="form-control" name="input-idFigcaption" value="NULL"></td>' +
                '<td><input type="text" class="form-control" name="input-projectsName"></td>' +
                '<td><input type="text" class="form-control" name="input-projectsDetails"></td>' +
                '<td><input type="text" class="form-control" name="input-projectsTags"></td>' +
                '<td><input type="text" class="form-control" name="input-projectsImageName"></td>' +
                '<td><input type="text" class="form-control" name="input-projectsLink"></td>' +
                '<td><input style="font-size: .8rem" placeholder="YYYY-MM-DD" type="text" class="form-control" name="input-projectsDate"></td>' +
                '<td>' +
                '<a class="add add-projects" title="Add" ><i class="material-icons"></i></a>' +
                '<a class="delete delete-projects" title="Delete" ><i class="material-icons"></i></a>' +
                '</td>' +
                '</tr>';
            $(".table-projects").append(row);
            $('[data-toggle="tooltip"]').tooltip();
        });
        // Add row on add button click
        $(document).on("click", ".add-projects", function(){
            var empty = false;
            var input = $(this).parents("tr").find('input[type="text"]');
            $.ajax({
                url: 'adminControl.php',
                type: 'POST',
                data: ($(this).parents("tr").find('input[type="text"]')),
                success: function (rep){
                    if(rep == '2'){
                        $('#alertModal .modal-body').text('Projects değiştirildi.');
                    }
                    else if(rep == '90'){
                        $('#alertModal .modal-body').text('Boş alan bırakmayınız.');
                    }
                    else if(rep == '91'){
                        $('#alertModal .modal-body').text('Projects bilgisi gelmedi, işlem başarısız.');
                    }
                    else if(rep == '100'){
                        $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                    }
                    else{
                        $("#alertModal .modal-body").text('Projects oluşturuldu. id = ' + rep);
                        input.each(function (){
                            if($(this).val() == "NULL"){
                                $(this).parents("td").html('<input readonly type="text" class="form-control" name="input-idProjects" value="' + rep + '">');
                            }
                        });
                    }
                    $('#alertModal').modal('show');
                }
            });
            input.each(function(){
                if(!$(this).val()){
                    $(this).addClass("error");
                    empty = true;
                } else{
                    $(this).removeClass("error");
                }
            });
            $(this).parents("tr").find(".error").first().focus();
            if(!empty){
                $(".add-new").removeAttr("disabled");
            }
        });
        // Delete row on delete button click
        $(document).on("click", ".delete-projects", function(){
            var deleteRep = '';
            $.ajax({
                url: 'adminControl.php?delete=0',
                type: 'POST',
                data: ($(this).parents("tr").find('input[type="text"]')),
                success: function (rep){
                    deleteRep = rep;
                    if(rep == '1'){
                        $("#alertModal .modal-body").text('Satır Kaldırıldı');
                        $(this).parents("tr").remove();
                        $(".add-new").removeAttr("disabled");
                    }
                    else if(rep == '91'){
                        $('#alertModal .modal-body').text('projects bilgisi gelmedi, işlem başarısız.');
                    }
                    else if(rep == '100'){
                        $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                    }
                    else{
                        $("#alertModal .modal-body").text(rep);
                        $(this).parents("tr").remove();
                        $(".add-new").removeAttr("disabled");
                    }
                    $('#alertModal').modal('show');
                }
            });
            if((deleteRep != '91') || (deleteRep != '100')){
                $(this).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            }

        });
    });
</script>

<!-- Contact -->
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        var actions = $("table td:last-child").html();
        // Append table with add row form on add new button click
        $(".add-new-contact").click(function(){
            $(this).attr("disabled", "disabled");
            var row = '<tr>' +
                '<td><input readonly type="text" class="form-control" name="input-idContact" value="NULL"></td>' +
                '<td><input type="text" class="form-control" name="input-contactLink"></td>' +
                '<td><input type="text" class="form-control" name="input-contactName"></td>' +
                '<td><input type="text" class="form-control" name="input-contactStyle"></td>' +
                '<td>' +
                '<a class="add add-contact" title="Add" ><i class="material-icons"></i></a>' +
                '<a class="delete delete-contact" title="Delete" ><i class="material-icons"></i></a>' +
                '</td>' +
                '</tr>';
            $(".table-contact").append(row);
            $('[data-toggle="tooltip"]').tooltip();
        });
        // Add row on add button click
        $(document).on("click", ".add-contact", function(){
            var empty = false;
            var input = $(this).parents("tr").find('input[type="text"]');
            $.ajax({
                url: 'adminControl.php',
                type: 'POST',
                data: ($(this).parents("tr").find('input[type="text"]')),
                success: function (rep){
                    if(rep == '2'){
                        $('#alertModal .modal-body').text('Contact değiştirildi.');
                    }
                    else if(rep == '90'){
                        $('#alertModal .modal-body').text('Boş alan bırakmayınız.');
                    }
                    else if(rep == '91'){
                        $('#alertModal .modal-body').text('Contact bilgisi gelmedi, işlem başarısız.');
                    }
                    else if(rep == '100'){
                        $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                    }
                    else{
                        $("#alertModal .modal-body").text('Contact oluşturuldu. id = ' + rep);
                        input.each(function (){
                            if($(this).val() == "NULL"){
                                $(this).parents("td").html('<input readonly type="text" class="form-control" name="input-idContact" value="' + rep + '">');
                            }
                        });
                    }
                    $('#alertModal').modal('show');
                }
            });
            input.each(function(){
                if(!$(this).val()){
                    $(this).addClass("error");
                    empty = true;
                } else{
                    $(this).removeClass("error");
                }
            });
            $(this).parents("tr").find(".error").first().focus();
            if(!empty){
                $(".add-new").removeAttr("disabled");
            }
        });
        // Delete row on delete button click
        $(document).on("click", ".delete-contact", function(){
            var deleteRep = '';
            $.ajax({
                url: 'adminControl.php?delete=0',
                type: 'POST',
                data: ($(this).parents("tr").find('input[type="text"]')),
                success: function (rep){
                    deleteRep = rep;
                    if(rep == '1'){
                        $("#alertModal .modal-body").text('Satır Kaldırıldı');
                        $(this).parents("tr").remove();
                        $(".add-new").removeAttr("disabled");
                    }
                    else if(rep == '91'){
                        $('#alertModal .modal-body').text('Contact bilgisi gelmedi, işlem başarısız.');
                    }
                    else if(rep == '100'){
                        $('#alertModal .modal-body').text('Bilinmeyen bir hata oluştu.');
                    }
                    else{
                        $("#alertModal .modal-body").text(rep);
                        $(this).parents("tr").remove();
                        $(".add-new").removeAttr("disabled");
                    }
                    $('#alertModal').modal('show');
                }
            });
            if((deleteRep != '91') || (deleteRep != '100')){
                $(this).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            }

        });
    });
</script>




</body>
</html>
