<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        //ambil data galleri dengan judul slide
        $gallery = Post::where('title', 'Slider')->first()->galleries->where('status', 'aktif')->first();
        $sliders = $gallery->images;

        // ambil data post galleri sekolah kecuali slider
        $posts = Post::whereHas('category', function($query){
            $query->where('title', 'Galeri Sekolah');
        })->where('title','!=', 'Slider')->get();

        //ambil data post agenda sekolah

        $agendas = Post::whereHas('category', function($query){
            $query->where('title', 'Agenda Sekolah');
        })->get();

        //ambil data post informasi terkini

        $informations = Post::whereHas('category', function($query){
            $query->where('title', 'Informasi terkini');
        })->first();

        //ambil data post peta
        $map = Post::whereHas('category', function($query){
            $query->where('title', 'peta');
        })->first();
        return view('home', [
            'sliders' => $sliders,
            'posts' => $posts,
            'agendas' => $agendas,
            'information' => $informations,
            'map' => $map
        ]);
    }
}
