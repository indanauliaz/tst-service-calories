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
            ['food' => 'almonds', 'calories' => 579],
            ['food' => 'apple', 'calories' => 52],
            ['food' => 'apples', 'calories' => 52],
            ['food' => 'avocado', 'calories' => 185],
            ['food' => 'blueberries', 'calories' => 245],
            ['food' => 'bouillon', 'calories' => 24],
            ['food' => 'butter', 'calories' => 100],
            ['food' => 'buttermilk', 'calories' => 127],
            ['food' => 'cantaloupe', 'calories' => 40],
            ['food' => 'celery', 'calories' => 20],
            ['food' => 'cheese', 'calories' => 240],
            ['food' => 'cherries', 'calories' => 100],
            ['food' => 'chicken', 'calories' => 185],
            ['food' => 'chicken soup', 'calories' => 75],
            ['food' => 'cornstarch', 'calories' => 275],
            ['food' => 'cream cheese', 'calories' => 105],
            ['food' => 'cucumbers', 'calories' => 6],
            ['food' => 'egg', 'calories' => 155],
            ['food' => 'eggplant', 'calories' => 30],
            ['food' => 'eggs', 'calories' => 155],
            ['food' => 'figs', 'calories' => 120],
            ['food' => 'flour', 'calories' => 460],
            ['food' => 'fresh produce', 'calories' => 55],
            ['food' => 'frozen meal', 'calories' => 330],
            ['food' => 'grapes', 'calories' => 70],
            ['food' => 'honey', 'calories' => 120],
            ['food' => 'ices', 'calories' => 117],
            ['food' => 'lemon juice', 'calories' => 30],
            ['food' => 'lettuce', 'calories' => 14],
            ['food' => 'lobster', 'calories' => 92],
            ['food' => 'mackerel', 'calories' => 155],
            ['food' => 'marshmallows', 'calories' => 98],
            ['food' => 'mayonnaise', 'calories' => 110],
            ['food' => 'milk', 'calories' => 42],
            ['food' => 'mince', 'calories' => 340],
            ['food' => 'olive oil', 'calories' => 125],
            ['food' => 'onions', 'calories' => 80],
            ['food' => 'orange', 'calories' => 47],
            ['food' => 'orange juice', 'calories' => 112],
            ['food' => 'oranges', 'calories' => 47],
            ['food' => 'parsley', 'calories' => 2],
            ['food' => 'peaches', 'calories' => 200],
            ['food' => 'pecans', 'calories' => 343],
            ['food' => 'pineapple', 'calories' => 95],
            ['food' => 'pork', 'calories' => 242],
            ['food' => 'raisins', 'calories' => 230],
            ['food' => 'rice', 'calories' => 748],
            ['food' => 'shrimp', 'calories' => 110],
            ['food' => 'spinach', 'calories' => 26],
            ['food' => 'strawberries', 'calories' => 242],
            ['food' => 'sugar', 'calories' => 387],
            ['food' => 'tomatoes', 'calories' => 50],
            ['food' => 'vegetable', 'calories' => 80],
            ['food' => 'walnuts', 'calories' => 325],
            ['food' => 'watermelon', 'calories' => 120],
            ['food' => 'white rice', 'calories' => 692],
        ];

        $db->table('ingredients')->insertBatch($data);
        
        return $this->response->setJSON([
            'status' => 'success', 
            'message' => 'Database berhasil di-reset dan diisi 46 data dari CSV!'
        ]);
    }
}