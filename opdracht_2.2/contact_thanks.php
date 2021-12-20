<?php

function showThanksMessage($data) {
        echo '<p>Bedankt voor uw reactie!</p>

        <div>Naam: '.$data['name'].'</div>
        <div>Email: '.$data['email'].'</div>
        <div>Nummer: '.$data['phone'].'</div>
        <div>Bericht: '.$data['message'].'</div>';
    }

?>