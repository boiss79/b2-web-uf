<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Product;
use App\Http\Requests\UpdateUser;
use App\Http\Requests\UpdateEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePassword;

class UserController extends Controller
{
    /**
     * Display the user profile acording to ID.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showProfile(User $user)
    {
        return view('users.profile.show', [
            'user' => $user,
            'products' => Product::whereNotNull(['published_at'])->where(['owner_id' => $user->id])->get()
        ]);
    }

    /**
     * Show the form for editing the user profile.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editProfile()
    {
        return view('users.profile.edit', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Update the user profile
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(UpdateUser $request)
    {
        $authenticatedUser = Auth::user();

        // Check if user can update profile
        $this->authorize('update', $authenticatedUser);

        $validated = $request->validated();
        $authenticatedUser->update($validated);

        return redirect()->route('users.profile.show', [$authenticatedUser])->with('green', 'Votre profil a bien été modifié.');
    }

    /**
     * Display the user's parameters page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSettings()
    {
        return view('users.settings.show', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Display the user's parameters page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPurchases()
    {

        $orders = Order::where(['user_id' => ID_USER])->get();

        return view('users.purchases.show', [
            'user' => Auth::user()
        ]);
    }

    public function updatePassword(UpdatePassword $request) {
        $authenticatedUser = Auth::user();

        // Check if user can update password
        $this->authorize('update', $authenticatedUser);

        $validated = $request->validated();
        $authenticatedUser->update([
            'password' => Hash::make($validated['new_password'])
        ]);
        
        return redirect(route('users.settings.show'))->with('green', 'Votre mot de passe a bien été modifié.');
    }

    public function updateEmail(UpdateEmail $request) {
        $authenticatedUser = Auth::user();

        // Check if user can update password
        $this->authorize('update', $authenticatedUser);

        $validated = $request->validated();
        $authenticatedUser->update($validated);
        
        return redirect(route('users.settings.show'))->with('green', 'Votre adresse email a bien été modifiée.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $authenticatedUser = Auth::user();
        
        // Check if user can destroy his account
        $this->authorize('delete', $authenticatedUser);
        $authenticatedUser->delete();

        return redirect(route('home'))->with('green', 'Votre compte a bien été supprimé.');
    }
}
