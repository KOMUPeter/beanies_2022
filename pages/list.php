<?php
$beanieFilter = new BeanieFilter($_POST, $beanies); // create new class

$BeaniesFiltered = [];
$BeaniesFiltered = $beanies;
$minPrice = null;
$maxPrice = null;
$material = null;
$size = null;
// var_dump($getMaterials());
?>
<form id="list-form" action="" method="post" class="container">
    <h3>Sign Up</h3>
    <ul>
        <li>
            <label for="minPrice">Min Price:</label>
            <input type="number" id="minPrice" name="minPrice" placeholder="0,00" value=<?= $beanieFilter->getMinPrice(); ?>>
        </li>
        <li>
            <label for="maxPrice">Max Price:</label>
            <input type="number" id="maxPrice" name="maxPrice" placeholder="0,00" value=<?= $beanieFilter->getMaxPrice(); ?>>
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
                foreach (Beanie::SIZES_AVAILABLE as $value ) { ?>
                    <option value="<?= $value; ?>" <?php
                      if ($value == $size) {
                          echo 'selected';
                      }
                      ?>><?= $value; ?>
                    </option>
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
        <?php foreach ($beanieFilter->getBeaniesFiltered() as $id => $bonnet) {
            // call function minimise 
            minimise($bonnet, $id);
        }
        // var_dump($bean)
        ?>
    </tbody>
</table>