<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
    public function login() {
        session_start();
        if (isset($_SESSION['email'])) {
            return view('admin/admin-inicio');
        }

        return view('admin/login');
    }

    public function admin()

    {

        session_start();
        if (!isset($_SESSION['email'])) {
            return redirect('admin');
        }
        return view('admin/admin-inicio');

    }

    public function homeSite() {
        return view('site/home');
    }

    public function createProduct() {
        session_start();
        if (!isset($_SESSION['email'])) {
            return redirect('admin');
        }
        $categorias = App::get('database')->selectAllProducts('categorias');

        return view('admin/products/formprodutos', compact('categorias'));
    }

    public function editarProduto() {
        session_start();
        if (!isset($_SESSION['email'])) {
            return redirect('admin');
        }
        $id = $_POST['id'];

        $categorias = App::get('database')->selectAllProducts('categorias');

        $produto = App::get('database')->readProducts('produtos', $id);

        return view('admin/products/editarprodutos', compact('produto', 'categorias'));
    }

    public function sobre() {
        return view('site/sobre');
    }
    
    public function contato()

    {

        return view('site/contato');

    }
}