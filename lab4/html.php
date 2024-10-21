<?php
class HTMLPage {
    public $title;

    public function __construct($title) {
        $this->title = $title;
    }

    public function header() {
        return <<<HTML
        <html>
            <head>
                <title>{$this->title}</title>
                <style>
                    body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
                    header { background-color: #f8f8f8; padding: 20px; display: flex; align-items: center; }
                    #logo { height: 50px; margin-right: 20px; }
                    footer { background-color: #f1f1f1; text-align: center; padding: 10px; position: fixed; bottom: 0; width: 100%; }
                    main { padding: 20px; margin-bottom: 60px; }
                </style>
            </head>
            <body>
                <header>
                    {$this->logo()}
                    <h1>{$this->title}</h1>
                </header>
                <a href='index.php'>Главное меню</a>
HTML;
    }

    public function footer() {
        return <<<HTML
                <footer>
                    <h2>&copy; Все права защищены 2024</h2>
                </footer>
            </body>
        </html>
HTML;
    }

    public function logo() {
        return <<<HTML
                <img id="logo" src="\img\Logo.jpg">
HTML;
    }

    public function menu($menu) {
        if (count($menu) != 0) {
            $menuHtml = "<nav><ul>" . implode('', $menu);
            $menuHtml .= "</ul></nav>";
            return $menuHtml;
        }
        return '';
    }

    public function content($content) {
        return $content;
    }

    public function write($content = '', $menu = []) {
        $html = $this->header();
        $html .= $this->menu($menu);
        $html .= $this->content($content);
        $html .= $this->footer();
        echo $html;
    }
}