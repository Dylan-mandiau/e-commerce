<?php

namespace App\Entity;

use App\Repository\OrdersDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdersDetailsRepository::class)
 */
class OrdersDetails
{
    /**
     * @ORM\Column(type="integer")
     */
    private $Quantity;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Orders::class, inversedBy="ordersDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $orders;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Products::class, inversedBy="ordersDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $products;



    public function getQuantity(): ?int
    {
        return $this->Quantity;
    }

    public function setQuantity(int $Quantity): self
    {
        $this->Quantity = $Quantity;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getOrders(): ?Orders
    {
        return $this->orders;
    }

    public function setOrders(?Orders $orders): self
    {
        $this->orders = $orders;

        return $this;
    }

    public function getProducts(): ?Products
    {
        return $this->products;
    }

    public function setProducts(?Products $products): self
    {
        $this->products = $products;

        return $this;
    }
}
