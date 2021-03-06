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
 * File containing the definition of DefaultTokenRequestHandlerSpi class.
 */


namespace Authlete\Laravel\Handler\Spi;


use Authlete\Laravel\Util\UserUtility;


/**
 * An implementation of the TokenRequestHandlerSpi interface
 * that uses Laravel's standard authentication mechanism.
 */
class DefaultTokenRequestHandlerSpi implements TokenRequestHandlerSpi
{
    /**
     * {@inheritdoc}
     *
     * {@inheritdoc}
     *
     * @param string $username
     *     {@inheritdoc}
     *
     * @param string $password
     *     {@inheritdoc}
     */
    public function authenticateUser($username, $password)
    {
        // The database column for unique user identifiers.
        $field = $this->username();

        // Look up the user who has the credentials.
        $user = UserUtility::findUserByCredentials($username, $password, $field);

        // Return the subject (= unique identifier) of the user.
        // When $user is null, getUserSubject() returns null.
        return UserUtility::getUserSubject($user);
    }


    /**
     * Get the database column for unique user identifiers.
     *
     * The default implementation of this method returns `'email'`.
     *
     * @return string
     *     The detabase column for unique user identifiers.
     */
    protected function username()
    {
        return 'email';
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
}
?>
