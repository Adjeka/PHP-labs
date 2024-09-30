<?php
function readArticleFromFile($filepath) {
    $content = file($filepath);
    $title = trim($content[0]);
    return ['title' => $title, 'text' => array_slice($content, 1)];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'];
    $date = str_replace(" ", "", $_POST["date"]);

    $filteredArticles = [];

    if (is_dir($date))
    {
        $files = new DirectoryIterator($date);
        foreach ($files as $file)
        {
            if ($file->isFile() && mb_strpos($file->getFilename(), $category) !== false)
            {
                $article = readArticleFromFile($file->getRealPath());
                $filteredArticles[] = $article;
            }
        }
    }

    usort($filteredArticles, function($a, $b) {
        return strcmp($a['title'], $b['title']);
    });
    
    echo "<h2>Результаты поиска:</h2>";
    if (count($filteredArticles) > 0) {
        foreach ($filteredArticles as $article) {
            echo "<h3>" . $article['title'] . "</h3>";
            foreach ($article['text'] as $p) {
                if ($p !== "") {
                    echo "<p>" . $p . "</p>";  
                }
            }
        }
    }
    else {
        echo "<p>Найдено 0 статей</p>";
    }
}
?>