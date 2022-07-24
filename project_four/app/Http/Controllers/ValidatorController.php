<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidatorController extends Controller
{
    // Pattern for uri (slug)
    private static $uriPattern = '/^[A-Za-z0-9\-]+$/u';

    // Length of a string
    public static $strLength = 70;

    /**
     * Checks the uri part
     *
     * @param string $uri The part of uri
     * @return int 1 - if OK, otherwise - 0
     */
    public static function checkUriPart(string $uri): int
    {
        //$uri = mb_strtolower($uri); // Just in case..
        return preg_match(self::$uriPattern, trim($uri));
    }

    /**
     * Set a length of a string
     *
     * @param string $str A string
     * @param int $length Desired length of a string
     * @return string $newStr
     */
    public static function setStringLength(string $str, $length): string
    {
        // It works if '$str' < 45 characters
        if ( mb_strlen($str) < 45 ) {
            return $str;
        } else {
            $newStr = mb_substr($str, 0, $length);
            $newStr = mb_substr($newStr, 0, mb_strrpos($newStr, ' ')) . "...";
            return $newStr;
        }
    }

    /**
     * Count found articles and set 'text' as 'article' or 'articles'
     *
     * @param object $articles
     * @return array Example:
     *  $articlesAmount = [
     *    'count' => '10'      (amount of found articles)
     *    'text'  => 'article' (or 'articles')
     *  ];
     */
    public static function countArticles(object $articles): array
    {

        $articlesAmount['count'] = self::countItems($articles);

        ( $articlesAmount['count'] == 1 ) ?
        $articlesAmount['text'] = 'article' : $articlesAmount['text'] = 'articles';

        return $articlesAmount;
    }

    /**
     * Count array or 'Collection'
     *
     * @param array or 'Collection' $items
     * @return int amount of items if OK, otherwise abort(404)
     */
    public static function countItems($items)
    {
        if (! count($items)) {
            return abort(404);
        }

        return count($items);
    }

    /**
     * Convert author's name
     *
     * @param string author's name ('Jone Dow')
     * @return string author's name for uri ('jone-dow')
     */
    public static function convertAuthorName(string $author): string
    {
        return str_replace(' ', '-', strtolower($author));
    }
}
