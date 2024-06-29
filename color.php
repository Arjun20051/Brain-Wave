<?php

// Function to generate a random color
function generateRandomColor() {
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}

// Function to generate a color palette with a specified number of colors
function generateColorPalette($numColors) {
    $palette = array();
    for ($i = 0; $i < $numColors; $i++) {
        $palette[] = generateRandomColor();
    }
    return $palette;
}

// Generate and display 5 color palettes, each with 6 colors
for ($paletteNumber = 1; $paletteNumber <= 5; $paletteNumber++) {
    $colorPalette = generateColorPalette(6);

    echo "<h2>Color Palette $paletteNumber</h2>";
    echo "<div style='display: flex;'>";
    foreach ($colorPalette as $color) {
        echo "<div style='background-color: $color; width: 50px; height: 50px; margin: 5px;'></div>";
    }
    echo "</div>";
}

?>
