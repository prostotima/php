<?php

use Classes\AboutMeController;
<title><?= $title ?></title>


$data = AboutMeController::show();

echo $viewer->render('aboutme', $data);

namespace Classes;

/**
 * Class AboutMeController
 *
 * Контролер для сторінки "About Me".
 * Передає дані в шаблон aboutme.latte
 */
class AboutMeController
{
    /**
     * Повертає масив даних для шаблону
     *
     * @return array
     */
    public static function show(): array
    {
        return [
            'title' => 'About Me',
            'name' => 'Tima',
            'skills' => ['PHP', 'JS', 'MySQL', 'Git'],
            'hobby' => 'Створення сайтів та програм'
        ];
    }
}
