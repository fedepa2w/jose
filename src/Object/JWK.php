<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2015 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Jose\Object;

/**
 * Class JWK.
 */
final class JWK implements JWKInterface
{
    /**
     * @var array
     */
    protected $values = [];

    /**
     * JWK constructor.
     *
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        if (!array_key_exists('kty', $values)) {
            throw new \InvalidArgumentException('The parameter "kty" is mandatory.');
        }
        $this->values = $values;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return $this->getAll();
    }

    /**
     * {@inheritdoc}
     */
    public function get($key)
    {
        if ($this->has($key)) {
            return $this->values[$key];
        }
        throw new \InvalidArgumentException(sprintf('The value identified by "%s" does not exist.', $key));
    }

    /**
     * {@inheritdoc}
     */
    public function has($key)
    {
        return array_key_exists($key, $this->getAll());
    }

    /**
     * {@inheritdoc}
     */
    public function getKeys()
    {
        return array_keys($this->values);
    }

    /**
     * {@inheritdoc}
     */
    public function getAll()
    {
        return $this->values;
    }
}
