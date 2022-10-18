<?php
namespace App\Dao\Major;

use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

/**
 * Data Access Object for Authentication
 */
class MajorDao implements MajorDaoInterface
{
    /**
     * To Save major with values from request
     * @param Request $request request including inputs
     * @return Object created major object
     */
    public function saveMajor (Request $request)
    {
        $major = new Major;
        $major->major = $request->major_only;
        $major->save();
    }
    public function destroyMajor ($id)
    {
        $delete_major = Major::find($id);
        echo $delete_major;
        $delete_major->delete();
    }
    public function editMajor ($id)
    {
        $edit_major = Major::find($id);
       
        
        //$edit_major->major = major;
        //$edit_major->save();
        //return redirect('/major/list');
        return view('major-edit',[
            "edit" => $edit_major
        ]);
    }

    public function updateMajor(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'major_only' => 'required|unique:majors,major'
           
        ]);
    
        if ($validator->fails()) {
            return redirect('/major/list')
                ->withInput()
                ->withErrors($validator);
        }
        $update_major = Major::find($id);
        $update_major->major = $request->major_only;
        $update_major->save();
        return redirect('/major/list');
    }
}
?>