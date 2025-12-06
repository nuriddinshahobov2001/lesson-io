<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBoardRequest;
use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreBoardRequest $request)
    {
        $data = $request->validated();
        Board::query()->create([
            'name' => $data['board_name'],
            'color' => $data['board_color'],
            'user_id' => auth()->id(),
            'position' => Board::query()->count() + 1,
        ]);
        return redirect()->route('tasks.index')->with('success', 'Board created!');
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $board = Board::query()->findOrFail($id);
        $board->delete();
        return redirect()->route('tasks.index')->with('success', 'Board created!');
    }

    public function changeStatus(Request $request)
    {
        foreach ($request->order as $board) {
            Board::query()->where('id', $board['id'])
                ->update(['position' => $board['position']]);
        }
        return response()->json(['success' => true]);
    }
}
