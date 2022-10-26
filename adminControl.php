<?php

if(!isset($_SESSION)) {
    session_start();
}

require_once('BusinessManager.php');
$businessManager = new BusinessManager();

// eger daha onceden giris yapildiysa baska ekrana atsin

// eger POST verileri gelmediyse bu ekrana hic girmesin
if(isset($_POST['input-profile-title'])){
    $profile_title = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-profile-title']))));
    if(empty($profile_title)){
        die('90'); // boş yazı
    }

    $titles = $businessManager->profilBasligiGetir();
    if(empty($titles)){
        $businessManager->profilBasligiOlustur($profile_title);
        die('1'); // profil basligi olusturuldu
    }
    else{
        if(isset($_POST['input-idProfile'])){
            $idProfile = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-idProfile']))));
            if(empty($idProfile)){
                die('91');
            }
            $businessManager->profilBasligiGuncelle($idProfile, $profile_title);
            die('2'); // profil basligi degistirildi
        }
        else{
            die('91'); // idProfile bilgisi gelmedi
        }
    }
}
else if(isset($_POST['input-profile-image'])){
    $profile_image = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-profile-image']))));
    if(empty($profile_image)){
        die('90'); // boş yazı
    }

    $images = $businessManager->profileImageGetir();
    if(empty($images)){
        $businessManager->profileImageOlustur($profile_image);
        die('1'); // profile image olusturuldu
    }
    else{
        if(isset($_POST['input-idProfileImage'])){
            $idProfileImage = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-idProfileImage']))));
            if(empty($idProfileImage)){
                die('91');
            }
            $businessManager->profileImageGuncelle($idProfileImage, $profile_image);
            die('2'); // profile image degistirildi
        }
        else{
            die('91'); // idProfileImage bilgisi gelmedi
        }
    }
}
else if(isset($_POST['input-profile-about-me'])){
    $profile_about_me = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-profile-about-me']))));
    if(empty($profile_about_me)){
        die('90'); // boş yazı
    }

    $about_me = $businessManager->aboutGetir();
    if(empty($about_me)){
        $businessManager->aboutOlustur($profile_about_me);
        die('1'); // profil basligi olusturuldu
    }
    else{
        if(isset($_POST['input-idAbout'])){
            $idAbout = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-idAbout']))));
            if(empty($idAbout)){
                die('91');
            }
            $businessManager->aboutGuncelle($idAbout, $profile_about_me);
            die('2'); // profil basligi degistirildi
        }
        else{
            die('91'); // idProfile bilgisi gelmedi
        }
    }
}
else if(isset($_POST['input-profile-details-name']) && isset($_POST['input-profile-details-age']) && isset($_POST['input-profile-details-location'])){
    $profile_details_name = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-profile-details-name']))));
    $profile_details_age = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-profile-details-age']))));
    $profile_details_location = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-profile-details-location']))));
    if(empty($profile_details_name) || empty($profile_details_age) || empty($profile_details_location)){
        die('90');
    }

    $details = $businessManager->detailsGetir();
    if(empty($details)){
        $businessManager->detailsOlustur($profile_details_name, $profile_details_age, $profile_details_location);
        die('1');
    }
    else{
        if(isset($_POST['input-idDetails'])){
            $idDetails = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-idDetails']))));
            if(empty($idDetails)){
                die('91');
            }
            $businessManager->detailsGuncelle($idDetails, $profile_details_name, $profile_details_age, $profile_details_location);
            die('2');
        }
        else{
            die('91');
        }
    }
}
else if(isset($_POST['input-experiences-title'])){
    $experiences_title = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-experiences-title']))));
    $experiences = $businessManager->experiencesBasligiGetir();
    if(empty($experiences)){
        $businessManager->experiencesBasligiOlustur($experiences_title);
        die('1');
    }
    else{
        if(isset($_POST['input-idExperiences'])){
            $idExperiences = $idDetails = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-idExperiences']))));
            if(empty($idExperiences)){
                die('91');
            }
            $businessManager->experiencesBasligiGuncelle($idExperiences, $experiences_title);
            die('2');
        }
        else{
            die('91');
        }
    }
}
else if(isset($_POST['input-educationsTitle']) && isset($_POST['input-educationsDate']) &&
    isset($_POST['input-educationsHeader']) && isset($_POST['input-educationsDetails']) && isset($_POST['input-educationsLocation'])){

    $delete = '';
    if(isset($_GET['delete'])){
        $delete = htmlspecialchars(strip_tags(addslashes(trim($_GET['delete']))));
    }
    $educationsTitle = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-educationsTitle']))));
    $educationsDate = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-educationsDate']))));
    $educationsHeader = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-educationsHeader']))));
    $educationsDetails = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-educationsDetails']))));
    $educationsLocation = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-educationsLocation']))));
    if(empty($educationsTitle) || empty($educationsDate) || empty($educationsHeader) || empty($educationsDetails) || empty($educationsLocation)){
        if($delete == '0'){
            die('1');
        }
        die('90');
    }
    else{
        if(isset($_POST['input-idEducations'])){
            $idEducations = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-idEducations']))));
            if(empty($idEducations)){
                die('91');
            }
            else if($idEducations == "NULL"){
                if($delete == '0'){
                    die('1');
                }
                $businessManager->educationsOlustur($educationsTitle, $educationsDate, $educationsHeader, $educationsDetails, $educationsLocation);
                $lastId = $businessManager->educationsGetir(NULL, 'idLast');
                $id = '';
                foreach ($lastId as $item){
                    $id =  $item['idEducations'];
                }
                die ($id);
            }
            if($delete == '0'){
                $businessManager->educationsSil($idEducations);
                die('Educations Silindi. Silinen id: '. $idEducations);
            }
            $businessManager->educationsGuncelle($idEducations, $educationsTitle, $educationsDate, $educationsHeader, $educationsDetails, $educationsLocation);
            die('2');
        }
    }
}
else if(isset($_POST['input-careersTitle']) && isset($_POST['input-careersDate']) &&
    isset($_POST['input-careersHeader']) && isset($_POST['input-careersDetails']) && isset($_POST['input-careersLocation'])){

    $delete = '';
    if(isset($_GET['delete'])){
        $delete = htmlspecialchars(strip_tags(addslashes(trim($_GET['delete']))));
    }
    $careersTitle = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-careersTitle']))));
    $careersDate = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-careersDate']))));
    $careersHeader = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-careersHeader']))));
    $careersDetails = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-careersDetails']))));
    $careersLocation = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-careersLocation']))));
    if(empty($careersTitle) || empty($careersDate) || empty($careersHeader) || empty($careersDetails) || empty($careersLocation)){
        if($delete == '0'){
            die('1');
        }
        die('90');
    }
    else{
        if(isset($_POST['input-idCareers'])){
            $idCareers = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-idCareers']))));
            if(empty($idCareers)){
                die('91');
            }
            else if($idCareers == "NULL"){
                if($delete == '0'){
                    die('1');
                }
                $businessManager->careersOlustur($careersTitle, $careersDate, $careersHeader, $careersDetails, $careersLocation);
                $lastId = $businessManager->careersGetir(NULL, 'idLast');
                $id = '';
                foreach ($lastId as $item){
                    $id =  $item['idCareers'];
                }
                die ($id);
            }
            if($delete == '0'){
                $businessManager->careersSil($idCareers);
                die('Careers Silindi. Silinen id: '. $idCareers);
            }
            $businessManager->careersGuncelle($idCareers, $careersTitle, $careersDate, $careersHeader, $careersDetails, $careersLocation);
            die('2');
        }
    }
}
else if(isset($_POST['input-abilities-title'])){
    $abilities_title = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-abilities-title']))));

    $abilities = $businessManager->abilitiesBasligiGetir();
    if(empty($abilities)){
        $businessManager->abilitiesBasligiOllustur($abilities_title);
        die('1');
    }
    else{
        if(isset($_POST['input-idAbilities'])){
            $idAbilities = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-idAbilities']))));
            if(empty($idAbilities)){
                die('91');
            }
            $businessManager->abilitiesBasligiGuncelle($idAbilities, $abilities_title);
            die('2');
        }
        else{
            die('91');
        }
    }
}
else if(isset($_POST['input-skillsName']) && isset($_POST['input-skillsScore'])){

    $delete = '';
    if(isset($_GET['delete'])){
        $delete = htmlspecialchars(strip_tags(addslashes(trim($_GET['delete']))));
    }
    $skillsName = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-skillsName']))));
    $skillsScore = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-skillsScore']))));
    if(empty($skillsName) || empty($skillsScore)){
        if($delete == '0'){
            die('1');
        }
        die('90');
    }
    else{
        if(isset($_POST['input-idSkills'])){
            $idSkills = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-idSkills']))));
            if(empty($idSkills)){
                die('91');
            }
            else if($idSkills == "NULL"){
                if($delete == '0'){
                    die('1');
                }
                $businessManager->skillsOlustur($skillsName, $skillsScore);
                $lastId = $businessManager->skillsGetir(NULL, 'idLast');
                $id = '';
                foreach ($lastId as $item){
                    $id =  $item['idSkills'];
                }
                die ($id);
            }
            if($delete == '0'){
                $businessManager->skillsSil($idSkills);
                die('Skills Silindi. Silinen id: '. $idSkills);
            }
            $businessManager->skillsGuncelle($idSkills, $skillsName, $skillsScore);
            die('2');
        }
    }
}
else if(isset($_POST['input-languagesName']) && isset($_POST['input-languagesScore'])){

    $delete = '';
    if(isset($_GET['delete'])){
        $delete = htmlspecialchars(strip_tags(addslashes(trim($_GET['delete']))));
    }
    $languagesName = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-languagesName']))));
    $languagesScore = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-languagesScore']))));
    if(empty($languagesName) || empty($languagesScore)){
        if($delete == '0'){
            die('1');
        }
        die('90');
    }
    else{
        if(isset($_POST['input-idLanguages'])){
            $idLanguages = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-idLanguages']))));
            if(empty($idLanguages)){
                die('91');
            }
            else if($idLanguages == "NULL"){
                if($delete == '0'){
                    die('1');
                }
                $businessManager->languagesOlustur($languagesName, $languagesScore);
                $lastId = $businessManager->languagesGetir(NULL, 'idLast');
                $id = '';
                foreach ($lastId as $item){
                    $id =  $item['idLanguages'];
                }
                die ($id);
            }
            if($delete == '0'){
                $businessManager->languagesSil($idLanguages);
                die('Languages Silindi. Silinen id: '. $idLanguages);
            }
            $businessManager->languagesGuncelle($idLanguages, $languagesName, $languagesScore);
            die('2');
        }
    }
}
else if(isset($_POST['input-toolsName']) && isset($_POST['input-toolsScore'])){
    $delete = '';
    if(isset($_GET['delete'])){
        $delete = htmlspecialchars(strip_tags(addslashes(trim($_GET['delete']))));
    }
    $toolsName = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-toolsName']))));
    $toolsScore = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-toolsScore']))));
    if(empty($toolsName) || empty($toolsScore)){
        if($delete == '0'){
            die('1');
        }
        die('90');
    }
    else{
        if(isset($_POST['input-idTools'])){
            $idTools = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-idTools']))));
            if(empty($idTools)){
                die('91');
            }
            else if($idTools == "NULL"){
                if($delete == '0'){
                    die('1');
                }
                $businessManager->toolsOlustur($toolsName, $toolsScore);
                $lastId = $businessManager->toolsGetir(NULL, 'idLast');
                $id = '';
                foreach ($lastId as $item){
                    $id =  $item['idTools'];
                }
                die ($id);
            }
            if($delete == '0'){
                $businessManager->toolsSil($idTools);
                die('Tools Silindi. Silinen id: '. $idTools);
            }
            $businessManager->toolsGuncelle($idTools, $toolsName, $toolsScore);
            die('2');
        }
    }
}
else if(isset($_POST['input-projectsName']) && isset($_POST['input-projectsDetails']) && isset($_POST['input-projectsTags']) &&
        isset($_POST['input-projectsImageName']) && isset($_POST['input-projectsLink']) && isset($_POST['input-projectsDate'])){
    $delete = '';
    if(isset($_GET['delete'])){
        $delete = htmlspecialchars(strip_tags(addslashes(trim($_GET['delete']))));
    }
    $projectsName = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-projectsName']))));
    $projectsDetails = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-projectsDetails']))));
    $projectsTags = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-projectsTags']))));
    $projectsImageName = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-projectsImageName']))));
    $projectsLink = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-projectsLink']))));
    $projectsDate = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-projectsDate']))));
    if(empty($projectsName) || empty($projectsDetails) || empty($projectsTags) || empty($projectsImageName) || empty($projectsLink) || empty($projectsDate)){
        if($delete == '0'){
            die('1');
        }
        die('90');
    }
    else{
        if(isset($_POST['input-idFigcaption'])){
            $idFigcaption = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-idFigcaption']))));
            if(empty($idFigcaption)){
                die('91');
            }
            else if($idFigcaption == "NULL"){
                if($delete == '0'){
                    die('1');
                }
                $businessManager->figcaptionOlustur($projectsName, $projectsDetails, $projectsTags, $projectsImageName, $projectsLink, $projectsDate);
                $lastId = $businessManager->figcaptionGetir(NULL, 'idLast');
                $id = '';
                foreach ($lastId as $item){
                    $id =  $item['idFigcaption'];
                }
                die ($id);
            }
            if($delete == '0'){
                $businessManager->figcaptionSil($idFigcaption);
                die('Figcaption Silindi. Silinen id: '. $idFigcaption);
            }
            $businessManager->figcaptionGuncelle($idFigcaption, $projectsName, $projectsDetails, $projectsTags, $projectsImageName, $projectsLink, $projectsDate);
            die('2');
        }
    }
}
else if(isset($_POST['input-contactLink']) && isset($_POST['input-contactName']) && isset($_POST['input-contactStyle'])){
    $delete = '';
    if(isset($_GET['delete'])){
        $delete = htmlspecialchars(strip_tags(addslashes(trim($_GET['delete']))));
    }
    $contactLink = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-contactLink']))));
    $contactName = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-contactName']))));
    $contactStyle = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-contactStyle']))));
    if(empty($contactLink) || empty($contactName) || empty($contactStyle)){
        if($delete == '0'){
            die('1');
        }
        die('90');
    }
    else{
        if(isset($_POST['input-idContact'])){
            $idContact = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-idContact']))));
            if(empty($idContact)){
                die('91');
            }
            else if($idContact == "NULL"){
                if($delete == '0'){
                    die('1');
                }
                $businessManager->contactOlustur($contactLink, $contactName, $contactStyle);
                $lastId = $businessManager->contactGetir(NULL, 'idLast');
                $id = '';
                foreach ($lastId as $item){
                    $id =  $item['idContact'];
                }
                die ($id);
            }
            if($delete == '0'){
                $businessManager->contactSil($idContact);
                die('Contact Silindi. Silinen id: '. $idContact);
            }
            $businessManager->contactGuncelle($idContact, $contactLink, $contactName, $contactStyle);
            die('2');
        }
    }
}
else if(isset($_POST['input-idImages'])){
    $idImages = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-idImages']))));
    $imagesName = htmlspecialchars(strip_tags(addslashes(trim($_POST['input-imagesName']))));
    if(empty($idImages) || empty($imagesName)){
        die('91');
    }
    else{
        $businessManager->imagesSil($idImages);
        unlink('img/'. $imagesName);
        die('1');
    }

}
else if(isset($_FILES)){
    // rep 1 : kayıt edildi, 90: bir resim seç, boş giremezsin, 91: Images bilgisi gelmedi
    $resimKaynagi = $_FILES["input-images-add"]["tmp_name"];
    if(empty($resimKaynagi)){
        die('90');
    }
    //$resimIsmi = $_FILES["input-images-add"]["name"];
    //$resimTuru = $_FILES["input-images-add"]["type"];
    //$resimBoyutu = $_FILES["input-images-add"]["size"];

    $kayitEdilecekYer = 'img';
    chmod($kayitEdilecekYer, 0755); // kayit edilecek klasöre izin verme

    $sabitResimUzantisi = '.png';
    $rastgeleIsim = substr(md5(uniqid(rand())), 0, 12);
    $resminYeniIsmi = $rastgeleIsim. $sabitResimUzantisi;

    // dosyaya kayit eder
    $dosyayaKayitEt = move_uploaded_file($resimKaynagi, $kayitEdilecekYer. '/'. $resminYeniIsmi);
    if($dosyayaKayitEt){ // true donerse
        $businessManager->imagesOlustur($resminYeniIsmi);
        die('1');
    }
    else{
        die('Dosya kayit edilirken bir hata olustu.');
    }
}
else{
    // rep 100 : Bilinmeyen Bir Hata Oluştu.
    die('100');
    exit();
}

?>