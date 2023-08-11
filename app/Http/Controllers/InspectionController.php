<?php

namespace App\Http\Controllers;

use App\Http\Requests\InspectionRequest;
use App\Models\Inspection;
use App\Models\Turbine;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InspectionController extends Controller
{
    public function create(Turbine $turbine)
    {
        return Inertia::render('Inspection/Create', [
            'turbine' => $turbine,
        ]);
    }

    /**
     * @throws \Throwable
     */
    public function store(InspectionRequest $request){
        \DB::beginTransaction();

        try{
            $turbine = Turbine::findOrFail($request->get('turbine_id'));
            $turbine->inspections()->create($request->validated());

            $turbine->update($request->only([
                'blade_grade',
                'rotor_grade',
                'hub_grade',
                'generator_grade',
            ]));

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }

        return redirect()->route('inspection.index')->with('toast_message', 'Inspection created successfully');
    }

    public function index(){
        return Inertia::render('Inspection/Index', [
            'inspections' => Inspection::query()->orderByDesc('id')->with('turbine:id,name')->get(),
        ]);
    }
}
