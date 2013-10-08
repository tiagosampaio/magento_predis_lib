<?php

/*
 * This file is part of the Predis package.
 *
 * (c) Daniele Alessandri <suppakilla@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

//namespace Predis_Profile;

/**
 * Server profile for Redis v1.2.x.
 *
 * @author Daniele Alessandri <suppakilla@gmail.com>
 */
class Predis_Profile_ServerVersion12 extends Predis_Profile_ServerProfile
{
    /**
     * {@inheritdoc}
     */
    public function getVersion()
    {
        return '1.2';
    }

    /**
     * {@inheritdoc}
     */
    public function getSupportedCommands()
    {
        return array(
            /* ---------------- Redis 1.2 ---------------- */

            /* commands operating on the key space */
            'exists'                    => 'Predis_Command_KeyExists',
            'del'                       => 'Predis_Command_KeyDelete',
            'type'                      => 'Predis_Command_KeyType',
            'keys'                      => 'Predis_Command_KeyKeysV12x',
            'randomkey'                 => 'Predis_Command_KeyRandom',
            'rename'                    => 'Predis_Command_KeyRename',
            'renamenx'                  => 'Predis_Command_KeyRenamePreserve',
            'expire'                    => 'Predis_Command_KeyExpire',
            'expireat'                  => 'Predis_Command_KeyExpireAt',
            'ttl'                       => 'Predis_Command_KeyTimeToLive',
            'move'                      => 'Predis_Command_KeyMove',
            'sort'                      => 'Predis_Command_KeySort',

            /* commands operating on string values */
            'set'                       => 'Predis_Command_StringSet',
            'setnx'                     => 'Predis_Command_StringSetPreserve',
            'mset'                      => 'Predis_Command_StringSetMultiple',
            'msetnx'                    => 'Predis_Command_StringSetMultiplePreserve',
            'get'                       => 'Predis_Command_StringGet',
            'mget'                      => 'Predis_Command_StringGetMultiple',
            'getset'                    => 'Predis_Command_StringGetSet',
            'incr'                      => 'Predis_Command_StringIncrement',
            'incrby'                    => 'Predis_Command_StringIncrementBy',
            'decr'                      => 'Predis_Command_StringDecrement',
            'decrby'                    => 'Predis_Command_StringDecrementBy',

            /* commands operating on lists */
            'rpush'                     => 'Predis_Command_ListPushTail',
            'lpush'                     => 'Predis_Command_ListPushHead',
            'llen'                      => 'Predis_Command_ListLength',
            'lrange'                    => 'Predis_Command_ListRange',
            'ltrim'                     => 'Predis_Command_ListTrim',
            'lindex'                    => 'Predis_Command_ListIndex',
            'lset'                      => 'Predis_Command_ListSet',
            'lrem'                      => 'Predis_Command_ListRemove',
            'lpop'                      => 'Predis_Command_ListPopFirst',
            'rpop'                      => 'Predis_Command_ListPopLast',
            'rpoplpush'                 => 'Predis_Command_ListPopLastPushHead',

            /* commands operating on sets */
            'sadd'                      => 'Predis_Command_SetAdd',
            'srem'                      => 'Predis_Command_SetRemove',
            'spop'                      => 'Predis_Command_SetPop',
            'smove'                     => 'Predis_Command_SetMove',
            'scard'                     => 'Predis_Command_SetCardinality',
            'sismember'                 => 'Predis_Command_SetIsMember',
            'sinter'                    => 'Predis_Command_SetIntersection',
            'sinterstore'               => 'Predis_Command_SetIntersectionStore',
            'sunion'                    => 'Predis_Command_SetUnion',
            'sunionstore'               => 'Predis_Command_SetUnionStore',
            'sdiff'                     => 'Predis_Command_SetDifference',
            'sdiffstore'                => 'Predis_Command_SetDifferenceStore',
            'smembers'                  => 'Predis_Command_SetMembers',
            'srandmember'               => 'Predis_Command_SetRandomMember',

            /* commands operating on sorted sets */
            'zadd'                      => 'Predis_Command_ZSetAdd',
            'zincrby'                   => 'Predis_Command_ZSetIncrementBy',
            'zrem'                      => 'Predis_Command_ZSetRemove',
            'zrange'                    => 'Predis_Command_ZSetRange',
            'zrevrange'                 => 'Predis_Command_ZSetReverseRange',
            'zrangebyscore'             => 'Predis_Command_ZSetRangeByScore',
            'zcard'                     => 'Predis_Command_ZSetCardinality',
            'zscore'                    => 'Predis_Command_ZSetScore',
            'zremrangebyscore'          => 'Predis_Command_ZSetRemoveRangeByScore',

            /* connection related commands */
            'ping'                      => 'Predis_Command_ConnectionPing',
            'auth'                      => 'Predis_Command_ConnectionAuth',
            'select'                    => 'Predis_Command_ConnectionSelect',
            'echo'                      => 'Predis_Command_ConnectionEcho',
            'quit'                      => 'Predis_Command_ConnectionQuit',

            /* remote server control commands */
            'info'                      => 'Predis_Command_ServerInfo',
            'slaveof'                   => 'Predis_Command_ServerSlaveOf',
            'monitor'                   => 'Predis_Command_ServerMonitor',
            'dbsize'                    => 'Predis_Command_ServerDatabaseSize',
            'flushdb'                   => 'Predis_Command_ServerFlushDatabase',
            'flushall'                  => 'Predis_Command_ServerFlushAll',
            'save'                      => 'Predis_Command_ServerSave',
            'bgsave'                    => 'Predis_Command_ServerBackgroundSave',
            'lastsave'                  => 'Predis_Command_ServerLastSave',
            'shutdown'                  => 'Predis_Command_ServerShutdown',
            'bgrewriteaof'              => 'Predis_Command_ServerBackgroundRewriteAOF',
        );
    }
}
