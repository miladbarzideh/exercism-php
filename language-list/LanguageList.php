<?php

function language_list(...$languages)
{
    return $languages;
}

function add_to_language_list($language_list, $new_item)
{
    $language_list[] = $new_item;
    return $language_list;
}

function prune_language_list($language_list)
{
    return array_slice($language_list, 1); //array_shift($language_list)
}

function current_language($language_list)
{
    return $language_list[0];
}

function language_list_length($language_list)
{
    return count($language_list);
}
