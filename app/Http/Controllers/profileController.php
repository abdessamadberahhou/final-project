<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isEmpty;

class profileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_user = Auth::user();
        return view('profile.profile')->with('current_user',$current_user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admins(){
        $current_user = Auth::user();
        $users = User::all();
        return view('profile.admins')->with('current_user',$current_user)->with('users',$users);
    }
    public function addAdmin(){
        return view('profile.add_admin');
    }
    public function storeAdmin(Request $request){
        $this->middleware('isAdmin');
        $request->validate([
            'email'=>'required',
            'nom'=>'required',
            'prenom'=>'required',
            'date_nais'=>'required',
            'CIN'=>'required',
            'num_tele'=>'required',
        ]);
        $user = new User();
        $user->name = $request->input('nom').' '.$request->input('prenom');
        $user->email = $request->input('email');
        $user->CIN = $request->input('CIN');
        $user->phone = $request->input('num_tele');
        $user->password = bcrypt($request->input('pass'));
        $user->date_naissance = $request->input('date_nais');
        $user->genre = $request->input('genre');
        $user->role_as = 0;
        $user->save();
        return redirect('/profile/admins')->with('success','Admin ajouté avec succé');
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
    public function edit()
    {
        $current_user = Auth::user();
        return view('profile.edit')->with('current_user',$current_user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email'=>'required',
            'nom'=>'required',
            'date_nai'=>'required',
            'CIN'=>'required',
            'phone'=>'required',
        ]);
        if ($_FILES['profile_picture']['size'] != 0) {
            $newImageName = time() . Auth::user()->id . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('images'), $newImageName);
        }
        else{
            $newImageName = Auth::user()->profile_path;
        }
        $user = User::find(Auth::user()->id);
        $user->name = $request->input('nom');
        $user->email = $request->input('email');
        $user->date_naissance = $request->input('date_nai');
        $user->CIN = $request->input('CIN');
        $user->phone = $request->input('phone');
        $user->profile_path = $newImageName;
        $user->save();
        return redirect('/profile')->with('success','profile modifié avec succé');
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
    public function changePass(){
        return view('profile.password');
    }
    public function updatePass(Request $request){
        if(!(Hash::check($request->input('old_pass'),Auth::user()->password))){
            return back()->with('error','Mot de passe inccorecte');
        }
        if(strcmp($request->input('new_pass'),$request->input('old_pass')) == 0 ){
            return back()->with('error','Mot de passe inccorecte');
        }
        $request->validate([
            'old_pass'=>'required',
            'new_pass'=>'required|string|min:8|confirmed'
        ]);
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_pass'));
        $user->save();
        return redirect('/profile')->with('success','Mot de passe modifiée avedc succée');
    }
    public function deleteAdmin($id){
        $this->middleware('isAdmin');
        $admin = User::find($id);
        $admin->delete();
        return redirect('/profile/admins')->with('success','admin supprimé avec succée');
    }
    public function modifyAdmin($id){
        $this->middleware('isAdmin');
        $admin = User::find($id);
        return view('profile.modify_admin')->with('admin',$admin);
    }
    public function updateAdmin(Request $request, $id){
        $this->middleware('isAdmin');
        $request->validate([
            'email'=>'required',
            'nom'=>'required',
            'date_nais'=>'required',
            'CIN'=>'required',
            'num_tele'=>'required',
        ]);
        $user = User::find($id);
        if (!empty($request->input('password'))) {
            $request->validate([
                'password' => 'required|confirmed|min:6',
            ]);
            $user->password = bcrypt($request->input('password'));
        }
        $user->name = $request->input('nom').' '.$request->input('prenom');
        $user->email = $request->input('email');
        $user->CIN = $request->input('CIN');
        $user->phone = $request->input('num_tele');
        $user->date_naissance = $request->input('date_nais');
        $user->genre = $request->input('genre');
        $user->save();
        return redirect('/profile/admins')->with('success','admin modifié avec succée');
    }
}
