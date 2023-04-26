<?php
class Cart
{

    //Propriété
    protected array $contenu = [];

    //Constructeur
    public function __construct(array $data)
    {
        if (isset($_SESSION['cart'])) {
            $this->contenu = $_SESSION['cart'];
        } else {
            $this->contenu = [];
        }

        if (!empty($data['id'])) {
            $mode = 'add';
            if (!empty($data['mode'])) {
                $mode = $data['mode'];
            }

            switch ($mode) {
                case 'add':
                    $this->add($data['id']);
                    break;
                case 'min':
                    $this->remove($data['id']);
                    break;
                case 'delete':
                    $this->delete($data['id']);
                    break;
            }
        }

        var_dump($this);


        if (isset($data['mode']) && $data['mode'] == 'empty') { //EMPTY items cart
            $this->empty();
        }
    }

    //Methodes
    // Ajout au panier
    public function add($id, $quantity = 1)
    {
        if (empty($this->contenu[$id])) {
            $this->contenu[$id] = 0;
        }
        $this->contenu[$id] += $quantity;
        $_SESSION['cart'] = $this->contenu;
        $this->locationCart();
    }

    // Vider le panier
    public function empty()
    {
        $this->contenu = [];
        $_SESSION['cart'] = $this->contenu;
        $this->locationCart();
    }

    // Retirer une quantité
    public function remove($id, $quantity = 1)
    {
        $this->contenu[$id] -= $quantity;
        if ($this->contenu[$id] <= 0) {
            unset($this->contenu[$id]);
        }
        $_SESSION['cart'] = $this->contenu;
        $this->locationCart();
    }

    // Retirer une quantité
    public function delete($id)
    {
        unset($this->contenu[$id]);
        $_SESSION['cart'] = $this->contenu;
        $this->locationCart();
    }

    public function locationCart()
    {
        header('Location: ?page=cart');
    }


    public function getContenu(): array
    {
        return $this->contenu;
    }

    public function setContenu(array $contenu): self
    {
        $this->contenu = $contenu;
        return $this;
    }
}