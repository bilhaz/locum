<?php

namespace App\Controllers\admin;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\notificationModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BEBaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['configuration_helper'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    public function LoadView($view = '', $data = array(),  $withHeader = true, $withFooter = true) {
        // to get /en or /ar in url (may be need in future)
//        $uri = service('uri');
//        $lang = $uri->getSegment(1);
//        if (!in_array($lang, ['en', 'ar'])) {
//            return redirect()->to($this->request->getLocale().'/' . $uri->getPath());
//        }

            // $head = [];
            // $usrModel = new UserModel();
            // $head['usr'] = $usrModel->find();



        $data['locale'] = $this->request->getLocale(); // getting active language and passing to view
        //echo view('site/Includes/head.php'); 
        echo ($withHeader ? view('admin/BEtemplates/header') : '');
        // echo  view('templates\header', $data);
        $page = 
                view($view, $data) .
                ($withFooter ? view('admin/BEtemplates/footer') : '');

        return $page;
    }
}
