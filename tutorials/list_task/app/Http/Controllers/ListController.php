<?php
namespace App\Http\Controllers;

use App\Contracts\Services\Task\TaskServiceInterface;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
class ListController extends Controller
{
    private $taskInterface;
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskInterface = $taskServiceInterface;
    }
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }
    public function store(Request $request)
    {
        $task = $this->taskInterface->saveUser($request);
        return redirect('/');
    }
    public function destroy($id)
    {
        var_dump($id);
        $task = $this->taskInterface->deleteById($id);
         return redirect('/');
    }
}
