$.getJSON("https://api.twitter.com/1/statuses/user_timeline/vincentmilliken.json?count=1&include_rts=1&callback=?", function(data) {
     $("#twitter").html(data[0].text);
});