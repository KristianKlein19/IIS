<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGroupRequest;
use App\Models\Clen;
use App\Models\Moderator;
use App\Models\Skupina;
use App\Models\User;
use App\Models\Vlakno;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('groups.index')->with('groups', Skupina::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGroupRequest $request)
    {
        $skupina = Skupina::Create([
            'nazev' => $request->nazev,
            'popis' => $request->popis,
            'spravce' => auth()->user()->id,
            'zabezpeceni_profilu' => $request->has('zabezpeceni_profilu'),
            'zabezpeceni_obsahu' => $request->has('zabezpeceni_obsahu')
        ]);

        Clen::Create([
            'id_users' => auth()->user()->id,
            'id_skupina' => $skupina->id
        ]);

        session()->flash('success', 'Group was successfully created');

        return redirect()->route('group.view', ['id' => $skupina->id]);
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
        $skupina = Skupina::find($id);

        return view('groups.edit')->with('skupina', $skupina);
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
        $this->validate($request, [
            'nazev' => 'required',
            'popis' => 'required'
        ]);

        $skupina = Skupina::find($id);

        $skupina->nazev = $request->nazev;
        $skupina->popis = $request->popis;
        $skupina->zabezpeceni_profilu = $request->has('zabezpeceni_profilu');
        $skupina->zabezpeceni_obsahu = $request->has('zabezpeceni_obsahu');

        $skupina->save();

        session()->flash('success', 'Group Profile was updated successfuly');

        return redirect()->route('group.view', ['id' => $request->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skupina = Skupina::find($id);

        if ($skupina != null)
            $skupina->delete();

        return redirect()->route('groups');
    }

    public function view($group)
    {
        return view('groups.view')->with('skupina', Skupina::find($group))->with('threads', Vlakno::where('soucast', $group)->get())->with('users', User::all());
    }

    public function members($group) {
        return view('groups.members')->with('userlist', Skupina::find($group)->getMembers())->with('skupina', Skupina::find($group));
    }

    public function boot($group, $user) {
        Clen::all()->where('id_skupina', $group)->where('id_users', $user)->first()->delete();

        return redirect()->back();
    }

    public function unmod($group, $user) {
        Moderator::all()->where('id_skupina', $group)->where('id_users', $user)->first()->delete();

        return redirect()->back();
    }

    public function takeOver($group) {
        $skupina = Skupina::find($group);

        $skupina->spravce = auth()->user()->id;

        $skupina->save();

        return redirect()->back();
    }
}
