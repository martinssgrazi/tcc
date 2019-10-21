<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tutorial;
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
        $tutorial->fill($request->all());
        $tutorial->save();
        return redirect(route('tutoriais.index'));
    }
    
    public function show(Tutorial $tutorial) {
        //
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
