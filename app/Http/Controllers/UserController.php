<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {              
        return view('user.index', [
            'users' => User::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([  
            'name' => 'required',
            'position' => 'required',
        ]);

        // generete email
        $words = explode(" ", $request->name);
        $email = "";

        foreach ($words as $word) {
            $email .= substr($word, 0, 1);
        }

        $email = strtolower($words[0] . substr($email, 1));
        $emailTemp = $email . '@merlynmansion.com';

        $checkEmail = User::where('email', $emailTemp)->get();

        if ($checkEmail->count() > 0) {
            $numeric = 1;
            do {
                $newEmail = strtok($email, '@') . $numeric;
                $emailTemp = $newEmail . '@merlynmansion.com';
                $checkEmail = User::where('email', $emailTemp)->get();
                $numeric++;
            } while ($checkEmail->count() > 0);

            $email = $newEmail . '@merlynmansion.com';
        } else {
            $email = $emailTemp;
        }
        
        // dd($email);
        // generete password
        $password = '#' . Str::random(8);
        
        $user = User::create([
            'name' => $request->name,
            'position' => $request->position,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        ActivityLog::create([
            'name' => auth()->user()->name,
            'description' => 'Membuat user ' . '(' . $user->name . ')',
        ]);

        return redirect()->route('user.index')->with([
            'successUser' => 'User berhasil dibuat',
            'email' => $email,
            'password' => $password,
        ]);
    }

    public function destroy(User $user)
    {
        User::find($user->id)->delete();

        ActivityLog::create([
            'name' => auth()->user()->name,
            'description' => 'Menghapus user ' .'('. $user->name . ' | '. $user->position . ')',
        ]);
        
        return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus');
    }

    public function update(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::find(auth()->user()->id);

        $user->password = Hash::make($request->password);
        $user->save();

        ActivityLog::create([
            'name' => auth()->user()->name,
            'description' => 'Mengubah password',
        ]);

        return redirect()->route('home')->with('success', 'Password berhasil diubah');
    }
}
