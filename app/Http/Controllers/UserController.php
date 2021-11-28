<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
       //query list of users from db
       //$users = User::all();
       //$users = user::paginate(5);
       if($request->keyword){
            $users = user::query()->where('name','LIKE','%'.$request->keyword.'%')
                ->paginate(5);
    }else{
         $users = user::paginate(5);
    }

       // return to view - resources/views/users/index.blade.php
       return view('users.index', compact('users'));
    }
   
    public function show(User $user)
    {
        return view('users.show', compact('user'));

    }
    public function edit(User $user)
    {
        return view('users.edit', compact ('user'));
    }
    
    public function update(User $user, Request $request)
    {
        $user->name = $request->name;
        $user->email= $request->email;
        $user->save();

        return redirect()->to('/users')->with([
            'type' => 'alert-success',
            'message' => 'Tahniah, anda berjaya ubah user!'
        ]);
    }
    
    public function delete(User $user)
    {
       // delete from table using model
       $user->delete();

       // return to users index
       return redirect()->to('/users')->with([
        'type' => 'alert-danger',
        'message' => 'Anda telah padam user!'
        ]);
    }
}

