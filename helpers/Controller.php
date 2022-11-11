<?php


class Controller
{


    private function file_path()
    {
        $tplDir = Router::getController();
        $tplName = Router::getAction();

        $templateFile = VIEW_DIR . $tplDir . DS . $tplName . '.html';
        if (!file_exists($templateFile)) {

            throw new Exception("{$templateFile} not found", 404);
        }
        return $templateFile;
    }


    protected function render(array $args = [])
    {
        extract($args);
        ob_start();
        require $this->file_path();
        $content = ob_get_clean();
        require VIEW_DIR . 'layout.html';
        return ob_get_clean();
    }


}