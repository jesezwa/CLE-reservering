function reload() {
    // Haal datum op uit datepicker
    var chosenDate = document.getElementById('date').value;

    // Slaat de datum op om later terug te kunnen zetten
    localStorage.setItem('chosenDate', chosenDate);

    // Herlaad de pagina (zodat er nieuwe beschikbaarheids mogelijkheden komen
    window.location.reload(true);
}

// Met deze functie de datum toevoegen

function setValue() {
    // De datum ophalen uit de andere functie om nu terug te zettren in de datepicker
    var storedDate = localStorage.getItem('chosenDate');

    // Checken of er opgeslagen datum is, zo ja dan invullen
    if (storedDate) {
        document.getElementById('date').value = storedDate;
    }
}

// Elke keer als de pagina is herladen de setValue functie gebruiken zodat er constant
// De juiste datum instaat
window.onload = setValue;


<div className="field is-horizontal has-addons has-addons-centered">
    <div className="select">
        <label>
            <select name="selected_time">
                <?php foreach ($times as $time){?>
                <?php
                $isAvailable = !in_array($time, $availabilities);
                if ($isAvailable) {
                    $endTime = date('H:i', strtotime($time) + $timeLenght);
                    ?>
                <option value="<?= $time ?>">
                    <?= "{$time} - {$endTime}" ?>
                </option>
                <?php } ?>
                <?php }?>

            </select>
        </label>
    </div>
</div>


