<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Estudo;
use Illuminate\Http\Request;
use App\Models\Tutorial;
use App\Models\Pagina;

class TutorialController extends Controller {
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
        
    // }
    public function index() {
        $tutoriais = Tutorial::all();
        return view('tutoriais.index', compact('tutoriais'));
        // ->with(['tutoriais' => $tutoriais]);
    }
    
    public function create() {
        return view('tutoriais.create');
    }
    
    public function store(Request $request) {
        $tutorial = new Tutorial();

        $user = Auth::id();
        // $estudo = Estudo::where('user_id', $user)->first();
        
        $tutorial->fill($request->all());
        $tutorial->user_id = $user;
        // $tutorial->estudos_id = $estudo->id;
        $tutorial->save();
        
        return redirect(route('tutoriais.index'));
    }

    // public function criarConteudo() {
    //     return view('tutoriais.criarConteudo');
    // }
    
    public function show(Tutorial $tutorial) {
        $paginas = $tutorial->paginas()->paginate(1);
        return view('tutoriais.show')->with(['tutorial' => $tutorial, 'paginas' => $paginas]);
    }
    
    public function edit($id) {
        //
    }
    
    public function update(Request $request, $id) {
        //
    }
   
    public function destroy($id) {
        //
    }
}
