<?php
namespace Kizilare\Cache;

class Memcached
{
    /**
     * Determines if the actions must override the previous ones.
     *
     * @var boolean
     */
    public $override = false;

    /**
     * Memcached server.
     *
     * @var Memcached
     */
    protected $connection = null;

    /**
     * Thread id.
     *
     * @var string
     */
    protected $thread_id;

    public function __construct( $thread_id )
    {
        $this->thread_id = $thread_id;
        $this->connection = new \Memcached();
        $servers = \Kizilare\Framework\App::getInstance()->getConfig( 'memcached' );
        $this->connection->addServers( $servers );
    }

    /**
     * loads the script information.
     *
     * @param string $key
     *
     * @return array
     */
    public function get( $key )
    {
        return $this->connection->get( $key );
    }

    /**
     * Saves date into file.
     *
     * @param string $key
     * @param        $data
     */
    public function set( $key, $data )
    {
        $this->connection->set( $key, $data );
    }
}

?>