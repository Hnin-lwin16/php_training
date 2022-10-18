<?php
namespace App\Services\Major;

use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Contracts\Services\Major\MajorServiceInterface;
use Illuminate\Http\Request;
use App\Models\Major;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Service class for major.
 */
class MajorService implements MajorServiceInterface
{
    private $majorDao;
    /**
   * Class Constructor
   * @param MajorDaoInterface
   * @return
   */
    public function __construct(MajorDaoInterface $majorDao)
    {
        $this->majorDao = $majorDao;
    }
    
    /**
     * To save major
     * @param Request $request request with inputs
     * @return Object major saved post
     */
    public function saveMajor(Request $request)
    {
        return $this->majorDao->saveMajor($request);
    }
    public function destroyMajor ($id)
    {
        return $this->majorDao->destroyMajor($id);
    }
    
    public function editMajor ($id)
    {
        return $this->majorDao->editMajor ($id);
    }

    public function updateMajor (Request $request,$id)
    {
        return $this->majorDao->updateMajor ($request,$id);
    }
}
?>