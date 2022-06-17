<?php


namespace Lavdiu\DemoApp;


use Laf\UI\Container\Card;
use Laf\UI\Container\CardBody;
use Laf\UI\Container\CardHeader;
use Laf\UI\Container\ContainerType;
use Laf\UI\Container\Div;
use Laf\UI\Container\HtmlContainer;
use Laf\UI\Page\HeaderComponent;
use Laf\UI\Page\Html;
use Laf\Util\Settings;
use Laf\Util\Util;

class Factory
{
    /**
     * Generate a sample Html page
     * @return Html
     */
    public static function GeneralPage(): Html
    {
        $page = self::noMenuPage();
        $page->setMenu(RoutingTable::getCachedMenu());
        return $page;
    }

    /**
     * Generate a sample Html page
     * @return Html
     */
    public static function noMenuPage(): Html
    {
        $page = new Html();
        $page->addHeaderComponent(new HeaderComponent("script", ['type' => 'text/javascript', 'src' => './assets/dist/bundle.js']))
            ->addHeaderComponent(new HeaderComponent("link", ['rel' => 'stylesheet', 'href' => './assets/dist/main.css'], true))

            #->addHeaderComponent(new HeaderComponent("link", ['rel' => 'stylesheet', 'href' => 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css'], true))
            #->addHeaderComponent(new HeaderComponent("script", ['type' => 'text/javascript', 'src' => 'https://cdn.jsdelivr.net/npm/flatpickr']))

            ->setPageTitle(Settings::get('project.project_name'));

        $page->addHeaderComponent(new HeaderComponent("link", ['rel' => 'icon', 'href' => './icon.png'], true))
            ->addHeaderComponent(new HeaderComponent("link", ['rel' => 'shortcut icon', 'href' => './icon.png'], true))
            ->addHeaderComponent(new HeaderComponent("link", ['rel' => 'shortcut-icon', 'href' => './icon.png'], true))
            ->addHeaderComponent(new HeaderComponent("link", ['rel' => 'apple-touch-icon', 'href' => './icon.png'], true));
        return $page;
    }

    /**
     * @param string $title
     * @param string|null $message
     * @return string
     */
    public static function getFatalErrorMessageCard(\Throwable $e): string
    {
        ob_clean();
        $message = '<pre>' . $e->getMessage() . '</pre>';
        if (isDev()) {
            $message .= '<br /><pre>' . ($e->getTraceAsString()) . '</pre>';
        }
        $page = Factory::GeneralPage();
        $card = new Card();
        $card->addComponent((new CardHeader(['bg-danger text-white fw-bold']))->addComponent(new HtmlContainer("<b>Error!</b>")))
            ->addComponent((new CardBody())->addComponent(new HtmlContainer($message)))
            ->addCssClass('border-danger');
        $div = new Div();
        $div->addCssClass('p-2 container');
        $div->addComponent($card);
        $page->addComponent($div);
        return $page->draw();
    }
}