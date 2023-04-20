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
        <?php foreach ($beanies as $id => $bonnet) {
            // call function minimise 
            minimise($bonnet, $id);
        }
        // var_dump($bean)
        ?>
    </tbody>
</table>