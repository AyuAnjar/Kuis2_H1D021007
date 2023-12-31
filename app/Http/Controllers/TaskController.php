<?php

namespace App\Http\Controllers;

//import Model "Task"
use App\Models\Task;

//return type View
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get Tasks
        $tasks = Task::latest()->get();

        //render view with Tasks
        return view('task', compact('tasks'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('createtask');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'judul'   => 'required',
            'deskripsi'   => 'required',
            'status'   => 'required',
        ]);

        //create post
        Task::create([
            'judul'   => $request->judul,
            'deskripsi'   => $request->deskripsi,
            'status'   => $request->status,
        ]);

        //redirect to index
        return redirect('/')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $task = Task::findOrFail($id);

        $list = array('Completed', 'Incomplete');

        //render view with post
        return view('edit', compact('task', 'list'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //get post by ID
        $task = Task::findOrFail($id);

        //update
        $task->update([
            'judul'   => $request->judul,
            'deskripsi'   => $request->deskripsi,
            'status'   => $request->status,
        ]);

        //redirect to index
        return redirect('/')->with(['success' => 'Data Berhasil Diubah!']);
    }


    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $task = Task::findOrFail($id);

        //delete post
        $task->delete();

        //redirect to index
        return redirect('/')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function completed(){
        $task = Task::where('status','Completed')->get();
        return view('completed', compact('task'));
    }

    public function incomplete(){
        $task = Task::where('status','Incomplete')->get();
        return view('incomplete', compact('task'));
    }

    public function updateStatus($id): RedirectResponse{
        $task = Task::findOrFail($id);
        $task->update(['status' => $task->status === 'Completed' ? 'Incomplete' : 'Completed']);

        return redirect('/');
    }
}
