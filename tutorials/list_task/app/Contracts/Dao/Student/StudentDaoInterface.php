<?php
namespace App\Contracts\Dao\Student;

use Illuminate\Http\Request;
use App\Models\Student;

/**
 * Interface of Data Access Object for Authentication
 */
interface StudentDaoInterface
{
    /**
     * To Save student and major with values from request
     * @param Request $request request including inputs
     * @return Object created student object
     */
    public function saveStudent(Request $request);

    public function list();
     /**
     * To delete student and major with values from id
     * @param $id
     * @return Object created delete object
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