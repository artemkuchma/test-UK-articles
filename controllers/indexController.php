<?php


class indexController extends Controller
{
    public function indexAction()
    {
        $articlesModel = new articlesModel();
        if(!$articlesModel->dbc->checkTable()){
            $articlesModel->dbc->runDump();
        }
        $articleTypesModel = new articleTypeModel();
        $articlesModel->isTableEmpty();

        if($articlesModel->isTableEmpty() || $articleTypesModel->isTableEmpty()){
            $data = Helper::parseCSV();
        }


        $args = ['test' => 'tetsttttt'];

        return $this->render($args);
    }
}