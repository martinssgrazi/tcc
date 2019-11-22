<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;
use App\Models\Pagina;

class PaginasController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.tutorial', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tutorial $tutorial)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tutorial $tutorial)
    {
        return view('tutoriais.paginas.create')->with(['tutorial' => $tutorial]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tutorial $tutorial)
    {
        $conteudo = $request->input('conteudo');
        $titulo = $request->input('titulo');

        $pagina = new Pagina();
        $pagina->tutorial_id = $tutorial->id;
        $pagina->conteudo = $conteudo;
        $pagina->titulo = $titulo;
        $pagina->save();
        return redirect()->route('tutoriais.show', $tutorial->id)->with('success', 'Pagina '.$pagina->titulo.' criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutorial $tutorial, Pagina $pagina)
    {
        return view('tutoriais.paginas.edit')->with(['tutorial' => $tutorial, 'pagina' => $pagina]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutorial $tutorial, Pagina $pagina)
    {
        $request->validate([
            'titulo' => 'required',
            'conteudo' => 'required'
        ]);

        $pagina->fill($request->all());
        $pagina->update();
        return redirect()->route('tutoriais.show', $tutorial->id)->with(['success' => 'Atualizado!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
