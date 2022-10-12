<?php
namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;
use App\Models\Task;

/**
 * Interface of Data Access Object for Authentication
 */
interface TaskDaoInterface
{
    /**
     * To Save User with values from request
     * @param Request $request request including inputs
     * @return Object created user object
     */
    public function saveUser(Request $request);
    public function deleteById($id);
}
