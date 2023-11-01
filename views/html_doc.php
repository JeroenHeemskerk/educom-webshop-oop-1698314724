<?php

// dit is de top-class!

class HtmlDoc
{
    private function showHtmlStart()
    {
        echo "<!doctype html>
        <html class='entirepage'>";
    }
    private function showHeadStart()
    {
        echo '<head>';
    }
    protected function showHeadContent()
    {
        //deze functie overriden?
        // default neerzetten
    }
    private function showHeadEnd()
    {
        echo '</head>';
    }
    private function showBodyStart()
    {
        echo '<body>';
    }
    protected function showBodyContent()
    {
        //deze functie overriden?
        //default neerzetten
        echo 'hallo';
    }
    private function showBodyEnd()
    {
        echo '</body>';
    }
    private function showHtmlEnd()
    {
        echo  '</html>';
    }

    public function show()
    {
        $this->showHtmlStart();
        $this->showHeadStart();
        $this->showHeadContent();
        $this->showHeadEnd();
        $this->showBodyStart();
        $this->showBodyContent();
        $this->showBodyEnd();
        $this->showHtmlEnd();
    }
}
