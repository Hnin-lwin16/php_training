<?php
namespace App\Dao\ApiStu;

use App\Contracts\Dao\ApiStu\ApiDaoInterface;
use App\Models\Student;
use Illuminate\Http\Request;

/**
 * Data Access Object for Authentication
 */
class ApiDao implements ApiDaoInterface
{
    public function edit($id)
    {
        $where = array('id' => $id);
        $post  = Student::where($where)->first();
    }

    public function destroy($id)
    {
        $post = Student::where('id',$id)->delete();
    }
}
