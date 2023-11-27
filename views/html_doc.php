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
        echo '<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="js/test.js"></script>';
    }
    protected function showHeadContent()
    {
        //deze functie overriden
        echo "showheadcontent Htmldoc ";
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
        //deze functie overriden
        echo 'showbodycontent Htmldoc';
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
