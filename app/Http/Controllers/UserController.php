<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|Application|View
     */
    public function index()
    {
        return view('users.index', [
            'administrators' => User::admin()->get(),
            'assessors' => User::assessor()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated['password_set_token'] = Str::random(40);

        User::create($validated);

        return redirect()->back()->with('status', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();

        $user->update($validated);

        return redirect()->back()->with('status', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(User $user)
    {
        if ($user->id == auth()->id()) {
            return redirect()->back()->withErrors('Cannot Delete Yourself');
        }

        $user->delete();

        return redirect('/users')->with('status', 'User deleted successfully');
    }

    /**
     * Set password for new user.
     *
     * @param string $token
     * @return Application|Factory|View
     */
    public function set_password(string $token)
    {
        $user = User::firstWhere('password_set_token', $token);

        if (!$user) {
            abort(404, 'User Not Found');
        }

        return view('users.set_password', [
            'user' => $user,
            'pageTitle' => 'sdsds'
        ]);
    }

    /**
     * Update password field for a given user
     *
     * @return Application|Redirector|RedirectResponse
     */
    public function update_password(UpdatePasswordRequest $request, User $user)
    {
        $validated = $request->validated();

        $user->update([
            'password_set_token' => null,
            'password' => $validated['password']
        ]);

        Auth::login($user);

        return redirect('/')->with('status', 'Password Set Successfully');
    }
}
