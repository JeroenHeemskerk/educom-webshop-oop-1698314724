<?php

require_once("basic_doc.php");

class AboutDoc extends BasicDoc
{
    protected function showHeaderContent()
    {
        echo '<h1 class="headers">Aboutpage</h1>';
    }

    protected function showContent()
    {
        echo '<p>Ik ben Laura, 31 jaar en ik woon samen met mijn vriend en twee katten in Hilversum. Ik ben momenteel bezig met een traineeship Software Development bij Educom.
        <p>Mijn hobby\'s zijn:
        <ul>
        <li>Lezen, vooral non-fictie</li>
        <li>Mijn eigen zeep (en andere cosmetica zoals parfum etc.) maken</li>
        <li>Moestuinieren</li>
        <li>Boswandelingen maken</li>
        </ul>
        </p>';
    }
}
