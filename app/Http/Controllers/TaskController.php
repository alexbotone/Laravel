<?php
//namespace App\Http\Controllers;
//use Illuminate\Http\Request;
//use App\Http\Requests;
//use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Task;
//use App\Nerd;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
//use Input;
class TaskController extends Controller
{
 /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
 public function index(Request $request)
 {
 $tasks = Task::orderBy('name','ASC')->paginate(5);
 return view('tasks.list',compact('tasks'))->with('i', ($request->input('page', 1) - 1) * 5);
 }
 /**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
 public function create()
 {
 return view('tasks.create');
 }
 /**
 * Store a newly created resource in storage.
 *  *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
// validated input request
// validated input request
$this->validate($request, [
'name' => 'required',
'description' => 'required'
]);
// create new task
Task::create($request->all());
return redirect()->route('tasks.index')->with('success', 'Your task added successfully!');
}
/**
* Display the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$task = Task::find($id);
return view('tasks.show',compact('task'));
}
/**
* Show the form for editing the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
$task = Task::find($id);
return view('tasks.edit', compact('task'));
}
/**
* Update the specified resource in storage.
* * @param \Illuminate\Http\Request $request
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
$this->validate($request, [
'name' => 'required',
'description' => 'required'
]);
Task::find($id)->update($request->all());
return redirect()->route('tasks.index')->with('success','Task updated successfully');
}
/**
* Remove the specified resource from storage.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
Task::find($id)->delete();
return redirect()->route('tasks.index')->with('success','Task removed successfully');
}
}