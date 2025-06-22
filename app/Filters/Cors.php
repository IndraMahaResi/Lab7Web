<?php

    namespace App\Filters;

    use CodeIgniter\Filters\FilterInterface;
    use CodeIgniter\HTTP\RequestInterface;
    use CodeIgniter\HTTP\ResponseInterface;

    class Cors implements FilterInterface
    {
        public function before(RequestInterface $request, $arguments = null)
        {
            // Izinkan semua origin untuk development
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding');
            header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE, PATCH');
            header('Access-Control-Allow-Credentials: true');

            // Tangani preflight OPTIONS request
            if ($request->getMethod() === 'OPTIONS') {
                if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
                    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE, PATCH");
                }
                if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
                    header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
                }
                exit(0);
            }
        }

        public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
        {
            // Tidak perlu melakukan apa-apa setelah request
        }
    }
    