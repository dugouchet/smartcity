<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Store
 *
 * @ORM\Table(name="store")
 * @ORM\Entity(repositoryClass="DataBundle\Repository\StoreRepository")
 */
class Store
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\Type("string")
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="address", type="string", length=255)
     * @Assert\Type("string")
     * @Assert\NotBlank()
     * @Assert\Length(min=5)
     */
    private $address;
    
    /**  
     * @var string
     * @ORM\Column(name="city", type="string", length=255)
     * @Assert\Type("string")
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=40)
     * */
    private $city;
    
    /**  
     * @var string
     * @ORM\Column(name="state", type="string", length=255)
     * @Assert\Type("string")
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=40)
     * */
    private $state;
    
    /**  
     * @var int
     * @ORM\Column(name="zipcode", type="integer")
     * @Assert\NotBlank()
     *  @Assert\Range(
     *      min = 3,
     *      max = 10,
     *      minMessage = "The ZipCode must be at least 3",
     *      maxMessage = "The ZipCode cannot be bigger than 10"
     * )
     * @Assert\Type(
     *     type="integer",
     *     message="The value is not a valid."
     * )
     * */
    private $zipcode;
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Store
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Store
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }
	public function getCity() {
		return $this->city;
	}
	public function setCity( $city) {
		$this->city = $city;
		return $this;
	}
	public function getState() {
		return $this->state;
	}
	public function setState( $state) {
		$this->state = $state;
		return $this;
	}
	public function getZipcode() {
		return $this->zipcode;
	}
	public function setZipcode( $zipcode) {
		$this->zipcode = $zipcode;
		return $this;
	}
	
	
}

