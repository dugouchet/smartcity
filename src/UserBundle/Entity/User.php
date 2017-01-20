<?php

namespace UserBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
/**
 * User
 */
class User extends BaseUser
{
    /**
     * @var int
     */
    protected $id;
    
    /**
     * @ORM\OneToMany(targetEntity="DataBundle\Entity\Store", mappedBy="owner")
     */
    private $stores;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
	public function getStore() {
		return $this->store;
	}
	public function setStore($store) {
		$this->store = $store;
		return $this;
	}
	
}

