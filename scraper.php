<?
// This is a template for a PHP scraper on morph.io (https://morph.io)
// including some code snippets below that you should find helpful
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';

for($page = 0; $page < 12768; $page+=16)
{
 $link = 'https://alumni.iba.edu.pk/alumni/findclassmate/a/'.$page;
$html = file_get_html($link);
//
// // Find something on the page using css selectors
if($html)
{
  foreach($html->find("/html/body/div/div[2]/div[1]/div/div[2]/div[2]/div") as $element)
  {
    $name  = $element->find("div/strong",0)->plaintext;
  if($name  != "" || $name  != null) {
    $record = array( 'name' =>$name, 'link' => $link);
           scraperwiki::save(array('name','link'), $record); 
  }
  }
}

}
//
// // Read in a page
// $html = scraperwiki::scrape("http://foo.com");
//
// // Find something on the page using css selectors
// $dom = new simple_html_dom();
// $dom->load($html);
// print_r($dom->find("table.list"));
//
// // Write out to the sqlite database using scraperwiki library
// scraperwiki::save_sqlite(array('name'), array('name' => 'susan', 'occupation' => 'software developer'));
//
// // An arbitrary query against the database
// scraperwiki::select("* from data where 'name'='peter'")
// You don't have to do things with the ScraperWiki library.
// You can use whatever libraries you want: https://morph.io/documentation/php
// All that matters is that your final data is written to an SQLite database
// called "data.sqlite" in the current working directory which has at least a table
// called "data".
?>
