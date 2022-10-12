<?php
namespace App\Contracts\Services\Task;

use Illuminate\Http\Request;
use App\Models\Task;

/**
 * Interface for task service
 */
interface TaskServiceInterface
{
    /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function saveUser(Request $request);
    public function deleteById($id);
}
?>