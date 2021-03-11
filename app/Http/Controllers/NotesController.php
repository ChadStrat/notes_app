<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;

class NotesController extends Controller
{
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function note(Request $request, $id)
    {
        return '{success: true}';
    }
}