<?php

namespace Symplefony;

class View
{
    public const string VIEW_PATH = APP_PATH . 'views' . DS;
    public const string COMMON_PATH = self::VIEW_PATH . '_common' . DS;

    private string $name;
    private bool $is_complete;

    public static function renderError(int $code): void
    {
        http_response_code($code);

        $is_complete = $code !== 404;
        $data = [];

        if (!$is_complete) {
            $data['title'] = 'Page inexistante - Autodingo.com';
        }

        $view = new self('_errors:' . $code, $is_complete);
        $view->render($data);
    }

    /**
     * Constructeur
     * @param string $name Nom de la vue (construction représentant le chemin du fichier)
     * @return View Instance
     */
    public function __construct(string $name = '', bool $is_complete = false)
    {
        $this->name = $name;
        $this->is_complete = $is_complete;
    }

    public function render(array $view_data = []): void
    {
        // Transforme le tableau associatif en liste de variables nommées comme les clés
        extract($view_data);

        if (!isset($title)) {
            $title = "TITRE PAR DEFAULT";
        }

        // Démarrage du cache de réponse
        ob_start();

        if (!$this->is_complete) {
            require_once self::COMMON_PATH . 'top.phtml';
        }

        require_once $this->getTemplatePath();

        if (!$this->is_complete) {
            require_once self::COMMON_PATH . 'bottom.phtml';
        }

        // Libération du cache de réponse
        ob_end_flush();
    }

    private function getTemplatePath(): string
    {
        return self::VIEW_PATH . str_replace(':', DS, $this->name) . '.phtml';

        //return self::VIEW_PATH . implode(DS, explode( ':', $path )) . '.phtml';

    }
}
