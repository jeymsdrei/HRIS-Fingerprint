<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('employee')
            ->when($request->role, fn ($q, $r) => $q->where('role', $r))
            ->when($request->search, fn ($q, $s) => $q->where('name', 'like', "%{$s}%")->orWhere('username', 'like', "%{$s}%"))
            ->orderBy('name')
            ->paginate(15)
            ->withQueryString();

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
            'username' => ['required', 'string', 'lowercase', 'alpha_dash', 'max:255', Rule::unique('users', 'username')],
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
            'username' => ['required', 'string', 'lowercase', 'alpha_dash', 'max:255', Rule::unique('users', 'username')->ignore($user->id)],
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

    public function toggle(User $user)
    {
        $user->update(['is_active' => ! $user->is_active]);

        return back()->with('success', $user->is_active ? 'User activated.' : 'User deactivated.');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        DB::transaction(function () use ($user) {
            $employee = $user->employee;
            $user->delete();
            $employee?->delete();
        });

        return back()->with('success', 'User deleted.');
    }

    public function employees()
    {
        $employees = Employee::with('user')
            ->whereNull('user_id')
            ->orWhereDoesntHave('user')
            ->orderBy('last_name')
            ->get();

        return response()->json($employees->map(fn ($e) => [
            'id' => $e->id,
            'label' => $e->employee_id.' - '.$e->full_name,
        ]));
    }
}
