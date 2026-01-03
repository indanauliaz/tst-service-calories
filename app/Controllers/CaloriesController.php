<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class CaloriesController extends ResourceController
{
    protected $format = 'json';

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