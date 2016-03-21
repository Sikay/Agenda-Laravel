<?php

namespace App\Http\Controllers\Agenda;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\CreateContactoRequest;
use App\Http\Requests\EditContactoRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contacto;
use App\User;


class ContactosController extends Controller
{

    public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request)
	{
		$id = \Auth::id();

		if (\Auth::user()->isAdmin()){

			$contactos = Contacto::name($request->get('name'))->categoria($request->get('categoria'))->paginate();

		} else {

			$contactos = Contacto::name($request->get('name'))->categoria($request->get('categoria'))
							->select('contactos.*')
							->where('users.id', '=', $id)
							->join('users', 'contactos.user_id', '=', 'users.id')
							->paginate();

		}

		
		return view('agenda.contactos.index', compact('contactos', 'request'));

		
	}

	public function create()
    {
        return view('agenda.contactos.create');
    }

    public function store(CreateContactoRequest $request)
    {

        $contacto = Contacto::create($request->all());

        $message = $contacto->fullName . ' se ha insertado correctamente';
        Session::flash('message', $message);

        return redirect()->route('agenda.contactos.index');
    }

    public function edit($id)
    {
        $contacto = Contacto::findOrFail($id);
        return view('agenda.contactos.edit', compact('contacto'));
    }

    public function update($id, EditContactoRequest $request)
	{
		$contacto = Contacto::findOrFail($id);
		$contacto->fill($request->all());
		$contacto->save();

		$message = $contacto->fullName . ' se ha editado correctamente';
        Session::flash('message', $message);

		return redirect()->route('agenda.contactos.index');
	}

	public function destroy($id, Request $request)
	{
		$contacto = Contacto::findOrFail($id);

 		$contacto->delete();

 		$message = $contacto->fullName . ' ha sido eliminado';

 		if($request->ajax()){
			return response()->json([
				'id' 	  => $contacto->id,
				'message' => $message
			]); 
		}

		Session::flash('message', $message);

		return redirect()->route('agenda.contactos.index');
	}
}