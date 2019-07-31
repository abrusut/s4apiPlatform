<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $this->loadBlogPosts($manager);

        $manager->flush();
    }
    public function loadBlogPosts(ObjectManager $manager)
    {
            $blogPost = new BlogPost();
            $blogPost->setTitle("primer blog");
            $blogPost->setPublished(new \DateTime('2018-07-01 12:00:00'));
            $blogPost->setContent("un contenido blog 1");
            $blogPost->setAuthor("abrusut");
            $blogPost->setSlug("primer-blog");

            $manager->persist($blogPost);

            $blogPost = new BlogPost();
            $blogPost->setTitle("second blog");
            $blogPost->setPublished(new \DateTime('2018-07-03 12:00:00'));
            $blogPost->setContent("un contenido blog 2");
            $blogPost->setAuthor("abrusut");
            $blogPost->setSlug("second-blog");

            $manager->persist($blogPost);

        $manager->flush();
    }
}
