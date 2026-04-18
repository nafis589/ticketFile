<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use App\Models\Service;
use App\Models\User;
use App\Http\Requests\StoreCounterRequest;
use App\Http\Requests\AssignAgentRequest;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function index()
    {
        $counters = Counter::with(['service', 'agent'])->get();
        return view('admin.counters.index', compact('counters'));
    }

    public function create()
    {
        $services = Service::all();
        return view('admin.counters.create', compact('services'));
    }

    public function store(StoreCounterRequest $request)
    {
        Counter::create($request->validated());
        return redirect()->route('admin.counters.index')->with('success', 'Guichet créé.');
    }

    public function edit(Counter $counter)
    {
        $services = Service::all();
        $agents = User::where('role', 'agent')->get();
        return view('admin.counters.edit', compact('counter', 'services', 'agents'));
    }

    public function update(StoreCounterRequest $request, Counter $counter)
    {
        $counter->update($request->validated());
        return redirect()->route('admin.counters.index')->with('success', 'Guichet mis à jour.');
    }
    
    public function assignAgent(AssignAgentRequest $request, Counter $counter)
    {
        $counter->update(['agent_user_id' => $request->validated('agent_user_id')]);
        return redirect()->route('admin.counters.index')->with('success', 'Agent assigné.');
    }
    
    public function destroy(Counter $counter)
    {
        $counter->delete();
        return redirect()->route('admin.counters.index')->with('success', 'Guichet supprimé.');
    }
}
