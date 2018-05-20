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
 * File containing the definition of DefaultUserClaimProvider class.
 */


namespace Authlete\Laravel\Handler\Spi;


use App\User;
use Authlete\Types\StandardClaims;
use Authlete\Util\ValidationUtility;


/**
 * An implementation of the UserClaimProvider interface
 * that uses Laravel's standard authentication mechanism.
 *
 * @link \Authlete\Laravel\Handler\Spi\UserClaimProvider
 */
class DefaultUserClaimProvider implements UserClaimProvider
{
    private $user = null;  // \App\User


    /**
     * Constructor.
     *
     * @param User $user
     *     The user. May be null.
     */
    public function __construct(User $user = null)
    {
        ValidationUtility::ensureNullOrType('$user', $user, '\App\User');

        $this->user = $user;
    }


    /**
     * {@inheritdoc}
     *
     * {@inheritdoc}
     *
     * @param string $subject
     *     {@inheritdoc}
     *
     * @param string $claimName
     *     {@inheritdoc}
     *
     * @param string $languageTag
     *     {@inheritdoc}
     */
    public function getUserClaimValue($subject, $claimName, $languageTag)
    {
        switch ($claimName)
        {
            case StandardClaims::EMAIL_VERIFIED:
            case StandardClaims::PHONE_NUMBER_VERIFIED:
                return false;

            case StandardClaims::UPDATED_AT:
                return 0;

            default:
                break;
        }

        if (is_null($this->user))
        {
            return null;
        }

        switch ($claimName)
        {
            case StandardClaims::SUB:
                return $subject;

            case StandardClaims::NAME:
                return $this->user->name;

            case StandardClaims::EMAIL:
                return $this->user->email;

            default:
                return null;
        }
    }
}
?>