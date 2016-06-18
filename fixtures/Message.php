<?php
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Message\Entity\Message as MessageModel;

/**
 *
 * @author Romeu Mattos <romeu.smattos@gmail.com>
 */
class Message extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Loader
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $i      = 1;
        $message   = [
            'name' => 'Message ' . $i,
            'email' => 'message' . $i . '@messages.net',
        ];

        $obj = new MessageModel();
        $obj->setName($message['name']);
        $obj->setEmail($message['email']);

        $manager->persist($obj);
        $manager->flush();

        $this->addReference('message_' . $i, $obj);
    }

    /**
     * Load order
     *
     * @return int
     */
    public function getOrder()
    {
        return 2;
    }
}