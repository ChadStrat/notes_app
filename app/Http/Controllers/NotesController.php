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
     * List all users by the given Auth token
     *
     * @param Request $request
     * @return void
     */
    public function list(Request $request)
    {
        return json_encode(Auth::user()->notes);
    }

    /**
     * Find a note by the given id if owned
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function note(Request $request, $id)
    {
        $note = $this->getNote($request,$id);
        if(!$note){
            return "{response: 'You do not have permissions to view this note.', succss: false}";
        }
        return json_encode($note);
    }

    /**
     * Create a new note (associate to user auth in model)
     *
     * @param Request $request
     * @return void
     */
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

    /**
     * Update a note by given id if owned
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $note = $this->getNote($request,$id);
        if(!$note){
            return "{response: 'You do not have permissions to update this note.', succss: false}";
        }
        try {
            $rules =[ 
                'title' => 'max:100',
                'note' => 'max:1000',
            ];

            $response = array('response' => '', 'success'=>false);

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $response['response'] = $validator->messages();
            }else{
                $note = Note::where('id', $id)->where('user_id', $request->user()->id)->update($request->all());
                return response()->json(['response' => 'Note successfully updated','success'=>true], 201);
            }
            return json_encode($response);
        } catch(Exception $e) {
            return json_encode($e);
        }
    }

    /**
     * Delete a note by given id if owned.
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function delete(Request $request, $id)
    {
        $note = $this->getNote($request,$id);
        if(!$note){
            return "{response: 'You do not have permissions to delete this note.', succss: false}";
        }
        try {
            Note::where('id', $id)->delete();
            return response()->json(['response' => 'Note successfully deleted','success'=>true], 201);
        } catch(Exception $e) {
            return json_encode($e);
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $request
     * @param [type] $id
     * @return void
     */
    public function getNote($request,$id)
    {
       return Note::where('id', $id)->where('user_id', $request->user()->id)->first();
    }
}