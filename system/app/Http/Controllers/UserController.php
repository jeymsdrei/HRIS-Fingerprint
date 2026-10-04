<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        // The table filters in the browser on every keystroke, so the whole set has to
        // be sent: paginating would make the client-side filter blind to rows beyond
        // page 1. One row per system user keeps this small. The active filters are
        // mirrored into the query string by the view, so reload and back still work.
        $users = User::with('employee')
            ->orderBy('name')
            ->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.form', ['user' => new User, 'employees' => Employee::where('is_active', true)->orderBy('last_name')->get()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'username' => ['required', 'string', 'lowercase', 'max:255', 'regex:/^[a-z0-9._-]+$/', Rule::unique('users', 'username')],
            'password' => 'required|min:8',
            'role' => ['required', Rule::in(User::ROLES)],
            'employee_id' => 'nullable|exists:employees,id',
        ]);

        $user = User::create($data);

        return redirect()->route('users.index')->with('success', 'User created.');
    }

    public function edit(User $user)
    {
        return view('users.form', ['user' => $user, 'employees' => Employee::where('is_active', true)->orderBy('last_name')->get()]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'username' => ['required', 'string', 'lowercase', 'max:255', 'regex:/^[a-z0-9._-]+$/', Rule::unique('users', 'username')->ignore($user->id)],
            'password' => 'nullable|min:8',
            'role' => ['required', Rule::in(User::ROLES)],
            'employee_id' => 'nullable|exists:employees,id',
        ]);

        if (! $request->filled('password')) {
            unset($data['password']);
        }

        $user->fill($data);
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated.');
    }

    public function destroy(User $user)
    {
        if ($user->is_active) {
            if ($user->id === auth()->id()) {
                return back()->with('error', 'You cannot deactivate your own account.');
            }

            $user->update(['is_active' => false]);
            $user->employee?->update(['is_active' => false]);

            return back()->with('success', 'User deactivated. Their login and record are preserved.');
        }

        $user->update(['is_active' => true]);
        $user->employee?->update(['is_active' => true]);

        return back()->with('success', 'User reactivated.');
    }

    public function employees()
    {
        $employees = Employee::doesntHave('user')
            ->orderBy('last_name')
            ->get();

        return response()->json($employees->map(fn ($e) => [
            'id' => $e->id,
            'label' => $e->employee_id.' - '.$e->full_name,
        ]));
    }
}
