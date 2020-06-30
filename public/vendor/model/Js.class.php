<?php

/**
 * Created by MyCode
 * User: KEVEN
 * Date: 01/06/2020
 * Time: 13:20
 **/

class Js
{

    /** Comprimir js **/
    public function minifyJS($str)
    {

        return preg_replace(

            array(

                '!/\*.*?\*/!s',
                "/\n\s+/",
                "/\n(\s*\n)+/",
                "!\n//.*?\n!s",
                "/\n\}(.+?)\n/",
                "/;\n/"

            ), array(

                '',
                "\n",
                "\n",
                "\n",
                "}\\1\n",
                ';'

            ), $str);
    }

}
