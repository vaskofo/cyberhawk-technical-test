<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurbineRequest;
use App\Models\Turbine;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class TurbineController extends Controller
{

    public function index(): Response
    {
        return Inertia::render('Turbine/Index', [
            'turbines' => Turbine::query()->orderByDesc('id')->get(),
        ]);
    }

    public function edit(Turbine $turbine): Response
    {
        return Inertia::render('Turbine/Edit', [
            'turbine' => $turbine,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Turbine/Create');
    }

    public function store(TurbineRequest $request): RedirectResponse
    {
        Turbine::create($request->validated());

        return redirect()->route('turbine.index')->with('toast_message', 'Turbine created successfully');
    }

    public function update(TurbineRequest $request, Turbine $turbine): RedirectResponse
    {
        $turbine->update($request->validated());

        return redirect()->route('turbine.index')->with('toast_message', 'Turbine updated successfully');
    }

    public function search(Request $request): Collection
    {
        return Turbine::all();
    }

    public function show(Turbine $turbine): Response
    {
        return Inertia::render('Turbine/Show', [
            'turbine' => $turbine,
        ]);
    }
}
