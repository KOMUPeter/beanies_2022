<?php
class Beanie
{
	const SIZES_AVAILABLE = [
		"S", 
		"M", 
		"L", 
		"XL"
	];
	const MATERIALS_AVAILABLE = [
		self::MATERIALS_WOOL     => "Laine", 
		self::MATERIALS_SILK     => "Soie", 
		self::MATERIALS_CASHMERE => "Cachemire",
		self::MATERIALS_COTTON   => "Coton",
	];
	const MATERIALS_WOOL = "Wool";
	const MATERIALS_SILK = "Silk";
	const MATERIALS_CASHMERE = "Cashmere";
	const MATERIALS_COTTON = "Cotton";

	protected ?int $id;
	protected ?string $name;
	protected ?string $description;
	protected ?float $price = 0.00;
	protected ?string $image;

	protected array $sizes= [];
	protected array $materials= [];
	// METHOD ID
	public function getId(): ?int
	{
		return $this->id;
	}
	
	public function setId(?int $id): self
	{
		$this->id = $id;
		return $this;
	}
	// METHOD NAME
	public function getName(): ?string
	{
		return $this->name;
	}

	public function setName(?string $name): self
	{
		$this->name = $name;
		return $this;
	}
	// METHOD DESCRIPTION
	public function getDescription(): ?string
	{
		return $this->description;
	}

	public function setDescription(?string $description): self
	{
		$this->description = $description;
		return $this;
	}
	// METHOD PRICE
	public function getPrice(): ?float
	{
		return $this->price;
	}

	public function setPrice(?float $price): self
	{
		$this->price = $price;
		return $this;
	}
	// METHOD IMAGE
	public function getImage(): ?string
	{
		return $this->image;
	}

	public function setImage(?string $image): self
	{
		$this->image = $image;
		return $this;
	}


	// METHOD size
	
	public function getSizes(): array {
		return $this->sizes;
	}
	
	public function setSizes(array $sizes): self {
		$this->sizes = $sizes;
		return $this;
	}
	// method and and remove sizes
	public function addSize(string $size): self {
		// VERIFICATION FOR THE PRESENCE OF SIZES IN THE LIST
		if (!in_array($size, self::SIZES_AVAILABLE)) {
			return $this;
		}
		if (!in_array($size, $this->sizes)) {
			$this->sizes[] = $size;
		}
		return $this;
	}

	public function removeSize(string $size): self {
		if (in_array($size, $this->sizes)) {
			foreach($this->sizes as $key => $currentSize){
				if ($currentSize == $size) {
					unset($this->sizes[$key]);
				}
			}
		}
		return $this;
	}

	// method MATERIAL  and ADD/remove MATERIALS

	public function getMaterials(): array {
		return $this->materials;
	}
	
	public function setMaterials(array $materials): self {
		foreach ($materials as $key => $material) {
			$this->addMaterial($material);
		}
		return $this;
	}
	public function addMaterial(string $material): self {
		// VERIFICATION OF THE PRESENCE OF MATERIALS IN THE LIST
		if (!isset(self::MATERIALS_AVAILABLE[$material])) {
			return $this;
		}
		if (!in_array($material, $this->sizes)) {
			$this->materials[$material] = $material;
		}
		return $this;
	}

	public function removeMaterial(string $material): self {
		if (isset($this->materials[$material])) {
			unset($this->materials[$material]);
		}
		return $this;
	}

}