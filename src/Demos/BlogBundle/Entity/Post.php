<?php
/**
 * Created by JetBrains PhpStorm.
 * User: YevgenK
 * Date: 28.06.13
 * Time: 21:39
 * To change this template use File | Settings | File Templates.
 */

namespace Demos\BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="post")
 */
class Post {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $title;

    /**
     * @ORM\Column(type="text")
     */
    protected $body;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="post_id", cascade={"persist", "remove"})
     */
    protected $comment_id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_date;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated_date;

    public function __construct()
    {
        $this->comment_id = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return Post
     */
    public function setBody($body)
    {
        $this->body = $body;
    
        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set created_date
     *
     * @param \DateTime $createdDate
     * @return Post
     */
    public function setCreatedDate($createdDate)
    {
        $this->created_date = $createdDate;
    
        return $this;
    }

    /**
     * Get created_date
     *
     * @return \DateTime 
     */
    public function getCreatedDate()
    {
        return $this->created_date;
    }

    /**
     * Set updated_date
     *
     * @param \DateTime $updatedDate
     * @return Post
     */
    public function setUpdatedDate($updatedDate)
    {
        $this->updated_date = $updatedDate;
    
        return $this;
    }

    /**
     * Get updated_date
     *
     * @return \DateTime 
     */
    public function getUpdatedDate()
    {
        return $this->updated_date;
    }

    /**
     * Add comment_id
     *
     * @param \Demos\BlogBundle\Entity\Comment $commentId
     * @return Post
     */
    public function addCommentId(\Demos\BlogBundle\Entity\Comment $commentId)
    {
        $this->comment_id[] = $commentId;
    
        return $this;
    }

    /**
     * Remove comment_id
     *
     * @param \Demos\BlogBundle\Entity\Comment $commentId
     */
    public function removeCommentId(\Demos\BlogBundle\Entity\Comment $commentId)
    {
        $this->comment_id->removeElement($commentId);
    }

    /**
     * Get comment_id
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommentId()
    {
        return $this->comment_id;
    }
}