<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    public function index()
    {
        $historias = History::latest()->get();
        return view('history.index', compact('historias'));
    }

    public function create()
    {
        return view('history.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        History::create($validated);

        return redirect()->route('history.index')->with('success', 'Sua história foi adicionada com sucesso!');
    }

    public function edit($id)
    {
        $historia = History::findOrFail($id);
        return view('history.edit', compact('historia'));
    }

    public function update(Request $request, $id)
    {
        
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $historia = History::findOrFail($id);
        $historia->update($validated);

        return redirect()->route('history.index')->with('success', 'História atualizada com sucesso!');
    }

    
    public function destroy($id)
    {
        $historia = History::findOrFail($id);
        $historia->delete();

        return redirect()->route('history.index')->with('success', 'História removida com sucesso!');
    }
}
