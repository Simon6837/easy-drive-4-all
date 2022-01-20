<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Text;
use Illuminate\Http\Request;

class TextController extends Controller
{
    public function index()
    {
        $data = Text::all();
        return view('pages.owner.texts.index', compact('data'));
    }

    public function edit($id)
    {
        $text = Text::find($id);
        return view('pages.owner.texts.edit', compact('text'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'title' => 'required',
            'text' => 'required',
        ]);
        $text = Text::find($data['id']);
        $text->update($data);
        return redirect()->route('textindex')->with('success', 'De text is opgeslagen');

    }
}
