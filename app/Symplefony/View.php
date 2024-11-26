<?php

namespace Symplefony;

class View
{
    public const string VIEW_PATH = APP_PATH . 'views' . DS;
    public const string COMMON_PATH = self::VIEW_PATH . '_common' . DS;

    private string $name;

    /**
     * Constructeur
     * @param string $name Nom de la vue (construction représentant le chemin du fichier)
     * @return View Instance
     */
    public function __construct( string $name = '' )
    {
        $this->name = $name;
    }

    public function render( ): void
    {
        require_once self::COMMON_PATH . 'top.phtml';

        require_once $this->getTemplatePath();

        require_once self::COMMON_PATH . 'bottom.phtml';
    }

    private function getTemplatePath(): string
    {
        return self::VIEW_PATH . str_replace( ':', DS, $this->name ) . '.phtml';

        //return self::VIEW_PATH . implode(DS, explode( ':', $path )) . '.phtml';

    }
}