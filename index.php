<?php
mb_internal_encoding('UTF-8');


function NoobParser(string $url, string $htmlElement, string $condition)
{
    $content = file_get_contents($url);
    $content = mb_convert_encoding($content, 'HTML-ENTITIES', 'utf-8');

    $dom = new DOMDocument();
    $dom->loadHTML($content);
    $node = $dom->getElementsByTagName($htmlElement);

    for ($i = 0; $i < $node->length; $i++)
    {
        $list[] = mb_strstr($node->item($i)->textContent, '.', true);
    }

    foreach ($list as $listItem)
    {
        if ($listItem != "" && mb_stristr($listItem, $condition) != false)
        {
            $normalList[] = $listItem . ". \n";
        }
    }

    $file = "text.txt";
    file_put_contents($file, $normalList);
}

NoobParser('https://nukadeti.ru/poslovicy/pro-druzhbu', 'li', 'не ');





