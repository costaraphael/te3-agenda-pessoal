<?php

class CompromissosController extends BaseController {

	/**
	 * Compromisso Repository
	 *
	 * @var Compromisso
	 */
	protected $compromisso;

	public function __construct(Compromisso $compromisso)
	{
		$this->compromisso = $compromisso;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$compromissos = $this->compromisso->where('user_id','=',Auth::user()->id)->get();

		return View::make('compromissos.index', compact('compromissos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('compromissos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
        $input["user_id"] = Auth::user()->id;
		$validation = Validator::make($input, Compromisso::$rulesCreate);

		if ($validation->passes())
		{
			$this->compromisso->create($input);

			return Redirect::route('compromissos');
		}

		return Redirect::route('new_compromisso')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$compromisso = $this->compromisso->findOrFail($id);

		return View::make('compromissos.show', compact('compromisso'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$compromisso = $this->compromisso->find($id);


		if (is_null($compromisso))
		{
			return Redirect::route('compromissos');
		}
        $compromisso->data_ini = strftime('%Y-%m-%dT%H:%M:%S', strtotime($compromisso->data_ini));
        $compromisso->data_fim = strftime('%Y-%m-%dT%H:%M:%S', strtotime($compromisso->data_fim));
		return View::make('compromissos.edit', compact('compromisso'));
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
		$validation = Validator::make($input, Compromisso::$rulesUpdate);

		if ($validation->passes())
		{
			$compromisso = $this->compromisso->find($id);
			$compromisso->update($input);

			return Redirect::route('compromissos', $id);
		}

		return Redirect::route('edit_compromisso', $id)
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
		$this->compromisso->find($id)->delete();

		return Redirect::route('compromissos');
	}

}
