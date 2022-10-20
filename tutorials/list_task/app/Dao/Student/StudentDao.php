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
        $student->location = $request->local;
        $student->save();
    }

    public function list(){
        $search = DB::table('majors')->select(DB::raw('*'))
        ->join('students', 'majors.id', '=', 'students.major_id')
        ->when(request('name'),function($q){
            $name = request('name');
            $q->where('name','LIKE','%'.$name.'%');
        })
        ->when(request('major'),function($q){
            $local = request('major');
            $q->where('major','LIKE','%'.$local.'%');
        })
        ->when(request('location'),function($q){
            $local = request('location');
            $q->where('location','LIKE','%'.$local.'%');
        })
        ->when(request('date'),function($q){
            $date = request('date');
            $q->whereDate('students.created_at', $date);
        })
        ->when(request('end-date'),function($q){
            $start_date = request('date');
            $end_date = request('end-date');
            $q->whereDate('students.created_at', [$start_date,$end_date]);
        })
        ->paginate(10);
        
        return view('studentList',[
            "data" => $search,
            "name" => request('name'),
            "major" => request('major'),
            "location" => request('location'),
            "start" => request('date'),
            "end" => request('end-date')
        ]);
    }
    
    /**
     * To delet name and major
     * @param id 
     * @return Object created delete object
     */
    public function deleteById($id)
    {   
        $delete = Student::find($id);
        $delete->delete();
    }

     /**
     * To edit name and major
     * @param id 
     * @return Object created student object
     */
    public function editById($id)
    {
        $result =Student::find($id);;
        return view('edit',[
            "result" => $result
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
    }   
}
