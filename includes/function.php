<?php
// function to calculate price before tva
function withoutVAT(float $price): float
{
    return $price / 1.2;
}
// function tva
function tva(): float
{
    return 20;
}
// function minimise the code
function minimise(object $bonnet, int $id): void
{
    ?>
    <tr>
        <td>
            <?php echo $bonnet->getId(); ?>
        </td>

        <td>
            <?php echo $bonnet->getName(); ?>
        </td>

        <td>
            <?php echo number_format(withoutVAT($bonnet->getPrice()), 2, '.', ' '); ?>€
        </td>

        <td>
            <?php echo number_format(tva(), 2, '.', ' '); ?>%
        </td>

        <td <?php if ($bonnet->getPrice() <= 12) {
            echo 'class = "green"';
        } elseif ($bonnet->getPrice() >= 12) {
            echo 'class = "blue"';
        }
        ?>> <?php echo number_format($bonnet->getPrice(), 2, '.', ' '); ?>€</td>

        <td>
            <?php echo $bonnet->getDescription(); ?>
        </td>
        <!-- adding cart -->

        <td> <a href="?page=cart&id=<?php echo $bonnet->getId(); ?>" class="btn btn-primary">Buy Now</a></td>
        </ul>
    </tr>
    <?php
}

function findById(array $beanies, int $id): ?Beanie
{
    foreach ($beanies as $bonnet) {
        if ($bonnet->getId() == $id) {
            return $bonnet;
        }
    }
    return null;
}