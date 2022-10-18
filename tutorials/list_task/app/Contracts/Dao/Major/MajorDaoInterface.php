<?php
namespace App\Contracts\Dao\Major;

use Illuminate\Http\Request;
use App\Models\Major;

/**
 * Interface of Data Access Object for Authentication
 */
interface MajorDaoInterface
{
    /**
     * To Save major with values from request
     * @param Request $request request including inputs
     * @return Object created major object
     */
    public function saveMajor (Request $request);

     /**
     * To delete major
     * @param id
     * @return Object major saved post
     */
    public function destroyMajor ($id);

    /**
     * To edit major
     * @param id
     * @return Object major saved post
     */
    public function editMajor ($id);

    /**
     * To update major
     * @param Request $request request with inputs
     * @return Object major saved post
     */
    public function updateMajor(Request $request,$id);
}