<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>

</head>

<body>
<script>
/*
 * Retrieve top 10 page titles, URLs and number of pageviews of each
 */

// Create the analytics service object
var analyticsService =
    new google.gdata.analytics.AnalyticsService('iSample_dataVisits_v1.0');

// The feed URI that is used for retrieving the analytics data
var feedUri = 'https://www.google.com/analytics/feeds/data' +
    '?start-date=2009-01-01' +
    '&end-date=2009-01-31' +
    '&dimensions=ga:pageTitle,ga:pagePath' +
    '&metrics=ga:pageviews' +
    '&sort=-ga:pageviews' +
    '&max-results=10' +
    '&ids=ga:13187223';

// callback method to be invoked when getDataFeed() returns data
var callback = function(result) {

  // An array of analytics feed entries
  var entries = result.feed.entry;

  // create an HTML Table using an array of elements
  var outputTable = ['<table>'];
  outputTable.push('<tr><th>Page Title</th><th>Page Path</th><th>Pageviews</th></tr>');

  // Iterate through the feed entries and add the data as table rows
  for (var i = 0; i < entries.length; i++) {
    var entry = entries[i];

    // add a row in the HTML Table array
    var row = [
      entry.getValueOf('ga:pageTitle'),
      entry.getValueOf('ga:pagePath'),
      entry.getValueOf('ga:pageviews')
    ].join('</td><td>');
    outputTable.push('<tr><td>', row, '</td></tr>'); 
  }
  outputTable.push('</table>'); 

  // print the generated table 
  PRINT(outputTable.join(''));
}

// Error handler
var handleError = function(error) {
  PRINT(error);
}

// Submit the request using the analytics service object
analyticsService.getDataFeed(feedUri, callback, handleError);

</script>
</body>
</html>
