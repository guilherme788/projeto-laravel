<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Importando a facade Hash

class Users extends Controller
{
    protected $fillable = ['name', 'password'];

    public function index()
    {
        $items = User::paginate(10);
        return view('modules/users/index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules/users/create');
    }

    public function store(Request $request)
    {
        // Validação dos dados


        $item = new User();
        $item->name = $request->name;
        $item->password = Hash::make($request->password); 
        $item->save();

        return redirect()->route('index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = User::find($id);
        return view('modules/users/show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = User::find($id);
        return view('modules/users/edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validação dos dados

        $item = User::find($id);
        $item->name = $request->name;

        // Apenas hash a nova senha se foi fornecida
        if ($request->filled('password')) {
            $item->password = Hash::make($request->password); // Hash da nova senha
        }

        $item->save();
        return redirect()->route('index')->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = User::find($id);
        $item->delete();
        return redirect()->route('index')->with('success', 'Usuário deletado com sucesso!');
    }
}
