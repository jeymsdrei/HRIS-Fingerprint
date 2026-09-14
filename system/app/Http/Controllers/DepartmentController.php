<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::withCount('employees')->orderBy('name')->get();
        $positions = Position::with('department')->orderBy('name')->get();

        return view('departments.index', compact('departments', 'positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:20',
        ]);
        Department::create($request->only(['name', 'code', 'description']));

        return back()->with('success', 'Department added.');
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:20',
        ]);
        $department->update($request->only(['name', 'code', 'description']));

        return back()->with('success', 'Department updated.');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return back()->with('success', 'Department deleted.');
    }

    public function storePosition(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'nullable|exists:departments,id',
            'category' => 'required|in:teaching,non_teaching',
        ]);
        Position::create($request->only(['name', 'department_id', 'category']));

        return back()->with('success', 'Position added.');
    }

    public function updatePosition(Request $request, Position $position)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'nullable|exists:departments,id',
            'category' => 'required|in:teaching,non_teaching',
        ]);
        $position->update($request->only(['name', 'department_id', 'category']));

        return back()->with('success', 'Position updated.');
    }

    public function destroyPosition(Position $position)
    {
        $position->delete();

        return back()->with('success', 'Position deleted.');
    }
}
