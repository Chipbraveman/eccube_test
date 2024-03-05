<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Customize\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
//↓追加
use Eccube\Controller\AbstractController;

//class名を変更
class SampleController extends AbstractController
{
    // @Routeと@Templateを変更
    /**
     * @Route("/sample", name="sample", methods={"GET"})
     * @Template("sample.twig")
     */
    public function index()
    {
        return [];
    }
}