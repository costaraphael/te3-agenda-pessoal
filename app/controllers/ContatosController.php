<?php

class ContatosController extends BaseController {

	/**
	 * Contato Repository
	 *
	 * @var Contato
	 */
	protected $contato;

	public function __construct(Contato $contato)
	{
		$this->contato = $contato;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contatos = $this->contato->where('user_id', '=', Auth::user()->id)->get();

		return View::make('contatos.index', compact('contatos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('contatos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
        $input['user_id'] = Auth::user()->id;
		$validation = Validator::make($input, Contato::$rules, Contato::$messages);

		if ($validation->passes())
		{
			$this->contato->create($input);

			return Redirect::route('contatos');
		}

		return Redirect::route('new_contato')
			->withInput()
			->withErrors($validation)
			->with('message', 'Ops. Ocorreu um erro.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$contato = $this->contato->findOrFail($id);

		return View::make('contatos.show', compact('contato'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$contato = $this->contato->find($id);

		if (is_null($contato))
		{
			return Redirect::route('contatos');
		}

		return View::make('contatos.edit', compact('contato'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Contato::$rules);

		if ($validation->passes())
		{
			$contato = $this->contato->find($id);
			$contato->update($input);

			return Redirect::route('contatos', $id);
		}

		return Redirect::route('edit_contato', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->contato->find($id)->delete();

		return Redirect::route('contatos');
	}

}
