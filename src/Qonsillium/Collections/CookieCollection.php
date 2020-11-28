<?php 

namespace Qonsillium\Collections;

class CookieCollection extends Collection
{
    /**
     * Create new cookie collection and append in units collection
     * list 
     * @param string $cookieName 
     * @param string $cookieValues
     * @return bool
     */ 
    public function attachCookieCollection(string $cookieName, array $cookieValues)
    {
        setcookie(
            $cookieName, 
            $cookieValues['value'], 
            time() + $cookieValues['expire'],
            $cookieValues['path'],
            $cookieValues['domain'],
            $cookieValues['secure'],
            $cookieValues['httponly']
        );

        $this->collectionList->addCollectionUnit(
            new CollectionUnit($cookieName, $cookieValues)
        );

        return true;
    }

    /**
     * Remove cookie collection from list and unset 
     * cookie making it expired
     * @param string $cookieName
     * @return bool 
     */ 
    public function detachCookieCollection(string $cookieName)
    {
        setcookie($cookieName, '', time() - 3600);
        $this->collectionList->removeCollectionUnit($cookieName);

        return true;
    }
}
