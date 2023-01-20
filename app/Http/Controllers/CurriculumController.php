<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    // public function index() {
    //     return view('curriculum.index');
    // }

    // public function create() {
    //     return view('curriculum.create');
    // }

    public function edit($id) {
        return view('curriculum.edit', [
            'curriculum_id' => $id
        ]);
    }

    public function show($id) {
        return view('curriculum.show', [
            'curriculum_id' => $id
        ]);
    }
}
