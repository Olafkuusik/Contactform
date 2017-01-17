<?php
/**
 * Created by PhpStorm.
 * User: Olaf
 * Date: 17.01.2017
 * Time: 22:33
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Contacts;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;
use Nelmio\Alice\Fixtures\Fixture;


class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        Fixtures::load(__DIR__.'/fixtures.yml', $manager);
    }
}