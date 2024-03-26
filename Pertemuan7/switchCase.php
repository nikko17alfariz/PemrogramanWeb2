<?
function penggunaanSwitchCase() {
    echo "Contoh penggunaan switch ... case:\n";
    $hari = "Selasa";
    switch ($hari) {
        case "Senin":
            echo "Hari ini adalah Senin.\n";
            break;
        case "Selasa":
            echo "Hari ini adalah Selasa.\n";
            break;
        default:
            echo "Hari ini adalah hari lain.\n";
    }
}
?>