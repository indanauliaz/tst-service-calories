<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // 1. Ambil API Key dari Header
        $apiKey = $request->header('X-API-KEY');
        
        // Cek kalau header kosong atau nilainya salah
        $validKey = 'nutriplate';

        if (!$apiKey || $apiKey->getValue() !== $validKey) {
            return Services::response()
                ->setJSON(['status' => 'error', 'message' => 'Akses Ditolak. API Key Salah bro!'])
                ->setStatusCode(401);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Gak perlu ngapa-ngapain setelah request
    }
}