<?php

require_once("basic_doc.php");

class HomeDoc extends BasicDoc
{

    protected function showHeaderContent()
    {
        echo '<h1 class="headers">Homepage</h1>';
    }
    protected function showContent()
    {
        echo '<p>Welkom op deze website!</p>';
    }
}
