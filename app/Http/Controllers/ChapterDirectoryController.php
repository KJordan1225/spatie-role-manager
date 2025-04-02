<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ChapterDirectoryController extends Controller
{
    // Display view of chapter directory
    public function viewDirectory(Request $request)
    {
        $profiles = UserProfile::orderBy('last_name')->orderBy('first_name')->paginate(5);

        return view('chapter_directory.view',compact('profiles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
