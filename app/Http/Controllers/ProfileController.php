<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show(): View
    {
        return view('profile.show', [
            'user' => Auth::user(),
        ]);
    }

    public function edit(): View
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $validated = $request->validate([
            'first_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'newsletter_subscribed' => ['boolean'],
        ]);

        $emailChanged = $user->email !== $validated['email'];

        $user->fill($validated);
        $user->newsletter_subscribed = $request->boolean('newsletter_subscribed');

        if ($emailChanged) {
            $user->email_verified_at = null;
        }

        $user->save();

        if ($emailChanged) {
            $user->sendEmailVerificationNotification();

            return redirect()->route('profile.show')
                ->with('status', 'Профилът е актуализиран. Моля, потвърдете новия си имейл адрес.');
        }

        return redirect()->route('profile.show')
            ->with('status', 'Профилът е актуализиран успешно.');
    }

    public function editPassword(): View
    {
        return view('profile.password', [
            'user' => Auth::user(),
        ]);
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $user = Auth::user();

        if ($user->password) {
            $request->validate([
                'current_password' => ['required', 'current_password'],
                'password' => ['required', 'confirmed', Password::defaults()],
            ]);
        } else {
            $request->validate([
                'password' => ['required', 'confirmed', Password::defaults()],
            ]);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile.show')
            ->with('status', 'Паролата е променена успешно.');
    }

    public function editAvatar(): View
    {
        return view('profile.avatar', [
            'user' => Auth::user(),
        ]);
    }

    public function updateAvatar(Request $request): RedirectResponse
    {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ]);

        $user = Auth::user();

        if ($user->avatar && !str_starts_with($user->avatar, 'http')) {
            Storage::disk('public')->delete($user->avatar);
        }

        $path = $request->file('avatar')->store('avatars', 'public');

        $user->update(['avatar' => $path]);

        return redirect()->route('profile.show')
            ->with('status', 'Профилната снимка е актуализирана успешно.');
    }

    public function deleteAvatar(): RedirectResponse
    {
        $user = Auth::user();

        if ($user->avatar && !str_starts_with($user->avatar, 'http')) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->update(['avatar' => null]);

        return redirect()->route('profile.show')
            ->with('status', 'Профилната снимка е премахната.');
    }
}
