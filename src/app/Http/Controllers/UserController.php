<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\Http\Requests\UpdateUser;
use App\Http\Requests\UpdateEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePassword;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showProfile(User $user)
    {
        return view('users.profile.show', [
            'user' => $user,
            'products' => $user->products
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showParameters()
    {
        return view('users.parameters.show', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editProfile(User $user)
    {
        $this->authorize('update', $user);

        return view('users.profile.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(UpdateUser $request, User $user)
    {
        $this->authorize('update', $user);
        $validated = $request->validated();
        $user->update($validated);

        return redirect()->action('UserController@showProfile', [
            'user' => $user
        ]);
    }

    public function updatePassword(UpdatePassword $request) {
        $user = Auth::user();
        $this->authorize('update', $user);
        $validated = $request->validated();
        $user->update([
            'email' => Hash::make($validated['new_password'])
        ]);
        
        return back()->with('success', 'ok');
    }

    public function updateEmail(UpdateEmail $request) {
        $user = Auth::user();
        $this->authorize('update', $user);
        $validated = $request->validated();
        $user->update($validated);
        
        return back()->with('success', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize($user);


    }
}
