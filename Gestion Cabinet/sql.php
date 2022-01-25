<?php
class sql
{
    function conexion()
    {
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
        return new PDO('mysql:host=localhost;dbname=cabient;charset=utf8', 'root', '', $options);
    }
    function authentifier($login, $pass)
    {
        $cnx = $this->conexion();
        $sql = "SELECT *FROM medecin WHERE email='$login' and password='$pass' ";
        $prep = $cnx->prepare($sql);
        $prep->execute();
        $ex = $prep->fetch();

        if ($ex) {
            $prep->closeCursor();
            return true;
        }
        $prep->closeCursor();
        return false;
    }
    function aficherpatient()
    {
        $cnx = $this->conexion();
        $sql = "SELECT * FROM patient,medecin WHERE patient.id=medecin.id ORDER BY id_p ASC";
        $prep = $cnx->prepare($sql);
        $prep->execute();

        return $prep;
    }
    function Ajouterpatient($nom, $prenom, $dateNaissance, $tel, $email, $maladie, $doctor)
    {
        $cnx = $this->conexion();
        $sql = "INSERT INTO patient (nom_p,prenom_p,dateNaissance_p,tel,email_p,maladie,id) VALUE ('$nom','$prenom',' $dateNaissance','$tel','$email','$maladie','$doctor');";
        // $sql = "INSERT INTO patient (nom_p,prenom_p,dateNaissance_p,tel,email,maladie,id) VALUE ('fvfvf','fdf','2022-01-30','5836537','ADGHSDSDGS','JSHFSUHSYUF','1');";
        $prep = $cnx->prepare($sql);
        $prep->execute();
        var_dump($prep);

        // $prep->closeCursor();
    }
    function aficherdoctor()
    {
        $cnx = $this->conexion();
        $sql = "SELECT * FROM medecin";
        $prep = $cnx->prepare($sql);
        $prep->execute();
        return $prep;
    }
    function patient($i)
    {
        $cnx = $this->conexion();
        $sql = "SELECT * FROM patient WHERE id_p='$i'";
        $prep = $cnx->prepare($sql);
        $prep->execute();
        return $prep;
    }
    function  updatepatient($id_p, $nom, $prenom, $dateNaissance, $tel, $email, $maladie, $doctor)
    {
        $cnx = $this->conexion();
        $sql = "UPDATE patient SET nom_p='$nom', prenom_p='$prenom',dateNaissance_p='$dateNaissance',tel='$tel',email_p='$email',maladie='$maladie',id='$doctor'  WHERE id_p='$id_p'";
        $prep = $cnx->prepare($sql);
        $prep->execute();
    }
    function supprimer($id)
    {
        $cnx = $this->conexion();
        $sql = "DELETE from patient where id_p='$id'";
        $prep = $cnx->query($sql);
    }
    function countpt()
    {
        $cnx = $this->conexion();
        $sql = "SELECT COUNT(*) FROM patient";
        $prep = $cnx->prepare($sql);
        $prep->execute();

        return $prep;
    }
    function countdct()
    {
        $cnx = $this->conexion();
        $sql = "SELECT COUNT(*) FROM medecin";
        $prep = $cnx->prepare($sql);
        $prep->execute();
        return $prep;
    }
}
