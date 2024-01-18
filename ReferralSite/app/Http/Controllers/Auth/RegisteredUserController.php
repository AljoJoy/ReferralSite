<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Refer;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,            
            'password' => Hash::make($request->password),
        ]);
        
        if($request->has('refer_id')) {
            $refersRow = Refer::where('refer_id',$request->refer_id)->pluck('level', 'points');
            $currentPoints = $refersRow['points'];
            $point = getPointsForEachLevel($refersRow['level']);
            Refer::where('refer_id', $request->refer_id)->update(['points'=>$currentPoints+$point]);
        }

        $refer_id = $user->id;
        $newUserLevel = $request->has('refer_id')? $refersRow['level'] -1 :10;
        $referral_text = Str::random(10);
        Refer::create(
            [
                'refer_id' => $refer_id,
                'referral_text' => $referral_text,
                'level' => $newUserLevel,
                'points' => 0,
            ]
            );
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with(["referral_text" => $referral_text]);
    }
}
