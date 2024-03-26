<?
function penggunaanLooping() {
    echo "Contoh penggunaan looping:\n";
    echo "Menggunakan for loop:\n";
    for ($i = 1; $i <= 5; $i++) {
        echo "Iterasi ke-$i\n";
    }
    echo "\nMenggunakan while loop:\n";
    $j = 1;
    while ($j <= 5) {
        echo "Iterasi ke-$j\n";
        $j++;
    }
}
?>