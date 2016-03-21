<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index(Request $request){

		$users = User::name($request->get('name'))->rol($request->get('rol'))->paginate();
		return view('admin.users.index', compact('users', 'request'));
	}

	public function create()
    {
        return view('admin.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $user = User::create($request->all());

        $message = $user->fullName . ' se ha creado correctamente';
        Session::flash('message', $message);

        return redirect()->route('admin.users.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update($id, EditUserRequest $request)
	{
		$user = User::findOrFail($id);
		$user->fill($request->all());
		$user->save();

		$message = $user->fullName . ' se ha editado correctamente';
        Session::flash('message', $message);

		return redirect()->route('admin.users.index');
	}

	public function destroy($id, Request $request)
	{
		$user = User::findOrFail($id);

 		$user->delete();

 		$message = $user->fullName . ' ha sido eliminado';

 		if($request->ajax()){
			return response()->json([
				'id' 	  => $user->id,
				'message' => $message
			]); 
		}

		Session::flash('message', $message);

		return redirect()->route('admin.users.index');
	}
}
