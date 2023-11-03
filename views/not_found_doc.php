<?php

require_once("basic_doc.php");

class NotFoundDoc extends BasicDoc
{

    protected function showHeaderContent()
    {
        echo '<h1 class="headers">Not found</h1>';
    }
    protected function showContent()
    {
        echo '<p>Page not found! :(</p>';
    }
}
