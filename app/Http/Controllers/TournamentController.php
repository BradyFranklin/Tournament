<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index() {
        $tournaments = Tournament::all();
        return view('tournaments.index', compact('tournaments'));
    }

    public function details(Tournament $tournament) {
        return view('tournaments.details', compact('tournament'));
    }

    public function create() {
        $styles = config('tournament.styles');
        $types = config('tournament.types');
        $platforms = config('tournament.platforms');
        return view('tournaments.create', compact('styles', 'types', 'platforms'));
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'rules' => 'nullable|string|max:1000',
            'style' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'platforms' => 'required|array',
            'team_size' => 'required|integer',
            'min_players' => 'required|integer',
            'max_players' => 'required|integer',
            'start_date' => 'required|date|after:today',
            'start_time' => 'required|date_format:H:i',
            'timezone' => 'required|string|max:255',
            'prize' => 'required|string|max:255'
        ]);

        $validated['platforms'] = json_encode($validated['platforms']);

        $tournament = Tournament::create($validated);

        return redirect()->route('tournaments.index')->with('success', 'Tournament created successfully.');

        /*try {
            Tournament::create($request->only('name',
                'description',
                'rules',
                'type',
                'style',
                'platforms',
                'team_size',
                'min_players',
                'max_players',
                'start_date',
                'start_time',
                'timezone',
                'prize'));
            return redirect()->route('tournaments.index')->with('success', 'Tournament created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the tournament.']);
        }*/

    }

    public function show(Tournament $tournament) {

    }

    public function delete() {

    }

}
