<?php
namespace App\Services\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Service class for task.
 */
class TaskService implements TaskServiceInterface
{
    private $taskDao;
    /**
   * Class Constructor
   * @param TaskDaoInterface
   * @return
   */
    public function __construct(TaskDaoInterface $taskDao)
    {
        $this->taskDao = $taskDao;
    }
    /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $task saved post
     */
    public function saveUser(Request $request)
    {
        return $this->taskDao->saveUser($request);
    }
    public function deleteById($id)
    {
        return $this->taskDao->deleteById($id);
    }
}
?>