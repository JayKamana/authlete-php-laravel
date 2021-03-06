<?php
//
// Copyright (C) 2018 Authlete, Inc.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing,
// software distributed under the License is distributed on an
// "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND,
// either express or implied. See the License for the specific
// language governing permissions and limitations under the
// License.
//


/**
 * File containing the definition of AuthorizationRequestHandlerSpiAdapter class.
 */


namespace Authlete\Laravel\Handler\Spi;


/**
 * An empty implementation of the AuthorizationRequestHandlerSpi interface.
 *
 * @link \Authlete\Laravel\Handler\Spi\AuthorizationRequestHandlerSpi
 */
class AuthorizationRequestHandlerSpiAdapter extends UserClaimProviderAdapter
implements AuthorizationRequestHandlerSpi
{
    /**
     * {@inheritdoc}
     *
     * {@inheritdoc}
     */
    public function getUserAuthenticatedAt()
    {
        return 0;
    }


    /**
     * {@inheritdoc}
     *
     * {@inheritdoc}
     */
    public function getUserSubject()
    {
        return null;
    }


    /**
     * {@inheritdoc}
     *
     * {@inheritdoc}
     */
    public function getSub()
    {
        return null;
    }


    /**
     * {@inheritdoc}
     *
     * {@inheritdoc}
     */
    public function getAcr()
    {
        return null;
    }


    /**
     * {@inheritdoc}
     *
     * {@inheritdoc}
     */
    public function getProperties()
    {
        return null;
    }


    /**
     * {@inheritdoc}
     *
     * {@inheritdoc}
     */
    public function getScopes()
    {
        return null;
    }
}
?>
