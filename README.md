<a href="https://styleci.io/repos/52954584"><img src="https://styleci.io/repos/52954584/shield?branch=master" alt="StyleCI"></a>

## RSSFeedParser

Simple PHP library to parse RSS feeds.

<br />
Simple example!
```php
<?php
    // Include classes
    include('RSSFeedItem.class.php');
    include('RSSFeedParser.class.php');

    // Load RSS Feed
    $rss = new RSSFeedParser();
    $rss->load('http://feeds.bbci.co.uk/news/world/rss.xml');

    // Parse
    $items = $rss->getItems();
    foreach($items as $item) {
        echo '<a href="' . $item->getLink() . '">';
        echo '    <h4>' . $item->getTitle() . '</h4>';
        echo '    <p>' . $item->getDescription() . '</p>';
        echo '</a>';
    }
?>
```

<br />
Example by rendering array of items:
```php
<?php
    // Include classes
    include('RSSFeedItem.class.php');
    include('RSSFeedParser.class.php');

    // Load RSS Feed
    $rss = new RSSFeedParser();
    $rss->load('http://feeds.bbci.co.uk/news/world/rss.xml');

    // Parse
    $items = $rss->getItems(true);
    foreach($items as $item) {
        echo '<a href="' . $item["link"] . '">';
        echo '    <h4>' . $item["title"] . '</h4>';
        echo '    <p>' . $item["description"] . '</p>';
        echo '</a>';
    }
?>
```

