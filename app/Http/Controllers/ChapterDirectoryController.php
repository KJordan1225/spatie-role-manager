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
use Pdf;

class ChapterDirectoryController extends Controller
{
    // Display view of chapter directory
    public function viewDirectory(Request $request)
    {
        $profiles = UserProfile::orderBy('last_name')->orderBy('first_name')->get(); 
        $layout = $this->dynamicLayout();

        return view('chapter_directory.view',compact('profiles','layout'));
    }

    // Generate PDF of chapter directory
    public function generatePDF()
    {
        $profiles = UserProfile::orderBy('last_name')->orderBy('first_name')->get();
    
        $data = [
            'title' => 'Gamma Alpha Chapter Directory',
            'date' => date('m/d/Y'),
            'profiles' => $profiles,
            'img1' => public_path('profiles/profile_1.jpg')
        ]; 
              
        $pdf = PDF::loadView('GAChapterDirectory', $data);

        $pdf->getDomPDF()->set_option("isRemoteEnabled", true);
       
        return $pdf->download('GAChapterDirectory.pdf');
    }

    public function dynamicLayout()
    {
        $role = Auth::user()->getRoleNames()->first();

        switch ($role) {
            case 'Admin':
                return 'layouts.adminDashboard';
            case 'Manager':
                return 'layouts.managerDashboard';
            case 'Brother':
                return 'layouts.brotherDashboard';
            default:
                return 'layouts.brotherDashboard';
            }

    } 

    
}
