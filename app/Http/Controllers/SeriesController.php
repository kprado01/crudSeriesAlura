<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function Index()
    {
        $series = Serie::query()->orderBy('nome')->get();

        $html = view('series.index')
        ->with('series', $series);

        return response($html, 200);
    }

    public function create()
    {
        $html = view('series.create');

        return response($html, 200);
    }

    public function store(Request  $request)
    {
        $nomeSerie = filter_var($request->input('nome'),
        FILTER_SANITIZE_STRING
        );
        $serie = new Serie();
        $serie->nome = $nomeSerie;
        $serie->save();

        return redirect('/series');
    }
}
