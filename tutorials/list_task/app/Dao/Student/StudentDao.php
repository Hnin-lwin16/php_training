<?php
namespace App\Dao\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Models\Student;
use App\Models\Major;
use App\Models\Studentlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

/**
 * Data Access Object for Authentication
 */
class StudentDao implements StudentDaoInterface
{
    /**
     * To Save name and major with values from request
     * @param Request $request request including inputs
     * @return Object created Student object
     */
    public function saveStudent(Request $request)
    {
        $student = new Student;
        $student->name = $request->name;
        $student->major_id= $request->get('major_only');
        //$major = Major::find($student->major_id);
        //$student->major = $major->major;
        $student->location = $request->local;
        $student->save();
    //    $result =Studend::with("major")->find($student->major_id);
    //    echo $result->name;
    //    $get_list = new Studentlist;
    //   
    //            
    //           
    //            $get_list->studentName = $result->name;
    //            $get_list->major = $result->major->major;
    //            $get_list->save();
            
            
        
        return $student;
    }
    
    /**
     * To delet name and major
     * @param id 
     * @return Object created delete object
     */
    public function deleteById($id)
    {   
        $delete = Student::find($id);
        
        //$l_delete = Studentlist::find($id);

        $delete->delete();
       
        //$l_delete->delete();
    }

     /**
     * To edit name and major
     * @param id 
     * @return Object created student object
     */
    public function editById($id)
    {
        $result =Student::with("major")->get();
        $re =  $result[$id];
        
        return view('edit',[
            "result" => $re
        ]);
    }

     /**
     * To update name and major
     * @param id and request from input
     * @return Object created student object
     */
    public function updateById(Request $request,$id)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'major_only' => 'required',
            'local' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect('/student/list')
                ->withInput()
                ->withErrors($validator);
        }
        
        $result =Student::with("major")->find($id);
        
        $result->name = $request->name;
        $result->major_id = $request->get('major_only');
        $result->location = $request->local;
         $major = Major::find($result->major_id);
        
         
        $result->major->major = $major->major;
        
        $result->save();
        
        return view('studentList');
    }
}
?>