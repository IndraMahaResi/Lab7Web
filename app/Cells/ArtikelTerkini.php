<?php

namespace App\Cells;

use App\Models\ArtikelModel;

class ArtikelTerkini
{
    public function render(): string
    {
        // Load the model
        $model = new ArtikelModel();

        // Get the latest 5 articles
        $artikel = $model->orderBy('created_at', 'DESC')->limit(5)->findAll();

        // Return the view with the articles data
        return view('components/artikel_terkini', ['artikel' => $artikel]);
    }
}
