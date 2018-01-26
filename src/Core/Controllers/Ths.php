<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 25.01.18
 * Time: 12:13
 */

namespace SilenceCloud\SilenceFrontEnd\Core\Controllers;

use Http\Request;
use Http\Response;
use SilenceCloud\SilenceFrontEnd\Core\Database\Wrapper;
use SilenceCloud\SilenceFrontEnd\Core\Template\SimpleTemplate;

class Ths
{
    private $request;
    private $response;

    public function __construct(Request $request, Response $response)
    {

        $this->request = $request;
        $this->response = $response;
    }

    public function getFirstPage(){

        $query = null;
        $activePage = 0;

        $queryParametrs = $this->request->getQueryParameters();

        if(isset($_GET['page'])  && $queryParametrs['page'] != null){
            $first = ($queryParametrs['page']-1)*5;
            $query = "SELECT * FROM payments LIMIT 5 OFFSET $first;";
            $activePage = $queryParametrs['page'];
        } else {
            $query = "SELECT * FROM payments LIMIT 5;";
            $activePage = 1;
        }

        $wrapper = new Wrapper();
        $results['data'] = $wrapper->get_results($query);
        $size = $wrapper->get_results("select count(*) as count from payments");
        $results['pages'] = intval(ceil($size['0']['count']/5));
        $results['activePage'] = $activePage;
        $page = new SimpleTemplate("./views/index.php");
        $page->assign('page', $results);
    }

    public function getPage(){
        $queryParametrs = $this->request->getQueryParameters();

        if(isset($_GET['page'])  && $queryParametrs['page'] != null){
            $first = ($queryParametrs['page']-1)*5;
            $query = "SELECT * FROM payments LIMIT 5 OFFSET $first;";
        } else {
            $query = "SELECT * FROM payments LIMIT 5;";
        }

        $wrapper = new Wrapper();
        $result = $wrapper->get_results($query);

        echo json_encode($result);
    }

}