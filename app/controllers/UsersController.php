<?php

class UsersController extends BaseController
{

    /**
     * User Repository
     *
     * @var User
     */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->user->all();

        return View::make('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::except('_token');

        $input['admin'] = isset($input['admin']) ? $input['admin'] : false;

        $validation = Validator::make($input, User::$rulesCreate, User::$messages);

        if ($validation->passes()) {
            $input["salt"] = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
            $input["password"] = hash('sha512', $input["password"] . $input["salt"]);

            unset($input['confirm-password']);

            $this->user->create($input);

            return Redirect::route('usuarios');
        }

        return Redirect::route('new_usuario')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'O usuário não pôde ser salvo.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function perfil()
    {
        $user = $this->user->find(Auth::user()->id);

        return View::make('users.perfil', compact('user'));
    }

    public function updatePerfil()
    {
        $input = Input::except('_token');

        $validation = Validator::make($input, User::$rulesUpdate, User::$messages);

        if ($validation->passes()) {
            if (!empty($input['change-password'])) {
                $input["salt"] = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
                $input["password"] = hash('sha512', $input['change-password'] . $input["salt"]);
            }

            unset($input['change-password']);
            unset($input['confirm-password']);

            $user = $this->user->find(Auth::user()->id);
            $user->update($input);

            return Redirect::route('home')
                ->with('success', 'Dados atualizados com sucesso.');;
        }

        return Redirect::route('perfil')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'Os dados não puderam ser salvos.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id);

        if (is_null($user)) {
            return Redirect::route('usuarios');
        }

        return View::make('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');

        $input['admin'] = isset($input['admin']) ? $input['admin'] : false;

        $validation = Validator::make($input, User::$rulesUpdate, User::$messages);

        if ($validation->passes()) {
            $user = $this->user->find($id);
            $user->update($input);

            return Redirect::route('usuarios', $id);
        }

        return Redirect::route('edit_usuario', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'O usuário não pôde ser salvo.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->user->find($id)->delete();

        return Redirect::route('usuarios');
    }

}
