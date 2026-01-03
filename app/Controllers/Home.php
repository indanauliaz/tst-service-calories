<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function setup()
    {
        $db = \Config\Database::connect();
        
        $db->query("CREATE TABLE IF NOT EXISTS ingredients (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    food TEXT NOT NULL,
                    calories INTEGER NOT NULL
                  );");

        $db->table('ingredients')->emptyTable();

        $data = [
            ['food' => 'buttermilk', 'calories' => 127],
            ['food' => 'cornstarch', 'calories' => 275],
            ['food' => 'cheese', 'calories' => 240],
            ['food' => 'cream cheese', 'calories' => 105],
            ['food' => 'butter', 'calories' => 100],
            ['food' => 'mayonnaise', 'calories' => 110],
            ['food' => 'olive oil', 'calories' => 125],
            ['food' => 'chicken', 'calories' => 185],
            ['food' => 'lobster', 'calories' => 92],
            ['food' => 'mackerel', 'calories' => 155],
            ['food' => 'shrimp', 'calories' => 110],
            ['food' => 'celery', 'calories' => 20],
            ['food' => 'cucumbers', 'calories' => 6],
            ['food' => 'eggplant', 'calories' => 30],
            ['food' => 'lettuce', 'calories' => 14],
            ['food' => 'onions', 'calories' => 80],
            ['food' => 'parsley', 'calories' => 2],
            ['food' => 'spinach', 'calories' => 26],
            ['food' => 'tomatoes', 'calories' => 50],
            ['food' => 'fresh', 'calories' => 55],
            ['food' => 'avocado', 'calories' => 185],
            ['food' => 'blueberries', 'calories' => 245],
            ['food' => 'cantaloupe', 'calories' => 40],
            ['food' => 'cherries', 'calories' => 100],
            ['food' => 'figs', 'calories' => 120],
            ['food' => 'grapes', 'calories' => 70],
            ['food' => 'lemon juice', 'calories' => 30],
            ['food' => 'orange juice', 'calories' => 112],
            ['food' => 'frozen', 'calories' => 330],
            ['food' => 'peaches', 'calories' => 200],
            ['food' => 'pineapple', 'calories' => 95],
            ['food' => 'raisins', 'calories' => 230],
            ['food' => 'strawberries', 'calories' => 242],
            ['food' => 'watermelon', 'calories' => 120],
            ['food' => 'flour', 'calories' => 460],
            ['food' => 'rice', 'calories' => 748],
            ['food' => 'white', 'calories' => 692],
            ['food' => 'bouillon', 'calories' => 24],
            ['food' => 'chicken soup', 'calories' => 75],
            ['food' => 'vegetable', 'calories' => 80],
            ['food' => 'marshmallows', 'calories' => 98],
            ['food' => 'honey', 'calories' => 120],
            ['food' => 'ices', 'calories' => 117],
            ['food' => 'mince', 'calories' => 340],
            ['food' => 'pecans', 'calories' => 343],
            ['food' => 'walnuts', 'calories' => 325],
        ];

        $db->table('ingredients')->insertBatch($data);
        
        return $this->response->setJSON([
            'status' => 'success', 
            'message' => 'Database berhasil di-reset dan diisi 46 data dari CSV!'
        ]);
    }
}