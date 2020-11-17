<?php

class RestfulApi
{

    /**
     * @var string
     * Method duoc goi
     */
    protected $method = '';

    /**
     *  End point cua api
     */
    protected $endpoint = '';

    /**
     * @var array
     * Cac tham so cua request
     */
    protected $params = array();

    /**
     * Luu tru file cua PUT request
     *
     */
    protected $file = null;

    public function __construct()
    {
        $this->input();
//        $this->process_api();
    }

    /**
     * Allow CORS
     * Thuc hien lay cac thong tin cua request
     */
    public function input()
    {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");

        $this->params = explode('/', trim($_SERVER['PATH_INFO']), '/');
        $this->endpoint = array_shift($this->params);

        echo "endpoint: ". $_SERVER['REQUEST_URI'] . $this->endpoint;

        // Lay method cua request
        $method = $_SERVER['REQUEST_METHOD'];
        $allow_method = array('GET', 'POST', 'PUT', 'DELETE');

        if (in_array($method, $allow_method)) {
            $this->method = $method;
        }

        // Nhan du lieu tuong ung theo tung loai request
        switch ($this->method) {
            case 'POST':
                $this->params = $_POST;
                break;
            case 'GET':
                // Khong can nhan boi params da lay tu url
                break;

            case 'DELETE':
                // Khong can nhan vi params da lay tu url
                break;

            case 'PUT':
                $this->file = file_get_contents("php://input");
                break;
            default:
                $this->response(500, "Invalid Method");
                break;
        }
    }

    /**
     * Thuc hien xu ly request
     */
    public function process_api()
    {
        echo $this->endpoint;
        if (method_exists($this, $this->endpoint)) {
            $this->{$this->endpoint}();
        } else {
            $this->response(500, "Unknown endpoint");
        }
    }

    /**
     * @param $statusCode
     * @param $data
     */
    protected function response($statusCode, $data)
    {
        header($this->build_http_header_string($statusCode));
        header("Content-type: application/json");
        echo json_encode($data);
        die();
    }

    /**
     * @param $statusCode
     * Tao chuoi http header
     * @return string
     */
    public function build_http_header_string($statusCode)
    {
        $status = array(
            200 => 'OK',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error'
        );
        return "HTTP/1.1 " . $statusCode . " " . $status[$statusCode];
    }

}