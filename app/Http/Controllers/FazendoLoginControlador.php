<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FazendoLoginControlador extends Controller
{
    public function __contruct() {
        $this->middleware('auth');
    }
    public function index() {
        echo "<h4>Lista de Produtos</h4>";
        echo "<ul>";
        echo "<li>sdfsfdf</li>";
        echo "</ul>";
    }
}
