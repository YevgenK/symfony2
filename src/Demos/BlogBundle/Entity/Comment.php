<?php
/**
 * Created by JetBrains PhpStorm.
 * User: YevgenK
 * Date: 28.06.13
 * Time: 21:39
 * To change this template use File | Settings | File Templates.
 */

namespace Demos\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="comment")
 */
class Comment {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Post", inversedBy="comment_id", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $post_id;

    /**
     * @ORM\Column(type="text")
     */
    protected $comment;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_date;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated_date;


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
     * Set comment
     *
     * @param string $comment
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    
        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set created_date
     *
     * @param \DateTime $createdDate
     * @return Comment
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
     * @return Comment
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
     * Set post_id
     *
     * @param \Demos\BlogBundle\Entity\Post $postId
     * @return Comment
     */
    public function setPostId(\Demos\BlogBundle\Entity\Post $postId = null)
    {
        $this->post_id = $postId;
    
        return $this;
    }

    /**
     * Get post_id
     *
     * @return \Demos\BlogBundle\Entity\Post 
     */
    public function getPostId()
    {
        return $this->post_id;
    }
}