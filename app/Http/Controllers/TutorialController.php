<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Estudo;
use Illuminate\Http\Request;
use App\Models\Tutorial;
use App\Models\Pagina;
use RealRashid\SweetAlert\Facades\Alert as Alert;

class TutorialController extends Controller {
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin', ['except' => ['show']]);
        $this->middleware('check.tutorial', ['except' => ['index', 'show', 'create', 'store']]);
    }

    public function index() {
        $tutoriais = Auth::user()->tutoriais()->get();
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
    
    public function edit(Tutorial $tutorial) {
        return view('tutoriais.edit')->with(['tutorial' => $tutorial]);
    }
    
    public function update(Request $request, Tutorial $tutorial) {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'link' => 'required'
        ]);

        $tutorial->fill($request->all());
        $tutorial->update();
        Alert::success('Tutorial Atualizado com sucesso!', 'O tutorial foi atualizado!');
        return redirect()->route('tutoriais.show', $tutorial->id);
    }
   
    public function destroy(Tutorial $tutorial) {
        $tutorial->delete();
        Alert::success('Tutorial Excluido com sucesso!', 'O tutorial foi excluido!');
        return redirect()->route('tutoriais.index');
    }
}
