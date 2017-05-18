<?php
function format_rupiah($uang) {
    return "Rp. ". number_format($uang, 0, ",", ".").",-";
}

function format_dana($uang) {
    return number_format($uang, 0, ".", "");
}
?>