<?php
namespace App\Dao\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


/**
 * Data Access Object for Authentication
 */
class TaskDao implements TaskDaoInterface
{
    /**
     * To Save email with values from request
     * @param Request $request request including inputs
     * @return Object created user object
     */
    public function saveUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
        ]);
    
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $task = new Task;
        $task->email = $request->email;
        $task->save();
        return $task;
    }
    
    public function deleteById($id)
    {   
        $delete = Task::find($id);
        $delete->delete();
        return redirect('/');
    }
}
?>