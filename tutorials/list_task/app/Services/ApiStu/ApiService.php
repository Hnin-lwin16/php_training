<?php
namespace App\Services\ApiStu;

use App\Contracts\Dao\ApiStu\ApiDaoInterface;
use App\Contracts\Services\ApiStu\ApiServiceInterface;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Service class for student.
 */
class ApiService implements ApiServiceInterface
{
    private $apiDao;
    /**
   * Class Constructor
   * @param StudentDaoInterface
   * @return
   */
    public function __construct(ApiDaoInterface $apiDao)
    {
        $this->apiDao = $apiDao;
    }

    public function edit($id)
    {
        return $this->apiDao->edit($id);
    }

    public function destroy($id)
    {
        return $this->apiDao->destroy($id);
    }
}