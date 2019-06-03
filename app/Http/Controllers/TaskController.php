<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Auth;
use User;
use DB;

class TaskController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->role;
      //  $show_task = Task::where('user_id', $user)->get();

        if ($role != 'admin') {

             $show_task = DB::table('tasks')
                    ->where('user_id', Auth::id())
                    ->get();
             return view('admin.task.task_list', compact('show_task'));
        } elseif ($role == 'admin') {

             $show_task = DB::table('tasks')
                            ->join('users','users.id', '=', 'tasks.user_id' )
                            ->get();
             return view('admin.task.task_list', compact('show_task'));
        }
       


          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.task.task');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    /*  $request->validate([
        'task_id' => 'required',
        'identity_id' => 'required',
        'phone' => 'required',
        'time' => 'required',

     ]);*/

       $pu = new Task();
       $pu->task_id = $request->task_id;
       $pu->identity_id = $request->identity_id;
       $pu->phone = $request->phone;
       $pu->user_id = $request->user_id;
       $pu->time = $request->time;
       $pu->save();
      return back()->with('message_success', 'Task Submitted Succesfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $e_task = Task::find($id);

        return view('admin.task.edit_task', compact('e_task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return back()->with('success', 'task is successfully deleted');
    }


    //CUSTOM FUNCTION FOR ADMIN

    
}
