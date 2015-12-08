<?php

/*
 * For my project, I decided to create a blog that's dedicated to writing about Korean and Japanese Dramas and Movies.
 * The blog has a login page where admin (username: admin; password: password) or guest bloggers can log in (username: blogger; password: iwrite).
 * 
 * Visitors can comment on the different posts and mark other comments as spam. If the comments are marked as spam, it sends an email to the admin
 * that shows the author and comment body. Visitors can also submit a simple form that will be sent to the admin with basic information if they are
 * interested in becoming a guest blogger.
 * 
 * Guest bloggers are allowed to post new entries. To do so, they just log in and they'll be sent to a page that shows all the entries across all pages.
 * If they scroll to the bottom, they can submit a new entry. The entry involves submiting an image, 4 ratings, the series title, a summary of the series
 * and their opinion on why they like the series. Depending on what option they choose, the information will be added to the designated file (for example, if
 * they're writing about a Japanese film, that entry will be added to the japfilms.txt file and can be seen if people go to the Japanese page).
 * Because of the way the functions work, if someone wants to post a new entry, all the information is required ()
 * 
 *  The admin can delete or add new entries (they'll be taken to their own page which is similar to the guest blogger page except all the entries have a 
 * hidden input that allows for deletion). Also, they can go to both the Japanese and Korean pages and delete all comments. 
 * 
 *
 */
 
require_once("common.php");
$title = "Cath's Musings - Home";
if($_SERVER["REQUEST_METHOD"] == "GET")
{
			require_once("header.php");
}

?>

		<h1>Welcome!</h1>
			<p>First of all, thank you for visiting my blog! This blog is mainly a way for me to write about the Asian dramas and movies that I really enjoyed and a way for me provide some recommendations for those who are interested in a new
				series to watch or a to get started on a series.<br><br>
			If you are a guest blogger, please feel free to log in!
			</p>
		<h2>Latest Updates</h2>
			<p><strong>12/7/15:</strong> Blog Launch!
			</p>
		<h2>Coming Soon</h2>
			<p><strong>What can you expect to see in the future?</strong><br></p>
			<dl>
				<dt>Taiwanese Media</dt>
				<dd>I really got my start watching dramas through Taiwanese dramas, so I can't neglect those. You can expect to see a page for them added in the near future!</dd>
				<dt>Glossary</dt>
				<dd>There's a host of basic Korean, Japanese, and Taiwanese words that I've picked up simply from watching dramas that don't have a nice and direct translation into English.
				I'd like to include a page for them as well in the future, since you all may be as curious about the meaning of those words you're hearing as I was.</dd>
				<dt>More Entries!</dt>
				<dd>Since this is a compelation of my favorite shows and movies, I will pretty much keep on adding something new that I enjoyed. Please consider these lists
				as incomplete because there's always something new and good to watch!</dd>
			</dl>
		<a href="#top">Back to Top</a>
<?php

require_once("footer.php");