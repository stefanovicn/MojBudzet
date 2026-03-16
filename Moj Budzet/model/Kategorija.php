<?php
class Kategorija {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    //ulazni parametri. $sort i $order imaju podrazumevane vrednosti
    public function sve($user_id, $sort = 'id', $order = 'DESC') {
        //funkcija koja vraca sve podatke o kategoriji sa prosledjenim user_id
        //$sort i $order se koriste za sortiranje dobijenih vrednosti
        
        $allowed = ['naziv', 'iznos', 'id']; //dozvoljene vrednosti za naziv kolone
        if (!in_array($sort, $allowed)) $sort = 'id'; //podrazumevani naziv kolone
                                                                        //ako se unese pogresna
                                                                        //vrednost 
        $order = strtoupper($order) === 'ASC' ? 'ASC' : 'DESC';
        //odredjivanje poretka za sortiranje tabele
        //postoje samo dve vrednosti: ASC (rastuce) i DESC (opadajuce)
        
        $sql = "SELECT * FROM kategorije WHERE user_id=? ORDER BY " . $sort . " " . $order; //sql upit
        //trenutno je upit samo cist string, tako da se mora pripremiti za izvrsavanje u bazi
        $stmt = $this->conn->prepare($sql); //pripremanje upita za izvrsavanje

        $stmt->bind_param("i", $user_id); //ubacivanje parametara kod ? u upitu
        $stmt->execute(); //izvrsavanje upita
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC); //vracanje vrednosti koje su dobijene 
                                                             //nakon izvrsenja upita
    }
    
    public function dodaj($naziv, $tip, $iznos, $user_id) {
        $stmt = $this->conn->prepare("INSERT INTO kategorije (naziv, tip, iznos, user_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssdi", $naziv, $tip, $iznos, $user_id);
        return $stmt->execute();
    }

    public function izmeni($id, $naziv, $tip, $iznos, $user_id) {
        $stmt = $this->conn->prepare("UPDATE kategorije SET naziv=?, tip=?, iznos=? WHERE id=? AND user_id=?");
        $stmt->bind_param("ssdii", $naziv, $tip, $iznos, $id, $user_id);
        return $stmt->execute();
    }

    public function obrisi($id, $user_id) {
        $stmt = $this->conn->prepare("DELETE FROM kategorije WHERE id=? AND user_id=?");
        $stmt->bind_param("ii", $id, $user_id);
        return $stmt->execute();
    }
}