<?php
/**
 *
 */
class Tools extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        // $this->view->setLayout('default'); // in case you want to change the layout
    }

    public function indexAction()
    {
        $this->view->render('tools/index');
    }

    public function firstAction()
    {
        $this->view->render('tools/first');
    }
    public function secondAction()
    {
        $this->view->render('tools/second');
    }
    public function thirdAction()
    {
        $this->view->render('tools/third');
    }
}
