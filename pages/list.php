<?php
$BeaniesFiltered = [];
$BeaniesFiltered = $beanies;
$minPrice = null;
$maxPrice = null;
$material = null;
$size = null;
var_dump($_POST);
if (!empty($_POST['minPrice'])) {
    $minPrice = floatval($_POST["minPrice"]);
    // to filter the price with minimum indicated choosen by the user
    $BeaniesFiltered = array_filter($BeaniesFiltered, function (Beanie $bonnet) use ($minPrice) {
        return $bonnet->getPrice() >= $minPrice;
    });
}
if (!empty($_POST['maxPrice'])) {
    $maxPrice = floatval($_POST["maxPrice"]);
    // to filter the price with maximum indicated choosen by the user
    $BeaniesFiltered = array_filter($BeaniesFiltered, function (Beanie $bonnet) use ($maxPrice) {
        return $bonnet->getPrice() <= $maxPrice;
    });
}
if (!empty($_POST['material'])) {
    $material = trim($_POST["material"]);
    // choose materials
    $BeaniesFiltered = array_filter($BeaniesFiltered, function (Beanie $bonnet) use ($material) {
        return in_array($material, $bonnet->getMaterials());
    });
}
?>
<form id="list-form" action="" method="post" class="container">
    <h3>Sign Up</h3>
    <ul>
        <li>
            <label for="minPrice">Min Price:</label>
            <input type="number" id="minPrice" name="minPrice" placeholder="0,00" value="<?= $minPrice; ?>">
        </li>
        <li>
            <label for="maxPrice">Max Price:</label>
            <input type="number" id="maxPrice" name="maxPrice" placeholder="0,00" value="<?= $maxPrice; ?>">
        </li>
        <!-- adding material in the list -->
        <li>
            <label for="material">Material:</label>
            <select name="material" id="material">
                <option value="">Choose Material</option>
                <?php
                // selected is an atribute in html already existing
                foreach (Beanie::MATERIALS_AVAILABLE as $value => $name) { ?>
                    <option value="<?= $value; ?>" <?php
                      if ($name == $material) {
                          echo "selected";
                      }
                      ?>
                    ><?= $name; ?></option>
                    <?php
                } ?>
            </select>
        </li>
        <!-- adding size to the list -->
        <li>
            <label for="size">Choose size:</label>
            <select name="size" id="size">
                <option value="">Choose a Size</option>
                <?php
                foreach (Beanie::SIZES_AVAILABLE as $value => $name) { ?>
                    <option value="<?= $value; ?>" <?php
                      if ($name == $size) {
                          echo 'selected';
                      }
                      ?>><?= $name; ?></option>
                    <?php
                } ?>
            </select>
        </li>
    </ul>
    <button type="submit">Filter</button>
</form>
<table>
    <thead>
        <tr>
            <td>key</td>
            <td>Name</td>
            <td>Price HT</td>
            <td>TVA</td>
            <td>Price TTC</td>
            <td>Description</td>
            <td>Add to cart</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($BeaniesFiltered as $id => $bonnet) {
            // call function minimise 
            minimise($bonnet, $id);
        }
        // var_dump($bean)
        ?>
    </tbody>
</table>