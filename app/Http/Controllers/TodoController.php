<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $todos = Todo::orderBy('created_at', 'desc')->get();
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|min:3'
        ]);
        $todo = Todo::create([
            'title' => trim($request->title)
        ]);
        return response()->json(['success' => true, 'todo' => $todo]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title' => 'required|min:3'
        ]);
        $todo = Todo::findorFail($id);
        $todo->update([
            'title' => trim($request->title)
        ]);
        return response()->json([
            'success' => true,
            'todo' => $todo,
            'message' => 'Todo berhasil diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $todo = Todo::findorFail($id);
        $todo->delete();
        return response()->json([
            'success' => true,
            'message' => 'Todo berhasil dihapus'
        ]);
    }
}
