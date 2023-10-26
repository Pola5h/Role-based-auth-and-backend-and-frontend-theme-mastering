<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */

    public function index(){

        $userData = Auth::user();
        return view('admin.setting.change_password',compact('userData'));

    }

    public function update(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validateWithBag('updatePassword', [
                'current_password' => ['required', 'current_password'],
                'password' => ['required', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            // You can customize the validation error message here if needed
            // For example, you can set a custom message for the 'current_password' field.
            $e->validator->errors()->add('current_password', 'The current password is incorrect');
            toastr()->error('The current password is incorrect!');
            throw $e;

        }
    
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);
        toastr()->success('Password updated successfully');

        return back()->with('status', 'Password updated successfully');
                
    }
}
