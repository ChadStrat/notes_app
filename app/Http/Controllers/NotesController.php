<?php
namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Models\Note;

class NotesController extends Controller
{
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function note(Request $request, $id)
    {
        return json_encode(Note::where('id', $id)->first());
    }

    public function create(Request $request)
    {
        $rules =[ 
            'title' => 'required|max:100',
            'note' => 'required|max:1000',
        ];

        $response = array('response' => '', 'success'=>false);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        }else{
            $note = Note::create($request->all());
            return response()->json($note, 201);
        }
        return json_encode($response);
    }

    public function update(Request $request, $id)
    {
        try {
            $note = Note::where('id', $id)->update($request->all());
            return json_encode($note);
        } catch(Exception $e) {
            return json_encode($e);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            Note::where('id', $id)->delete();
            return "{response: '', success: true}";
        } catch(Exception $e) {
            return json_encode($e);
        }
    }
}