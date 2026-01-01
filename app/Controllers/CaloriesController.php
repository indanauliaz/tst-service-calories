<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class CaloriesController extends ResourceController
{
    protected $format = 'json';

    // Ini buat nangani kalau ada yang buka halaman depan (GET /)
    public function index()
    {
        return $this->respond([
            'status' => 'Service Nutrisi Ready!', 
            'owner' => 'Kelompok Kita',
            'message' => 'Silakan tembak endpoint /calculate untuk hitung kalori.'
        ]);
    }

    // Ini buat hitung kalori (POST /calculate)
    public function create()
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

        foreach ($items as $item) {
            $cleanItem = strtolower(trim($item));
            
            // Query cari bahan (pake LIKE biar fleksibel)
            $query = $db->query("SELECT * FROM ingredients WHERE food_key LIKE '%$cleanItem%' LIMIT 1");
            $result = $query->getRowArray();

            if ($result) {
                $cal = floatval($result['calories']);
                $totalCalories += $cal;
                $details[] = [
                    'food' => $result['food_key'],
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