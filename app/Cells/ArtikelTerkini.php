<?php

namespace App\Cells;

use App\Models\ArtikelModel;

class ArtikelTerkini
{
    public function render($kategori = null): string
    {
        // Load the model
        $model = new ArtikelModel();

        // Handle category filtering
        if (is_array($kategori) && !empty($kategori)) {
            $model->whereIn('kategori', $kategori);
        } elseif ($kategori) {
            $model->where('kategori', $kategori);
        }

        // Get the latest 5 articles
        $artikel = $model->orderBy('created_at', 'DESC')->limit(5)->findAll();

        // Return the view with the articles data
        return view('components/artikel_terkini', ['artikel' => $artikel]);
    }
}
