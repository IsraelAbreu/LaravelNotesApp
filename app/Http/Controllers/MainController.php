<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Services\Operations;
use Illuminate\Http\Request;
class MainController extends Controller
{
    public function index()
    {
       //load user's note
        $id = session('user');
        $notes = User::find($id)
            ->notes()
            ->whereNull('deleted_at')
            ->get()
            ->toArray();
       //show home view
        return view('home', ['notes' => $notes]);
    }

    public function newNote()
    {
        //show new note view
        return view('new_note');
    }

    public function newNoteSubmit(Request $request){
        //validate request
        $request->validate(
            //rules
            [
                'text_title' => 'required|min:3|max:200',
                'text_note' => 'required|min:3|max:3000'
            ],
            //messages
            [
                'text_title.required' => 'Um título é obrigatório',
                'text_title.min' => 'O título precisa ter no mínimo :min caracteres',
                'text_title.max' => 'O título pode ter no máximo :max caracteres',

                'text_note.required' => 'A descrição é obrigatória',
                'text_note.min' => 'A descrição precisa ter no mínimo :min caracteres',
                'text_note.max' => 'A descrição pode ter no máximo :max caracteres'
            ]
        );
        //get user id
        $id = session('user');

        //create new note
        $note = new Note();
        $note->user_id = $id;
        $note->title = $request->text_title;
        $note->text = $request->text_note;
        $note->save();

        //redirect to home
        return redirect()->route('home');
    }

    public function editNote($id)
    {

        if ($id == null) {
            return redirect()->route('home');
        }

        $id = Operations::decryptId($id);

        $note = Note::find($id);

        return view('edit_note', ['note' => $note]);
    }

    public function editNoteSubmit(Request $request, $id)
    {
        if ($id == null) {
            return redirect()->route('home');
        }

        $noteId = Operations::decryptId($id);

                //validate request
        $request->validate(
            //rules
            [
                'text_title' => 'required|min:3|max:200',
                'text_note' => 'required|min:3|max:3000'
            ],
            //messages
            [
                'text_title.required' => 'Um título é obrigatório',
                'text_title.min' => 'O título precisa ter no mínimo :min caracteres',
                'text_title.max' => 'O título pode ter no máximo :max caracteres',

                'text_note.required' => 'A descrição é obrigatória',
                'text_note.min' => 'A descrição precisa ter no mínimo :min caracteres',
                'text_note.max' => 'A descrição pode ter no máximo :max caracteres'
            ]
        );

        $note = Note::find($noteId);
        
        $note->title = $request->text_title;
        $note->text = $request->text_note;
        $note->save();

        return redirect()->route('home');

    }

    public function deleteNoteConfirm($id)
    {
        if ($id == null) {
            return redirect()->route('home');
        }

        $id = Operations::decryptId($id);

        $note = Note::find($id);
        if ($id == null) {
           return redirect()->route('home');
        }
        return view('delete_note', ['note'=> $note]);
    }

    public function deleteNoteSubmit($id) 
    {
        if ($id == null) {
            return redirect()->route('home');
        }

        $id = Operations::decryptId($id);

        $note = Note::find($id);
        //1. hard delete
        // $note->delete();

        // 2. soft delete updating deleted_at column
        // $note->deleted_at = date('Y-m-d H:i:s');
        // $note->save();

        //3. soft delete (property SoftDelete In Model)
        $note->delete();

        //4 . hard delete (property SoftDelete In Model)
        //$note->forceDelete();

        return redirect()->route('home');
    }

}
