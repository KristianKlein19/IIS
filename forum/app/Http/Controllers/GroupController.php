<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGroupRequest;
use App\Models\Skupina;
use App\Models\User;
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

        $skupina->delete();

        return redirect()->route('groups');
    }

    public function view($group)
    {
        return view('groups.view')->with('skupina', Skupina::find($group));
    }

    public function members($group) {
        return view('groups.members')->with('userlist', Skupina::find($group)->getMembers())->with('skupina', Skupina::find($group));
    }
}
