<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class CaloriesController extends ResourceController
{
    protected $format = 'json';

    public function __construct()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
            die();
        }
    }

    // Ini buat nangani kalau ada yang buka halaman depan (GET /)
    public function index()
    {
        return $this->respond([
            'status' => 'Microservice Ready!', 
            'owner' => 'Indi',
            'message' => 'Alhamdulillah'
        ]);
    }

    // Ini buat hitung kalori (POST /calculate)
    public function calculate()
    {
        $json = $this->request->getJSON();

        // Validasi input
        if (!$json || !isset($json->ingredients)) {
            return $this->fail("Mana data ingredients-nya bro?", 400);
        }

        $items = $json->ingredients;
        $totalCalories = 0;
        $details = [];

        $db = \Config\Database::connect();
        $builder = $db->table('ingredients');

        foreach ($items as $item) {
            $cleanItem = strtolower(trim($item));
            
            $result = $builder->like('food', $cleanItem)->get()->getRowArray();

            if ($result) {
                $cal = floatval($result['calories']);
                $totalCalories += $cal;
                $details[] = [
                    'food' => $result['food'],
                    'cal' => $cal
                ];
            } else {
                $details[] = [
                    'food' => $cleanItem,
                    'cal' => 0,
                    'note' => 'Not found'
                ];
            }
        }

        return $this->respond([
            'status' => 'success',
            'total_calories' => $totalCalories,
            'breakdown' => $details
        ]);
    }
}