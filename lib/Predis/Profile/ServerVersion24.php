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
 * Server profile for Redis v2.4.x.
 *
 * @author Daniele Alessandri <suppakilla@gmail.com>
 */
class Predis_Profile_ServerVersion24 extends Predis_Profile_ServerProfile
{
    /**
     * {@inheritdoc}
     */
    public function getVersion()
    {
        return '2.4';
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
            'keys'                      => 'Predis_Command_KeyKeys',
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


            /* ---------------- Redis 2.0 ---------------- */

            /* commands operating on string values */
            'setex'                     => 'Predis_Command_StringSetExpire',
            'append'                    => 'Predis_Command_StringAppend',
            'substr'                    => 'Predis_Command_StringSubstr',

            /* commands operating on lists */
            'blpop'                     => 'Predis_Command_ListPopFirstBlocking',
            'brpop'                     => 'Predis_Command_ListPopLastBlocking',

            /* commands operating on sorted sets */
            'zunionstore'               => 'Predis_Command_ZSetUnionStore',
            'zinterstore'               => 'Predis_Command_ZSetIntersectionStore',
            'zcount'                    => 'Predis_Command_ZSetCount',
            'zrank'                     => 'Predis_Command_ZSetRank',
            'zrevrank'                  => 'Predis_Command_ZSetReverseRank',
            'zremrangebyrank'           => 'Predis_Command_ZSetRemoveRangeByRank',

            /* commands operating on hashes */
            'hset'                      => 'Predis_Command_HashSet',
            'hsetnx'                    => 'Predis_Command_HashSetPreserve',
            'hmset'                     => 'Predis_Command_HashSetMultiple',
            'hincrby'                   => 'Predis_Command_HashIncrementBy',
            'hget'                      => 'Predis_Command_HashGet',
            'hmget'                     => 'Predis_Command_HashGetMultiple',
            'hdel'                      => 'Predis_Command_HashDelete',
            'hexists'                   => 'Predis_Command_HashExists',
            'hlen'                      => 'Predis_Command_HashLength',
            'hkeys'                     => 'Predis_Command_HashKeys',
            'hvals'                     => 'Predis_Command_HashValues',
            'hgetall'                   => 'Predis_Command_HashGetAll',

            /* transactions */
            'multi'                     => 'Predis_Command_TransactionMulti',
            'exec'                      => 'Predis_Command_TransactionExec',
            'discard'                   => 'Predis_Command_TransactionDiscard',

            /* publish - subscribe */
            'subscribe'                 => 'Predis_Command_PubSubSubscribe',
            'unsubscribe'               => 'Predis_Command_PubSubUnsubscribe',
            'psubscribe'                => 'Predis_Command_PubSubSubscribeByPattern',
            'punsubscribe'              => 'Predis_Command_PubSubUnsubscribeByPattern',
            'publish'                   => 'Predis_Command_PubSubPublish',

            /* remote server control commands */
            'config'                    => 'Predis_Command_ServerConfig',


            /* ---------------- Redis 2.2 ---------------- */

            /* commands operating on the key space */
            'persist'                   => 'Predis_Command_KeyPersist',

            /* commands operating on string values */
            'strlen'                    => 'Predis_Command_StringStrlen',
            'setrange'                  => 'Predis_Command_StringSetRange',
            'getrange'                  => 'Predis_Command_StringGetRange',
            'setbit'                    => 'Predis_Command_StringSetBit',
            'getbit'                    => 'Predis_Command_StringGetBit',

            /* commands operating on lists */
            'rpushx'                    => 'Predis_Command_ListPushTailX',
            'lpushx'                    => 'Predis_Command_ListPushHeadX',
            'linsert'                   => 'Predis_Command_ListInsert',
            'brpoplpush'                => 'Predis_Command_ListPopLastPushHeadBlocking',

            /* commands operating on sorted sets */
            'zrevrangebyscore'          => 'Predis_Command_ZSetReverseRangeByScore',

            /* transactions */
            'watch'                     => 'Predis_Command_TransactionWatch',
            'unwatch'                   => 'Predis_Command_TransactionUnwatch',

            /* remote server control commands */
            'object'                    => 'Predis_Command_ServerObject',
            'slowlog'                   => 'Predis_Command_ServerSlowlog',


            /* ---------------- Redis 2.4 ---------------- */

            /* remote server control commands */
            'client'                    => 'Predis_Command_ServerClient',
        );
    }
}
