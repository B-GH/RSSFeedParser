<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>RSSFeedParser Example</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>

<body>

<!-- Page Content -->
<div class="container">

    <div class="page-header">
        <h1><small>RSSFeedParser Example</small></h1>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h2><small>Example: News feeds from the BBC</small></h2>
<pre>
<code>
    &lt;?php
        // Include classes
        include('RSSFeedItem.class.php');
        include('RSSFeedParser.class.php');

        // Load RSS Feed
        $rss = new RSSFeedParser();
        $rss->load('http://feeds.bbci.co.uk/news/world/rss.xml');

        // Parse
        foreach($rss->getItems() as $item) {
            echo '&lt;a href="' . $item->getLink() . '"&gt;';
            echo '    &lt;h4&gt;' . $item->getTitle() . '&lt;/h4&gt;';
            echo '    &lt;p&gt;' . $item->getDescription() . '&lt;/p&gt;';
            echo '&lt;/a&gt;';
        }

    ?&gt;
</code>
</pre>
        </div>

        <div class="col-lg-6">
            <h2><small>Result :</small></h2>
            <div class="list-group">
                </a>
                <?php
                    include 'RSSFeedItem.class.php';
                    include 'RSSFeedParser.class.php';

                    $rss = new RSSFeedParser();

                    $rss->load('http://feeds.bbci.co.uk/news/world/rss.xml');

                    $items = $rss->getItems();
                    foreach ($items as $item) {
                        echo '<a href="'.$item->getLink().'" class="list-group-item">';
                        echo '    <h4 class="list-group-item-heading">'.$item->getTitle().'</h4>';
                        echo '    <p class="list-group-item-text">'.$item->getDescription().'</p>';
                        echo '</a>';
                    }
                ?>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <hr>
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>created by <a href="https://github.com/B-GH">BGH-CODE</a></p>
            </div>
        </div>
    </footer>

</div>
</body>

</html>
