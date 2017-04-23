<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Simple Mockups</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://unpkg.com/react@latest/dist/react.js"></script>
    <script src="https://unpkg.com/react-dom@latest/dist/react-dom.js"></script>
    <script src="https://unpkg.com/babel-standalone@latest/babel.min.js"></script>
    <style>

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .sm--header {
            width: 100%;
            padding: 15px;
            background: rgba(0, 0, 0, .1);
            font-size: 1em;
            line-height: 1;
        }

        .sm--header h1 {
            line-height: inherit;
            font-size: inherit;
            margin: 0;
            float: left;
        }

        .sm--header__toc {
            line-height: inherit;
            font-size: inherit;
            float: right;
        }

        #app {
            flex: 1;
            width: 100%;
            display: flex;
        }

        .sm--app {
            flex: 1;
            width: 100%;
            display: flex;
            flex-direction: column;
            /*justify-content: center;
            align-items: center;*/
            padding: 0 15px;
        }

        .sm--app__main-wrap {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .sm--breadcrumb {
            padding: 15px 0;
            background: none;
            font-size: .9em;
            line-height: 1;
        }

        .sm--main {
            width: 100%;
            margin-bottom: 5em;
        }

        .sm--footer {
            padding: 15px;
            font-size: .9em;
            width: 100%;
            background: rgba(0,0,0,.05);
        }

        .sm--section {
            /*margin-bottom: 5rem;*/
            border: 1px solid rgba(0,0,0,.1);
            border-radius: 5px;
            width: 100%;
            max-width: 640px;
            margin: 0 auto;
        }

        .sm--section__header {
            background: rgba(0,0,0,.05);
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            padding: 15px;
        }

        .sm--section__header-left {
            float: left;
            line-height: 1;
            padding-right: 15px;
        }


        .sm--section__header-right {
            float: right;
            line-height: 1;
            padding-left: 15px;
        }

        .sm--section__header h1 {
            line-height: 1;
            font-size: 1em;
            margin: 0;
            text-align: left;
            font-weight: bold;
        }

        .sm--section__main {
            padding: 15px;
            min-height: 250px;
        }

        .sm--section__footer {
            padding: 15px;
            border-top: 1px solid rgba(0,0,0,.1);
            text-align: center;
        }

        li {
            margin-top: .3em;
        }

    </style>
    <script>
        var screens = {};
        var toc = {toc: 'Table of contents'};
    </script>
</head>
<body>
    <div class="sm--header clearfix">
        <h1>Simple Mockups Demo (React)</h1>
        <a href="#toc" class="sm--header__toc">TOC</a>
    </div>

    <?php
        $dir = realpath('./screens/');
        $it = new RegexIterator(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir)), '/.+\.php$/i');
        $lastMod = 0;
        foreach ($it as $f) {
            $lastMod = max($lastMod, filemtime($f));
            _renderSection($f, $dir);
        }
    ?>

    <div id="app"></div>

    <footer class="sm--footer">
        <span style="float: right">
            Content last updated: <?php echo date('Y-m-d', $lastMod); ?>
        </span>
    </footer>

<script type="text/babel">
    <?php echo file_get_contents('./app.js'); ?>

    let app = ReactDOM.render(
        <App screens={screens} screen={window.location.hash.substr(1)}/>,
        document.getElementById('app')
    );

    window.onhashchange = () => app.setActiveScreen(window.location.hash.substr(1));

</script>


</body>
</html>

<?php


// local helper to isolate include scope
function _renderSection($f, $baseDir) {
    $id = substr($f, strlen($baseDir) + 1, -4); // strip base and extension

    $parentId = dirname($id);
    $parentId = ($parentId == '.') ? 'index' : strtr($parentId, DIRECTORY_SEPARATOR, "_"); // replace slash for "_"

    $depth = substr_count($id, DIRECTORY_SEPARATOR);
    $id = strtr($id, DIRECTORY_SEPARATOR, "_"); // replace slash for "_"

    echo "\n\n<!-- BEGIN: $id -->\n";
    echo "<script>toc['$id'] = {title: null, depth: $depth, parentId: '$parentId'}</script>\n";
        include $f;
    echo "<!-- END: $id -->\n\n";

}
