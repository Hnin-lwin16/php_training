<?php
namespace App\Services\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Exports\StudentListExport;
use App\Imports\StudentImport;
use Excel;


/**
 * Service class for student.
 */
class StudentService implements StudentServiceInterface
{
    private $studentDao;
    /**
   * Class Constructor
   * @param StudentDaoInterface
   * @return
   */
    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }
    
    /**
     * To save student
     * @param Request $request request with inputs
     * @return Object student saved post
     */
    public function saveStudent(Request $request)
    {
        return $this->studentDao->saveStudent($request);
    }

    public function list()
    {
        return $this->studentDao->list();
    }
    /**
     * To delete student and major with values from id
     * @param $id
     * @return Object created delete object
     */
    public function deleteById($id)
    {
        return $this->studentDao->deleteById($id);
    }

    /**
     * To edit student and major with values from $id
     * @param $id
     * @return Object created student object
     */
    public function editById($id)
    {
        return $this->studentDao->editById($id);
    }

    /**
     * To update student and major with values from request
     * @param Request $request request including inputs
     * @return Object created student object
     */
    public function updateById(Request $request,$id)
    {
        return $this->studentDao->updateById($request,$id);
    }

    public function exportExcel() 
    {
        return Excel::download(new StudentListExport, 'studentlist.xlsx');
    }
    
    
    public function import(Request $request) 
    {
        $start = new StudentImport;
        
        Excel::import($start,$request->file);
    }
    
    public function search()
    {
        return $this->studentDao->search();
    }
}
?>