<?php

class MySQLDAO{
    private $host = '';
    private $dbName = '';

    private $dbUserName = '';
    private $dbUserPassword = '';
    private $connection = NULL;

    public function veritabaninaBaglan(){
        try {
            $this->connection  = new PDO("mysql:host=$this->host;dbname=$this->dbName;charset=utf8", $this->dbUserName, $this->dbUserPassword);
        } catch (PDOException $pe) {
            die("Veritabanına baglanti saglanamadi" . $pe->getMessage());
        }
    }
    public function veritabanındanCik(){
        $this->connection = null;
    }

    // profile
    public function profilBasligiOlustur($profile){
        $this->veritabaninaBaglan();
        $sql = "INSERT INTO
                tbl_profile(profile)
                values ('$profile')";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function profilBasligiSil($idProfile){
        $this->veritabaninaBaglan();
        $sql = "DELETE FROM  tbl_profile where `idProfile`='$idProfile'";

        $req = $this->connection->prepare($sql);
        $req->execute();

        $query = $this->connection->prepare($sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $res = $query->execute();
        if ($res == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function profilBasligiGuncelle($idProfile, $profile){
        $this->veritabaninaBaglan();

        $sql = "UPDATE tbl_profile 
                SET profile = '$profile'
                WHERE `idProfile`='$idProfile'";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('profilBasligiGuncelle hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('profilBasligiGuncelle Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function profilBasligiGetir($idProfile = NULL){
        $where = '';
        if($idProfile){
            $where = "WHERE `idProfile`='$idProfile'";
        }

        $this->veritabaninaBaglan();
        $sql = "SELECT * FROM tbl_profile ". $where;
        $res = $this->connection->prepare($sql);
        $res->execute();

        $toplantiBiglileri = $res->fetchAll();

        $this->veritabanındanCik();
        return $toplantiBiglileri;
    }
    // image
    public function profileImageOlustur($imageName){
        $this->veritabaninaBaglan();
        $sql = "INSERT INTO
                tbl_profile_image(imageName)
                values ('$imageName')";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function profileImageSil($idProfileImage){
        $this->veritabaninaBaglan();
        $sql = "DELETE FROM  tbl_profile_image where `idProfileImage`='$idProfileImage'";

        $req = $this->connection->prepare($sql);
        $req->execute();

        $query = $this->connection->prepare($sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $res = $query->execute();
        if ($res == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function profileImageGuncelle($idProfileImage, $imageName){
        $this->veritabaninaBaglan();

        $sql = "UPDATE tbl_profile_image 
                SET imageName = '$imageName'
                WHERE `idProfileImage`='$idProfileImage'";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('profilBasligiGuncelle hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('profilBasligiGuncelle Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function profileImageGetir($idProfileImage = NULL){
        $where = '';
        if($idProfileImage){
            $where = "WHERE `idProfileImage`='$idProfileImage'";
        }

        $this->veritabaninaBaglan();
        $sql = "SELECT * FROM tbl_profile_image ". $where;
        $res = $this->connection->prepare($sql);
        $res->execute();

        $toplantiBiglileri = $res->fetchAll();

        $this->veritabanındanCik();
        return $toplantiBiglileri;
    }
    // about
    public function aboutOlustur($about){
        $this->veritabaninaBaglan();
        $sql = "INSERT INTO
                tbl_about(about)
                values ('$about')";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function aboutSil($idAbout){
        $this->veritabaninaBaglan();
        $sql = "DELETE FROM  tbl_about where `idAbout`='$idAbout'";

        $req = $this->connection->prepare($sql);
        $req->execute();

        $query = $this->connection->prepare($sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $res = $query->execute();
        if ($res == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function aboutGuncelle($idAbout, $about){
        $this->veritabaninaBaglan();

        $sql = "UPDATE tbl_about 
                SET about = '$about'
                WHERE `idAbout`='$idAbout'";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('aboutGuncelle hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('aboutGuncelle Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function aboutGetir($idAbout = NULL){
        $where = '';
        if($idAbout){
            $where = "WHERE `idAbout`='$idAbout'";
        }

        $this->veritabaninaBaglan();
        $sql = "SELECT * FROM tbl_about ". $where;
        $res = $this->connection->prepare($sql);
        $res->execute();

        $toplantiBiglileri = $res->fetchAll();

        $this->veritabanındanCik();
        return $toplantiBiglileri;
    }
    // details
    public function detailsOlustur($name, $age, $location){
        $this->veritabaninaBaglan();
        $sql = "INSERT INTO
                tbl_details(name, age, location)
                values ('$name', '$age', '$location')";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function detailsSil($idDetails){
        $this->veritabaninaBaglan();
        $sql = "DELETE FROM  tbl_details where `idDetails`='$idDetails'";

        $req = $this->connection->prepare($sql);
        $req->execute();

        $query = $this->connection->prepare($sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $res = $query->execute();
        if ($res == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function detailsGuncelle($idDetails, $name, $age, $location){
        $this->veritabaninaBaglan();

        $sql = "UPDATE tbl_details 
                SET name = '$name', age = '$age', location = '$location'
                WHERE `idDetails`='$idDetails'";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('detailsGuncelle hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('detailsGuncelle Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function detailsGetir($idDetails = NULL){
        $where = '';
        if($idDetails){
            $where = "WHERE `idDetails`='$idDetails'";
        }

        $this->veritabaninaBaglan();
        $sql = "SELECT * FROM tbl_details ". $where;
        $res = $this->connection->prepare($sql);
        $res->execute();

        $toplantiBiglileri = $res->fetchAll();

        $this->veritabanındanCik();
        return $toplantiBiglileri;
    }


    // experiences
    public function experiencesBasligiOlustur($experiences){
        $this->veritabaninaBaglan();
        $sql = "INSERT INTO
                tbl_experiences(experiences)
                values ('$experiences')";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function experiencesBasligiSil($idExperiences){
        $this->veritabaninaBaglan();
        $sql = "DELETE FROM  tbl_experiences where `idExperiences`='$idExperiences'";

        $req = $this->connection->prepare($sql);
        $req->execute();

        $query = $this->connection->prepare($sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $res = $query->execute();
        if ($res == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function experiencesBasligiGuncelle($idExperiences, $experiences){
        $this->veritabaninaBaglan();

        $sql = "UPDATE tbl_experiences 
                SET experiences = '$experiences'
                WHERE `idExperiences`='$idExperiences'";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('experiencesGuncelle hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('experiencesGuncelle Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function experiencesBasligiGetir($idExperiences = NULL){
        $where = '';
        if($idExperiences){
            $where = "WHERE `idExperiences`='$idExperiences'";
        }

        $this->veritabaninaBaglan();
        $sql = "SELECT * FROM tbl_experiences ". $where;
        $res = $this->connection->prepare($sql);
        $res->execute();

        $toplantiBiglileri = $res->fetchAll();

        $this->veritabanındanCik();
        return $toplantiBiglileri;
    }
    // educations
    public function educationsOlustur($name, $date, $header, $details, $location){
        $this->veritabaninaBaglan();
        $sql = "INSERT INTO
                tbl_educations(name, date, header, details, location)
                values ('$name', '$date', '$header', '$details' , '$location')";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function educationsSil($idEducations){
        $this->veritabaninaBaglan();
        $sql = "DELETE FROM  tbl_educations where `idEducations`='$idEducations'";

        $req = $this->connection->prepare($sql);
        $req->execute();

        $query = $this->connection->prepare($sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $res = $query->execute();
        if ($res == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function educationsGuncelle($idEducations, $name, $date, $header, $details, $location){
        $this->veritabaninaBaglan();

        $sql = "UPDATE tbl_educations 
                SET name = '$name', date = '$date', header = '$header', details = '$details', location = '$location'
                WHERE `idEducations`='$idEducations'";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('educationsGuncelle hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('educationsGuncelle Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function educationsGetir($idEducations = NULL, $idLast = NULL){
        $where = '';
        $sql = '';
        if($idEducations){
            $where = "WHERE `idEducations`='$idEducations'";
        }

        $this->veritabaninaBaglan();
        if($idLast){
            $sql = "SELECT idEducations FROM tbl_educations ORDER BY idEducations DESC LIMIT 1 ";
        }
        else{
            $sql = "SELECT * FROM tbl_educations ORDER BY idEducations ASC ". $where;
        }
        $res = $this->connection->prepare($sql);
        $res->execute();

        $toplantiBiglileri = $res->fetchAll();

        $this->veritabanındanCik();
        return $toplantiBiglileri;
    }
    // careers
    public function careersOlustur($name, $date, $header, $details, $location){
        $this->veritabaninaBaglan();
        $sql = "INSERT INTO
                tbl_careers(name, date, header, details, location)
                values ('$name', '$date', '$header', '$details' , '$location')";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function careersSil($idCareers){
        $this->veritabaninaBaglan();
        $sql = "DELETE FROM  tbl_careers where `idCareers`='$idCareers'";

        $req = $this->connection->prepare($sql);
        $req->execute();

        $query = $this->connection->prepare($sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $res = $query->execute();
        if ($res == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function careersGuncelle($idCareers, $name, $date, $header, $details, $location){
        $this->veritabaninaBaglan();

        $sql = "UPDATE tbl_careers 
                SET name = '$name', date = '$date', header = '$header', details = '$details', location = '$location'
                WHERE `idCareers`='$idCareers'";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('careersGuncelle hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('careersGuncelle Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function careersGetir($idCareers = NULL, $idLast = NULL){
        $where = '';
        $sql = '';
        if($idCareers){
            $where = "WHERE `idCareers`='$idCareers'";
        }
        $this->veritabaninaBaglan();
        if($idLast){
            $sql = "SELECT idCareers FROM tbl_careers ORDER BY idCareers DESC LIMIT 1 ";
        }
        else{
            $sql = "SELECT * FROM tbl_careers ". $where;
        }

        $this->veritabaninaBaglan();
        $res = $this->connection->prepare($sql);
        $res->execute();

        $toplantiBiglileri = $res->fetchAll();

        $this->veritabanındanCik();
        return $toplantiBiglileri;
    }


    // abilities
    public function abilitiesBasligiOlustur($abilities){
        $this->veritabaninaBaglan();
        $sql = "INSERT INTO
                tbl_abilities(abilities)
                values ('$abilities')";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function abilitiesBasligiSil($idAbilities){
        $this->veritabaninaBaglan();
        $sql = "DELETE FROM  tbl_abilities where `idAbilities`='$idAbilities'";

        $req = $this->connection->prepare($sql);
        $req->execute();

        $query = $this->connection->prepare($sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $res = $query->execute();
        if ($res == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function abilitiesBasligiGuncelle($idAbilities, $abilities){
        $this->veritabaninaBaglan();

        $sql = "UPDATE tbl_abilities 
                SET abilities = '$abilities'
                WHERE `idAbilities`='$idAbilities'";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('abilitiesBasligiGuncelle hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('abilitiesBasligiGuncelle Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function abilitiesBasligiGetir($idAbilities = NULL){
        $where = '';
        if($idAbilities){
            $where = "WHERE `idAbilities`='$idAbilities'";
        }

        $this->veritabaninaBaglan();
        $sql = "SELECT * FROM tbl_abilities ". $where;
        $res = $this->connection->prepare($sql);
        $res->execute();

        $toplantiBiglileri = $res->fetchAll();

        $this->veritabanındanCik();
        return $toplantiBiglileri;
    }
    // skills
    public function skillsOlustur($name, $score){
        $this->veritabaninaBaglan();
        $sql = "INSERT INTO
                tbl_skills(name, score)
                values ('$name', '$score')";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function skillsSil($idSkills){
        $this->veritabaninaBaglan();
        $sql = "DELETE FROM  tbl_skills where `idSkills`='$idSkills'";

        $req = $this->connection->prepare($sql);
        $req->execute();

        $query = $this->connection->prepare($sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $res = $query->execute();
        if ($res == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function skillsGuncelle($idSkills, $name, $score){
        $this->veritabaninaBaglan();

        $sorgu = $this->connection->prepare("UPDATE tbl_skills SET name = ?, score = ? WHERE idSkills = ?");
        $sorgu->bindParam(1, $name, PDO::PARAM_STR);
        $sorgu->bindParam(2, $score, PDO::PARAM_STR);
        $sorgu->bindParam(3, $idSkills, PDO::PARAM_INT);
        $sorgu->execute();
        if (!($sorgu->rowCount() > 0)) {
            die ("skillsGuncelle Veritabanı hatası execute");
        }
        $this->veritabanındanCik();
    }
    public function skillsGetir($idSkills = NULL, $idLast = NULL){
        $where = '';
        $sql = '';
        if($idSkills){
            $where = "WHERE `idSkills`='$idSkills'";
        }
        $this->veritabaninaBaglan();
        if($idLast){
            $sql = "SELECT idSkills FROM tbl_skills ORDER BY idSkills DESC LIMIT 1 ";
        }
        else{
            $sql = "SELECT * FROM tbl_skills ORDER BY score DESC ". $where;
        }

        $this->veritabaninaBaglan();
        $res = $this->connection->prepare($sql);
        $res->execute();

        $toplantiBiglileri = $res->fetchAll();

        $this->veritabanındanCik();
        return $toplantiBiglileri;
    }
    // languages
    public function languagesOlustur($name, $score){
        $this->veritabaninaBaglan();
        $sql = "INSERT INTO
                tbl_languages(name, score)
                values ('$name', '$score')";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function languagesSil($idLanguages){
        $this->veritabaninaBaglan();
        $sql = "DELETE FROM  tbl_languages where `idLanguages`='$idLanguages'";

        $req = $this->connection->prepare($sql);
        $req->execute();

        $query = $this->connection->prepare($sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $res = $query->execute();
        if ($res == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function languagesGuncelle($idLanguages, $name, $score){
        $this->veritabaninaBaglan();

        $sorgu = $this->connection->prepare("UPDATE tbl_languages SET name = ?, score = ? WHERE idLanguages = ?");
        $sorgu->bindParam(1, $name, PDO::PARAM_STR);
        $sorgu->bindParam(2, $score, PDO::PARAM_STR);
        $sorgu->bindParam(3, $idLanguages, PDO::PARAM_INT);
        $sorgu->execute();
        if (!($sorgu->rowCount() > 0)) {
            die ("languagesGuncelle Veritabanı hatası execute");
        }
        $this->veritabanındanCik();

    }
    public function languagesGetir($idLanguages = NULL, $idLast = NULL){
        $where = '';
        $sql = '';
        if($idLanguages){
            $where = "WHERE `idLanguages`='$idLanguages'";
        }

        $this->veritabaninaBaglan();
        if($idLast){
            $sql = "SELECT idLanguages FROM tbl_languages ORDER BY idLanguages DESC LIMIT 1 ";
        }
        else{
            $sql = "SELECT * FROM tbl_languages ". $where;
        }

        $res = $this->connection->prepare($sql);
        $res->execute();

        $toplantiBiglileri = $res->fetchAll();

        $this->veritabanındanCik();
        return $toplantiBiglileri;
    }
    // tools
    public function toolsOlustur($name, $score){
        $this->veritabaninaBaglan();
        $sql = "INSERT INTO
                tbl_tools(name, score)
                values ('$name', '$score')";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function toolsSil($idTools){
        $this->veritabaninaBaglan();
        $sql = "DELETE FROM  tbl_tools where `idTools`='$idTools'";

        $req = $this->connection->prepare($sql);
        $req->execute();

        $query = $this->connection->prepare($sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $res = $query->execute();
        if ($res == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function toolsGuncelle($idTools, $name, $score){
        $this->veritabaninaBaglan();

        $sorgu = $this->connection->prepare("UPDATE tbl_tools SET name = ?, score = ? WHERE idTools = ?");
        $sorgu->bindParam(1, $name, PDO::PARAM_STR);
        $sorgu->bindParam(2, $score, PDO::PARAM_STR);
        $sorgu->bindParam(3, $idTools, PDO::PARAM_INT);
        $sorgu->execute();
        if (!($sorgu->rowCount() > 0)) {
            die ("toolsGuncelle Veritabanı hatası execute");
        }
        $this->veritabanındanCik();
    }
    public function toolsGetir($idTools = NULL, $idLast = NULL){
        $where = '';
        $sql = '';
        if($idTools){
            $where = "WHERE `idTools`='$idTools'";
        }

        $this->veritabaninaBaglan();
        if($idLast){
            $sql = "SELECT idTools FROM tbl_tools ORDER BY idTools DESC LIMIT 1 ";
        }
        else{
            $sql = "SELECT * FROM tbl_tools ORDER BY score DESC ". $where;
        }

        $res = $this->connection->prepare($sql);
        $res->execute();

        $toplantiBiglileri = $res->fetchAll();

        $this->veritabanındanCik();
        return $toplantiBiglileri;
    }


    // projects
    public function projectsBasligiOlustur($projects){
        $this->veritabaninaBaglan();
        $sql = "INSERT INTO
                tbl_projects(projects)
                values ('$projects')";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function projectsSil($idProjects){
        $this->veritabaninaBaglan();
        $sql = "DELETE FROM  tbl_projects where `idProjects`='$idProjects'";

        $req = $this->connection->prepare($sql);
        $req->execute();

        $query = $this->connection->prepare($sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $res = $query->execute();
        if ($res == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function projectsGuncelle($idProjects, $projects){
        $this->veritabaninaBaglan();

        $sql = "UPDATE tbl_projects 
                SET projects = '$projects'
                WHERE `idProjects`='$idProjects'";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('projectsGuncelle hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('projectsGuncelle Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function projectsGetir($idProjects = NULL){
        $where = '';
        if($idProjects){
            $where = "WHERE `idProjects`='$idProjects'";
        }

        $this->veritabaninaBaglan();
        $sql = "SELECT * FROM tbl_projects ". $where;
        $res = $this->connection->prepare($sql);
        $res->execute();

        $toplantiBiglileri = $res->fetchAll();

        $this->veritabanındanCik();
        return $toplantiBiglileri;
    }
    // figcaption
    public function figcaptionOlustur($name, $details, $tags, $image_name, $link, $date){
        $this->veritabaninaBaglan();
        $sql = "INSERT INTO
                tbl_figcaption(name, details, tags, image_name, link, date)
                values ('$name', '$details', '$tags', '$image_name' , '$link', '$date')";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function figcaptionSil($idFigcaption){
        $this->veritabaninaBaglan();
        $sql = "DELETE FROM  tbl_figcaption where `idFigcaption`='$idFigcaption'";

        $req = $this->connection->prepare($sql);
        $req->execute();

        $query = $this->connection->prepare($sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $res = $query->execute();
        if ($res == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function figcaptionGuncelle($idFigcaption, $name, $details, $tags, $image_name, $link, $date){
        $this->veritabaninaBaglan();

        $sql = "UPDATE tbl_figcaption 
                SET name = '$name', details = '$details', tags = '$tags', image_name = '$image_name', link = '$link', date = '$date'
                WHERE `idFigcaption`='$idFigcaption'";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('figcaptionGuncelle hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('figcaptionGuncelle Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function figcaptionGetir($idFigcaption = NULL, $idLast = NULL){
        $where = '';
        $sql = '';
        if($idFigcaption){
            $where = "WHERE `idFigcaption`='$idFigcaption'";
        }

        $this->veritabaninaBaglan();
        if($idLast){
            $sql = "SELECT idFigcaption FROM tbl_figcaption ORDER BY idFigcaption DESC LIMIT 1 ";
        }
        else{
            $sql = "SELECT * FROM tbl_figcaption ORDER BY date DESC". $where;
        }

        $res = $this->connection->prepare($sql);
        $res->execute();

        $toplantiBiglileri = $res->fetchAll();

        $this->veritabanındanCik();
        return $toplantiBiglileri;
    }


    // contact
    public function contactOlustur($link, $name, $style){
        $this->veritabaninaBaglan();
        $sql = "INSERT INTO
                tbl_contact(link, name, style)
                values ('$link', '$name', '$style')";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function contactSil($idContact){
        $this->veritabaninaBaglan();
        $sql = "DELETE FROM  tbl_contact where `idContact`='$idContact'";

        $req = $this->connection->prepare($sql);
        $req->execute();

        $query = $this->connection->prepare($sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $res = $query->execute();
        if ($res == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function contactGuncelle($idContact, $link, $name, $style){
        $this->veritabaninaBaglan();

        $sql = "UPDATE tbl_contact 
                SET link = '$link', name = '$name', style = '$style'
                WHERE `idContact`='$idContact'";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('contactGuncelle hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('contactGuncelle Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function contactGetir($idContact = NULL, $idLast = NULL){
        $where = '';
        $sql = '';
        if($idContact){
            $where = "WHERE `idContact`='$idContact'";
        }

        $this->veritabaninaBaglan();
        if($idLast){
            $sql = "SELECT idContact FROM tbl_contact ORDER BY idContact DESC LIMIT 1 ";
        }
        else{
            $sql = "SELECT * FROM tbl_contact ". $where;
        }

        $res = $this->connection->prepare($sql);
        $res->execute();

        $toplantiBiglileri = $res->fetchAll();

        $this->veritabanındanCik();
        return $toplantiBiglileri;
    }

    // login
    public function loginOlustur($username, $password, $role){
        $this->veritabaninaBaglan();
        $sql = "INSERT INTO
                tbl_login(username, password, role)
                values ('$username', '$password', '$role')";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function loginSil($idLogin){
        $this->veritabaninaBaglan();
        $sql = "DELETE FROM  tbl_login where `$idLogin`='$idLogin'";

        $req = $this->connection->prepare($sql);
        $req->execute();

        $query = $this->connection->prepare($sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $res = $query->execute();
        if ($res == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function loginGuncelle($idLogin, $username, $password, $role){
        $this->veritabaninaBaglan();

        $sql = "UPDATE tbl_login 
                SET username = '$username', password = '$password', role = '$role'
                WHERE `idLogin`='$idLogin'";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('loginGuncelle hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('loginGuncelle Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function loginGetir($idLogin = NULL){
        $where = '';
        if($idLogin){
            $where = "WHERE `idLogin`='$idLogin'";
        }

        $this->veritabaninaBaglan();
        $sql = "SELECT * FROM tbl_login ". $where;
        $res = $this->connection->prepare($sql);
        $res->execute();

        $toplantiBiglileri = $res->fetchAll();

        $this->veritabanındanCik();
        return $toplantiBiglileri;
    }

    // images
    public function imagesOlustur($imagesName){
        $this->veritabaninaBaglan();
        $sql = "INSERT INTO
                tbl_images(imagesName)
                values ('$imagesName')";

        $query = $this->connection->prepare( $sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $sth = $query->execute();
        if ($sth == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function imagesSil($idImages){
        $this->veritabaninaBaglan();
        $sql = "DELETE FROM  tbl_images where `idImages`='$idImages'";

        $req = $this->connection->prepare($sql);
        $req->execute();

        $query = $this->connection->prepare($sql );
        if ($query == false) {
            print_r($this->connection->errorInfo());
            die ('Veritabanı hatası prepare');
        }
        $res = $query->execute();
        if ($res == false) {
            print_r($query->errorInfo());
            die ('Veritabanı hatası execute');
        }
        $this->veritabanındanCik();
    }
    public function imagesGetir($idImages = NULL){
        $where = '';
        if($idImages){
            $where = "WHERE `idImages`='$idImages'";
        }

        $this->veritabaninaBaglan();
        $sql = "SELECT * FROM tbl_images ". $where;
        $res = $this->connection->prepare($sql);
        $res->execute();

        $toplantiBiglileri = $res->fetchAll();

        $this->veritabanındanCik();
        return $toplantiBiglileri;
    }




}