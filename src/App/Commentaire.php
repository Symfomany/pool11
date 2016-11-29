<?php

  class Commentaire {

    protected $id;
    protected $content;
    protected $note;
    protected $date;
    protected $visible;
    protected $humain;
    protected $produit;


  /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Content
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of Content
     *
     * @param mixed content
     *
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of Date
     *
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of Date
     *
     * @param mixed date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of Humain
     *
     * @return mixed
     */
    public function getHumain()
    {
        return $this->humain;
    }

    /**
     * Set the value of Humain
     *
     * @param mixed humain
     *
     * @return self
     */
    public function setHumain($humain)
    {
        $this->humain = $humain;

        return $this;
    }

    /**
     * Get the value of Produit
     *
     * @return mixed
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set the value of Produit
     *
     * @param mixed produit
     *
     * @return self
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;

        return $this;
    }


    public function __construct() {
    }

  }