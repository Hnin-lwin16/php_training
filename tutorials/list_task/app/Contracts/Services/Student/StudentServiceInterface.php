<?php
namespace App\Contracts\Services\Student;

use Illuminate\Http\Request;
use App\Models\Studend;

/**
 * Interface for task service
 */
interface StudentServiceInterface
{
    /**
     * To save major
     * @param Request $request request with inputs
     * @return Object major saved post
     */
    public function saveStudent(Request $request);

    /**
     * To Save student and major with values from request
     * @param Request $request request including inputs
     * @return Object created student object
     */
    public function deleteById($id);

    /**
     * To edit student and major with values from $id
     * @param $id
     * @return Object created student object
     */
    public function editById($id);

    /**
     * To update student and major with values from request
     * @param Request $request request including inputs
     * @return Object created student object
     */
    public function updateById(Request $request,$id);
}
?>