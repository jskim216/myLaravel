<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
//use Illuminate\Support\Facades\Input;

class BoardController extends Controller
{
    public function index()
    {

//        $board = Board::all();
        $board = Board::orderBy('id', 'desc')->with('user')->paginate(7);
        return view('board.index', compact('board'));
    }

    public function write()
    {
        return view('board.write');
    }

    public function view($id)
    {
        $rows = Board::findOrFail($id);

        $rows->hit = $rows->hit + 1;
        $rows->save();

        return view('board.view', compact('rows'));
    }

    public function edit($id)
    {
        $rows = Board::findOrFail($id);

        return view('board.edit', compact('rows'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $board = Board::findOrFail($id);

        $board->title = $request->title;
        $board->contents = $request->contents;

        $board->save();

        return redirect()->route('board.view', $id);
    }


    public function store(Request $request)
    {
        $board = new Board;

        $board->user_id = $request->user()->id;
        $board->title = $request->title;
        $board->contents = $request->contents;
        $board->hit = 0;

        $board->save();

        return redirect()->route('board');
    }
}
