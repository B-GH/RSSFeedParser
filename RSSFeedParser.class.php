<?php

/**
 * Class RSSFeedParser
 * PHP class to parse RSS feeds.
 *
 * @author Badr EL Ghailani
 */
class RSSFeedParser
{
    /**
     * doc.
     *
     * @var DOMDocument
     */
    protected $doc = false;

    /**
     * items.
     *
     * @var array
     */
    protected $items = [];

    /**
     * channel.
     *
     * @var DOMNode
     */
    protected $channel = null;

    /**
     * RSSFeedParser Constructor.
     */
    public function __construct()
    {
        $this->doc = new DOMDocument();
    }

    /**
     * Load XML from a file.
     *
     * @param string $url
     *
     * @return RSSFeedParser
     */
    public function load($url)
    {
        $this->doc->load($url);

        return $this;
    }

    /**
     * getItems.
     *
     * @param bool|false $asArray, if true then parse items to array
     *
     * @return array items
     */
    public function getItems($asArray = false)
    {
        // if not empty items.
        if ($this->doc && empty($this->items)) {
            // gzt chanel.
            $this->getChannel();

            // return array items.
            return $this->parseItems($asArray);
        }

        // return items.
        return $this->items;
    }

    /**
     * Searches channel element.
     *
     * @return DOMNode
     */
    protected function getChannel()
    {
        $this->channel = $this->doc->getElementsByTagName('channel')->item(0);

        return $this;
    }

    /**
     * parseItems.
     *
     * @param bool|false $asArray, if true then parse items to array
     *
     * @return array with instances of RSSFeedItem
     */
    protected function parseItems($asArray)
    {
        // if channel not null
        if (!is_null($this->channel)) {

        // parse items, and build items array.
        foreach ($this->channel->getElementsByTagName('item') as $domItem) {
            $this->items[] = $this->parseItem($domItem, $asArray);
        }
        }

        // return items.
        return $this->items;
    }

    /**
     * Parses an item.
     *
     * @param DOMNode    $item
     * @param bool|false $asArray, if true then parse item to array
     *
     * @return RSSFeedItem
     */
    protected function parseItem(DOMNode $item, $asArray)
    {
        // @var object $newsItem
        $RSSFeedItem = new RSSFeedItem();

        // set news title
        if (isset($item->getElementsByTagName('title')->item(0)->firstChild->data)) {
            $RSSFeedItem->setTitle($item->getElementsByTagName('title')->item(0)->firstChild->data);
        }

        // set news link
        if (isset($item->getElementsByTagName('link')->item(0)->firstChild->data)) {
            $RSSFeedItem->setLink($item->getElementsByTagName('link')->item(0)->firstChild->data);
        }

        // set news description
        if (isset($item->getElementsByTagName('description')->item(0)->firstChild->data)) {
            $RSSFeedItem->setDescription($item->getElementsByTagName('description')->item(0)->firstChild->data);
        }

        // return news item, parse to array if $asArray is true.
        return $asArray ? $RSSFeedItem->toArray() : $RSSFeedItem;
    }
}
