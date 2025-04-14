<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Folder;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreDocumentRequest;
use App\Services\DocumentService;


class DocumentController extends Controller
{

    public function __construct(protected DocumentService $documentService)
    {
    }


    public function index()
    {
        $documents = Document::with('tags')
            ->latest()->get();

        $folders = generateSidebarMenu();
        $owners = User::get(['id', 'name', 'email']);
        $rightFolders = Folder::get(['id', 'name']);

        return view('documents.index', compact('documents', 'folders', 'owners', 'rightFolders'));
    }

}