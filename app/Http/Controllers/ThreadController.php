<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\CreateThreadRequest;
use App\Models\Prispevek;
use App\Models\Skupina;
use App\Models\User;
use App\Models\Vlakno;
use Database\Seeders\SkupinaSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCommentRequest $request)
    {
        $prispevek = Prispevek::Create([
            'karma' => 0,
            'text' => $request->text,
            'soucast' => $request->thread_id,
            'odpoved' => null,
            'prispevatel' => auth()->user()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session()->flash('success', 'Comment was successfully added');

        return redirect()->route('thread', ['id' => $request->group_id, 'id2' => $request->thread_id]);
    }

    public function karma(CreateCommentRequest $request)
    {
        $prispevek = Prispevek::Create([
            'karma' => 0,
            'text' => $request->text,
            'soucast' => $request->thread_id,
            'odpoved' => null,
            'prispevatel' => auth()->user()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session()->flash('success', 'Comment was successfully added');

        return redirect()->route('thread', ['id' => $request->group_id, 'id2' => $request->thread_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function view($group, $thread)
    {
        return view('thread')->with('shares', Prispevek::all())->with('thread', Vlakno::find($thread))->with('users', User::all())->with('group', Skupina::find($group));
    }

    public function make($group)
    {
        return view('thread-make')->with('group', Skupina::find($group));
    }

    public function save(CreateThreadRequest $request)
    {
        $vlakno = Vlakno::Create([
            'nazev' => $request->nazev,
            'popis' => $request->popis,
            'stav' => 0,
            'pripnute_vlakno' => 0,
            'soucast' => $request->group_id,
            'zakladatel' => auth()->user()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session()->flash('success', 'Thread was successfully created');

        return redirect()->route('thread', ['id' => $request->group_id, 'id2' => $vlakno->id]);
    }

    public function delete($group, $id) {
        $thread = Vlakno::find($id);
        if ($thread != null)
            $thread->delete();

        return redirect()->route('group.view', ['id' => $group]);
    }

    public function removeComment($group, $id) {
        $comment = Prispevek::find($id);
        if ($comment != null)
            $comment->delete();

        return redirect()->back();
    }
}
