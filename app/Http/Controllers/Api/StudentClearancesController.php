<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClearanceResource;
use App\Http\Resources\ClearanceCollection;

class StudentClearancesController extends Controller
{
    public function index(
        Request $request,
        Student $student
    ): ClearanceCollection {
        $this->authorize('view', $student);

        $search = $request->get('search', '');

        $clearances = $student
            ->clearances()
            ->search($search)
            ->latest()
            ->paginate();

        return new ClearanceCollection($clearances);
    }

    public function store(Request $request, Student $student): ClearanceResource
    {
        $this->authorize('create', Clearance::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'registration_number' => ['required', 'max:255', 'string'],
            // 'block_number' => ['required', 'max:255', 'string'],
            // 'room_number' => ['required', 'max:255', 'string'],
            'level' => ['required', 'in:5,6'],
            'librarian' => ['nullable', 'in:0,1'],
            'bursar' => ['nullable', 'in:0,1'],
            'class_teacher' => ['nullable', 'in:0,1'],
            'matron_patron' => ['nullable', 'in:0,1'],
            'store_keeper' => ['nullable', 'in:0,1'],
            'head_master' => ['nullable', 'in:0,1'],
        ]);

        $clearance = $student->clearances()->create($validated);

        return new ClearanceResource($clearance);
    }
}