<?php

namespace App\Http\Controllers;

use App\Models\Gradient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradientController extends Controller
{
    public function index()
    {
        $gradients = Auth::user()->gradients()->latest()->get();

        return view('gradients.index', compact('gradients'));
    }

    public function create()
    {
        return view('gradients.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'colour_start' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'colour_end' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'angle' => ['required', 'integer', 'min:0', 'max:360'],
        ]);

        Auth::user()->gradients()->create($data);

        return redirect()->route('gradients.index');
    }

    public function show(Gradient $gradient)
    {
        $this->authorizeGradient($gradient);

        return view('gradients.show', compact('gradient'));
    }

    public function edit(Gradient $gradient)
    {
        $this->authorizeGradient($gradient);

        return view('gradients.edit', compact('gradient'));
    }

    public function update(Request $request, Gradient $gradient)
    {
        $this->authorizeGradient($gradient);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'colour_start' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'colour_end' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'angle' => ['required', 'integer', 'min:0', 'max:360'],
        ]);

        $gradient->update($data);

        return redirect()->route('gradients.index');
    }

    public function destroy(Gradient $gradient)
    {
        $this->authorizeGradient($gradient);

        $gradient->delete();

        return redirect()->route('gradients.index');
    }

    private function authorizeGradient(Gradient $gradient)
    {
        abort_if($gradient->user_id !== Auth::id(), 403);
    }
}