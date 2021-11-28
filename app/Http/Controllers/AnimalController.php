<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use File;
use Storage;

class AnimalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    { 
        if($request->keyword){
            $user = auth()->user();
            $animals = $user->animals()
                            ->where('name','LIKE','%'.$request->keyword.'%')
                            ->paginate(3);
        }else{
            $user = auth()->user();
            $animals = $user->animals()->paginate(3);
        }
       

       // return to view - resources/views/animals/index.blade.php
       return view('animals.index', compact('animals'));
    }
        //query list of animals from db
        //$animals = Animal::all(); - show all animals from all user
        //$animals = Animal::paginate(3);
        //yang bawah ni untuk user yang tengah login sahaja
       
        
      // dd($user); untuk tengok user yang tengah online
    public function create()
    {
        //show create form
        return view('animals.create');

    }

    public function store(Request $request)
    {
        //store animals table using model
        $animal = new Animal();
        $animal->name = $request->name;
        $animal->description= $request->description;
        $animal->user_id = auth()->user()->id;
        $animal->save();

        if($request->hasFile('attachment')){
            //rename
            $filename = $animal->id.'-'.date("Y-m-d").'.'.$request->attachment->getClientOriginalExtension(); 

            //store at file storage
            Storage::disk('public')->put($filename,File::get($request->attachment));

            //update row on db
              $animal->attachment = $filename;
              $animal->save();

        }  

        //return animals index
        return redirect()->to('/animals')->with([
            'type' => 'alert-primary',
            'message' => 'Tahniah, anda berjaya simpan animal baharu!'
        ]);
    }
    public function show(Animal $animal)
    {
        return view('animals.show', compact('animal'));

    }
    public function edit(Animal $animal)
    {
        return view('animals.edit', compact ('animal'));
    }
    
    public function update(Animal $animal, Request $request)
    {
        $animal->name = $request->name;
        $animal->description= $request->description;
        $animal->save();

        return redirect()->to('/animals')->with([
            'type' => 'alert-success',
            'message' => 'Tahniah, anda berjaya ubah animal!'
        ]);
    }
    
    public function delete(Animal $animal)
    {
        // delete attachment kalau ada
        if($animal->attachment){
            Storage::disk('public')->delete($animal->attachment);
        }
       // delete from table using model
       $animal->delete();

       // return to animals index
       return redirect()->to('/animals')->with([
        'type' => 'alert-danger',
        'message' => 'Anda telah padam animal!'
        ]);
    }
}



