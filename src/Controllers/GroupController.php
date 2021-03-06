<?php
/**
 * The file is part of Notadd
 *
 * @author: Hollydan<2642956839@qq.com>
 * @copyright (c) 2017, notadd.com
 * @datetime: 17-9-29 下午3:36
 */

namespace Notadd\Carousel\Controllers;


use Notadd\Carousel\Handlers\AllGroupHandler;
use Notadd\Carousel\Handlers\DeleteGroupHandler;
use Notadd\Carousel\Handlers\SetGroupHandler;
use Notadd\Carousel\Handlers\ShowGroupHandler;
use Notadd\Carousel\Handlers\UpdateGroupHandler;
use Notadd\Foundation\Routing\Abstracts\Controller;

class GroupController extends Controller
{
    /**
     * @param AllGroupHandler $handler
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function all(AllGroupHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * @param SetGroupHandler $handler
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function set(SetGroupHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * @param DeleteGroupHandler $handler
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function delete(DeleteGroupHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * @param UpdateGroupHandler $handler
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function update(UpdateGroupHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * @param ShowGroupHandler $handler
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function show(ShowGroupHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }
}