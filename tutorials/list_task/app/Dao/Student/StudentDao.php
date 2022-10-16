<?php
namespace App\Dao\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Models\Studend;
use App\Models\Major;
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
        $student = new Studend;
        $student->name = $request->name;
        $student->major_id= $request->get('major_only');
        $student->save();
        return $student;
    }
    
    /**
     * To delet name and major
     * @param id 
     * @return Object created delete object
     */
    public function deleteById($id)
    {   
        $delete = Studend::find($id);
        $m_delete = Major::find($id);
        $delete->delete();
        $m_delete->delete();
    }

     /**
     * To edit name and major
     * @param id 
     * @return Object created student object
     */
    public function editById($id)
    {
        $result =Studend::with("major")->get();
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
            'major_only' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect('/student/list')
                ->withInput()
                ->withErrors($validator);
        }
        
        $result =Studend::with("major")->find($id);
        $result->name = $request->name;
        $result->major_id = $request->major_id;
        $major = Major::find($result->major_id);
        $major->major = $request->major_only;
        $major->save();
        $result->major->major = $major->major;
        $result->save();
        return view('studentList');
    }
}
?>