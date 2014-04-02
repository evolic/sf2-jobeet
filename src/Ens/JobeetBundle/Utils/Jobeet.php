<?php
namespace Ens\JobeetBundle\Utils;

class Jobeet
{
    static public function slugify($text)
    {
        return self::urlize($text);
    }

    /**
     * Convert any passed string to a url friendly string. Converts 'My first blog post' to 'my-first-blog-post'
     *
     * @param  string $text  Text to urlize
     * @return string $text  Urlized text
     */
    public static function urlize($text)
    {
        // Remove all non url friendly characters with the unaccent function
        $text = self::unaccent($text);

        if (function_exists('mb_strtolower'))
        {
            $text = mb_strtolower($text);
        } else {
            $text = strtolower($text);
        }

        // Remove all none word characters
        $text = preg_replace('/\W/', ' ', $text);

        // More stripping. Replace spaces with dashes
        $text = strtolower(
            preg_replace('/[^A-Z^a-z^0-9^\/]+/', '-',
                preg_replace('/([a-z\d])([A-Z])/', '\1_\2',
                    preg_replace('/([A-Z]+)([A-Z][a-z])/', '\1_\2',
                        preg_replace('/::/', '/', $text))))
        );

        return trim($text, '-');
    }
}