<?php
require_once 'Basic_Doc.php';

class AboutDoc extends BasicDoc
{
    public function __construct($data)
    {
        parent::__construct($data);
    }

    protected function mainContent()
    {
        echo '<div>';
        echo '<p>Al sinds ik klein kind was, was ik gefascineerd door sleutelbosringen. Hun ijzige geluid als de sleutels erover heen en weer gleden en de stekende pijn onder je nagel als je sleutels aan de bos of van de bos af wilde halen. Terwijl ik ouder werd begon ik ook de meer verborgen eigenschappen te waarderen. De subtiele, minimalistische spiraalvormen en kwaliteitsaspecten van de materiaalkeuze.</p>';
        echo '<p>Nadat ik mijn vader was opgevolgd als palletsorteerder, bleef de sleutelbosring altijd in mijn hart. En nu, nu mijn vader eindelijk de overstap naar gene zijde gemaakt heeft, kan ik eindelijk mijn droom waar maken en een webshop voor sleutelbosringen beginnen.</p>';
    }
}