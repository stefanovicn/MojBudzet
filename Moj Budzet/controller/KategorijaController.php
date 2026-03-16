<?php
require_once __DIR__ . "/../model/Kategorija.php";

class KategorijaController {
    private $model;

    public function __construct($db) {
        $this->model = new Kategorija($db);
    }

    public function index($user_id) {
        $sort = $_GET['sort'] ?? 'id';
        $order = $_GET['order'] ?? 'DESC';
        $kategorije = $this->model->sve($user_id,$sort,$order);

        $budzet = 0;
        foreach ($kategorije as $k) {
            $budzet += ($k['tip'] == 'prihod') ? $k['iznos'] : -$k['iznos'];
        }

        require_once __DIR__ . "/../view/lista.php";
    }

    public function dodaj($data, $user_id) {
        $this->model->dodaj($data['naziv'], $data['tip'], $data['iznos'], $user_id);
        header("Location: index.php");
        exit;
    }

    public function izmeni($data, $user_id) {
        $this->model->izmeni($data['id'], $data['naziv'], $data['tip'], $data['iznos'], $user_id);
        header("Location: index.php");
        exit;
    }

    public function obrisi($id, $user_id) {
        $this->model->obrisi($id, $user_id);
        header("Location: index.php");
        exit;
    }
}