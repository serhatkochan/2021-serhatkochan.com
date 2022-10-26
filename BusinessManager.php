<?php

class BusinessManager{
    private $baseDAO;

    public function __construct(){
        require_once('MySQLDAO.php'); // istedigimiz veritabanı sınfıını buraya dahil ediyoruz;
        $this->baseDAO = new MySQLDAO();
    }

    // login bilgilerini getirir
    public function loginGetir($idLogin = NULl){
        return $this->baseDAO->loginGetir($idLogin);
    }

    // profil bilgileri
    public function profilBasligiOlustur($profile){
        $this->baseDAO->profilBasligiOlustur($profile);
    }
    public function profilBasligiSil($idProfile){
        $this->baseDAO->profilBasligiSil();
    }
    public function profilBasligiGuncelle($idProfile, $profile){
        $this->baseDAO->profilBasligiGuncelle($idProfile, $profile);
    }
    public function profilBasligiGetir($idProfile = NULL){
        return $this->baseDAO->profilBasligiGetir($idProfile);
    }
    // image bilgileri
    public function profileImageOlustur($imageName){
        $this->baseDAO->profileImageOlustur($imageName);
    }
    public function profileImageSil($idProfileImage){
        $this->baseDAO->profileImageSil($idProfileImage);
    }
    public function profileImageGuncelle($idProfileImage, $imageName){
        $this->baseDAO->profileImageGuncelle($idProfileImage, $imageName);
    }
    public function profileImageGetir($idProfileImage = NULL){
        return $this->baseDAO->profileImageGetir($idProfileImage);
    }
    // about bilgileri
    public function aboutOlustur($about){
        $this->baseDAO->aboutOlustur($about);
    }
    public function aboutSil($idAbout){
        $this->baseDAO->aboutSil($idAbout);
    }
    public function aboutGuncelle($idAbout, $about){
        $this->baseDAO->aboutGuncelle($idAbout, $about);
    }
    public function aboutGetir($idAbout = NULL){
        return $this->baseDAO->aboutGetir($idAbout);
    }
    // details bilgileri
    public function detailsOlustur($name, $age, $location){
        $this->baseDAO->detailsOlustur($name, $age, $location);
    }
    public function detailsSil($idDetails){
        $this->baseDAO->detailsSil($idDetails);
    }
    public function detailsGuncelle($idDetails, $name, $age, $location){
        $this->baseDAO->detailsGuncelle($idDetails, $name, $age, $location);
    }
    public function detailsGetir($idDetails = NULL){
        return $this->baseDAO->detailsGetir($idDetails);
    }

    // experiences bilgileri
    public function experiencesBasligiOlustur($experiences){
        $this->baseDAO->experiencesBasligiOlustur($experiences);
    }
    public function experiencesBasligiSil($idExperiences){
        $this->baseDAO->experiencesBasligiSil($idExperiences);
    }
    public function experiencesBasligiGuncelle($idExperiences, $experiences){
        $this->baseDAO->experiencesBasligiGuncelle($idExperiences, $experiences);
    }
    public function experiencesBasligiGetir($idExperiences = NULl){
        return $this->baseDAO->experiencesBasligiGetir($idExperiences);
    }

    // educations bilgileri
    public function educationsOlustur($name, $date, $header, $details, $location){
        $this->baseDAO->educationsOlustur($name, $date, $header, $details, $location);
    }
    public function educationsSil($idEducations){
        $this->baseDAO->educationsSil($idEducations);
    }
    public function educationsGuncelle($idEducations, $name, $date, $header, $detatils, $location){
        $this->baseDAO->educationsGuncelle($idEducations, $name, $date, $header, $detatils, $location);
    }
    public function educationsGetir($idEducations = NULL, $idLast = NULL){
        return $this->baseDAO->educationsGetir($idEducations, $idLast);
    }

    // careers bilgileri
    public function careersOlustur($name, $date, $header, $details, $location){
        $this->baseDAO->careersOlustur($name, $date, $header, $details, $location);
    }
    public function careersSil($idCareers){
        $this->baseDAO->careersSil($idCareers);
    }
    public function careersGuncelle($idCareers, $name, $date, $header, $details, $location){
        $this->baseDAO->careersGuncelle($idCareers, $name, $date, $header, $details, $location);
    }
    public function careersGetir($idCareers = NULL, $idLast = NULL){
        return $this->baseDAO->careersGetir($idCareers, $idLast);
    }

    // abiles iblgileri
    public function abilitiesBasligiOllustur($abilities){
        $this->baseDAO->abilitiesBasligiOlustur($abilities);
    }
    public function abilitiesBasligiSil($idAbilities){
        $this->baseDAO->abilitiesBasligiSil($idAbilities);
    }
    public function abilitiesBasligiGuncelle($idAbilities, $abilities){
        $this->baseDAO->abilitiesBasligiGuncelle($idAbilities, $abilities);
    }
    public function abilitiesBasligiGetir($idAbilities = NULL){
        return $this->baseDAO->abilitiesBasligiGetir($idAbilities);
    }

    // skills bilgileri
    public function skillsOlustur($name, $score){
        $this->baseDAO->skillsOlustur($name, $score);
    }
    public function skillsSil($idSkills){
        $this->baseDAO->skillsSil($idSkills);
    }
    public function skillsGuncelle($idSkills, $name, $score){
        $this->baseDAO->skillsGuncelle($idSkills, $name, $score);
    }
    public function skillsGetir($idSkills = NULL, $idLast = NULL){
        return $this->baseDAO->skillsGetir($idSkills, $idLast);
    }

    // languages bilgileri
    public function languagesOlustur($name, $score){
        $this->baseDAO->languagesOlustur($name, $score);
    }
    public function languagesSil($idLanguages){
        $this->baseDAO->languagesSil($idLanguages);
    }
    public function languagesGuncelle($idLanguages, $name, $score){
        $this->baseDAO->languagesGuncelle($idLanguages, $name, $score);
    }
    public function languagesGetir($idLanguages = NULL, $idLast = NULL){
        return $this->baseDAO->languagesGetir($idLanguages, $idLast);
    }

    // tools bilgileri
    public function toolsOlustur($name, $score){
        $this->baseDAO->toolsOlustur($name, $score);
    }
    public function toolsSil($idTools){
        $this->baseDAO->toolsSil($idTools);
    }
    public function toolsGuncelle($idTools, $name, $score){
        $this->baseDAO->toolsGuncelle($idTools, $name, $score);
    }
    public function toolsGetir($idTools = NULL, $idLast = NULL){
        return $this->baseDAO->toolsGetir($idTools, $idLast);
    }

    //images bilgileri
    public function imagesOlustur($imagesName){
        $this->baseDAO->imagesOlustur($imagesName);
    }
    public function imagesSil($idImages){
        $this->baseDAO->imagesSil($idImages);
    }
    public function imagesGetir($idImages = NULL){
        return $this->baseDAO->imagesGetir($idImages);
    }

    // projects bilgileri
    public function figcaptionOlustur($name, $details, $tags, $image_name, $link, $date){
        $this->baseDAO->figcaptionOlustur($name, $details, $tags, $image_name, $link, $date);
    }
    public function figcaptionSil($idFigcaption){
        $this->baseDAO->figcaptionSil($idFigcaption);
    }
    public function figcaptionGuncelle($idFigcaption, $name, $details, $tags, $image_name, $link, $date){
        $this->baseDAO->figcaptionGuncelle($idFigcaption, $name, $details, $tags, $image_name, $link, $date);
    }
    public function figcaptionGetir($idFigcaption = NULL, $idLast = NULL){
        return $this->baseDAO->figcaptionGetir($idFigcaption, $idLast);
    }


    // contact bilgileri
    public function contactOlustur($link, $name, $style){
        $this->baseDAO->contactOlustur($link, $name, $style);
    }
    public function contactSil($idContact){
        $this->baseDAO->contactSil($idContact);
    }
    public function contactGuncelle($idContact, $link, $name, $style){
        $this->baseDAO->contactGuncelle($idContact, $link, $name, $style);
    }
    public function contactGetir($idContact = NULL, $idLast = NULL){
        return $this->baseDAO->contactGetir($idContact, $idLast);
    }






}