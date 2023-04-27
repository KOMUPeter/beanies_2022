<?php
class BeanieFilter
{
    // declaration of properties
    protected float $minPrice = 0;
    protected float $maxPrice = 0;
    protected string $size;
    protected string $material;
    protected array $beaniesFiltered = [];

    // function construct takes all parameters that should be used in data constraction
    // in this case; array $postData  will represent $_POST
    //  and array source will represent $beanies which is (all atributes)
    public function __construct(array $postData, array $source)
    {
        $this->beaniesFiltered = $source;
        if (!empty($postData['minPrice'])) {
            $this->setMinPrice($postData['minPrice']);
        }
        if (!empty($postData['maxPrice'])) {
            $this->setMaxPrice($postData['maxPrice']);
        }
        if (!empty($postData['material'])) {
            $this->setMaterial(trim($postData["material"]));
        }
        if (!empty($postData['size'])) {
            $this->setSize(trim($postData["size"]));
        }
    }

    public function getMinPrice(): float
    {
        return $this->minPrice;
    }

    // price filter
    public function setMinPrice(float $minPrice ): self// take the property to be worked on
    {
        $minPrice = floatval($minPrice); // remove non numeric characters
        $this->beaniesFiltered = array_filter($this->beaniesFiltered, function (Beanie $bonnet) use ($minPrice) {
            return $bonnet->getPrice() >= $minPrice; //array_filter to remove unwanted elements and this to specifiy on element
        });
        $this->minPrice = $minPrice;
        return $this;
    }

    public function getMaxPrice(): float
    {
        return $this->maxPrice;
    }

    public function setMaxPrice(float $maxPrice): self
    {
        $maxPrice = floatval($maxPrice);
        // to filter the price with maximum indicated choosen by the user
        $this->beaniesFiltered = array_filter($this->beaniesFiltered, function (Beanie $bonnet) use ($maxPrice) {
            return $bonnet->getPrice() <= $maxPrice;
        });
        $this->maxPrice = $maxPrice;
        return $this;
    }

    public function getSize(): string
    {
        
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->beaniesFiltered = array_filter($this->beaniesFiltered, function (Beanie $bonnet) use ($size) {
            return in_array($size, $bonnet->getSizes());
        });
        $this->size = $size;
        return $this;
    }

    public function getMaterial(): string
    {
        return $this->material;
    }

    public function setMaterial(string $material): self
    {
        $this->beaniesFiltered = array_filter($this->beaniesFiltered, function (Beanie $bonnet) use ($material) {
            return in_array($material, $bonnet->getMaterials());
        });
        $this->material = $material;
        return $this;
    }

    public function getBeaniesFiltered(): array
    {
        return $this->beaniesFiltered;
    }

    public function setBeaniesFiltered(array $beaniesFiltered): self
    {
        $this->beaniesFiltered = $beaniesFiltered;
        return $this;
    }


}
?>