<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * @var int
     */
    protected $statusCode = 200;

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function responseNotFound(string $message = 'Not Found')
    {

        return $this->setStatusCode(404)->responseError($message);
    }

    /**
     * @param string $message
     * @return mixed
     */
    private function responseError(string $message)
    {

        return $this->response([
            'status' => 'failed',
            'errors' => [
                'status_code' => $this->getStatusCode(),
                'message' => $message
            ]
        ]);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function response(array $data)
    {

        return \Response::json($data, $this->getStatusCode());
    }
}
