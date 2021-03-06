## Day 21 (and 22)

### Implementing the project to a local Wordpress environment

Set up a local XAMPP server for PHP and Wordpress to start the implementation process. Currently I am turning the made project into a custom theme for wordpress.

## Day 23

### Fixed broken spots in SASS, JS, webpack.config.js and wordpress files

Fixed a missed class change in accordion related JS files (active class for opening the accordion panel). Fixed webpack compiling, so running ***npm run build*** will compile bundle.js and main.css respectively and CSS is not mixed into bundle.js anymore.

## Day 24

### Created custom post type (and unfinished taxonomy)

Currently trying to make accordion content modifiable in the wordpress environment. Created Events custom post type and started on custom taxonomies.

## Day 25

### Created meta fields and started making accordion creation loop

Meta fields for the front page can be edited, to display written text. If cover does not have enough text, then cover squeezes into itself and breaks the CSS a little bit.
Started accordion creation loop (unfinished). Idea is to create an accordion for every wanted "event theme", then create labels into that accordion with given parent category in "Events".

Meta fields in wordpress
![Meta fields in wordpress](https://i.imgur.com/ZFCLR9m.png)

Front page meta fields showcase  
https://user-images.githubusercontent.com/73487474/118296504-b90bc980-b4e5-11eb-9b17-636565e3541b.mp4

## Day 26

### Image custom meta field, next_theme button and accordion per page limiter

Added a custom meta field for images in custom post type Events. Images can be added in the meta field, where you write a title and a paragraph for the according event.
Next_theme button is now given to all accordions, except the last (like it should be).
Accordion per page can now be set in Wordpress environment under the front page. Only published posts are counted, but currently there is no way to specify, which event blocks to display.

## Day 27

### Fixed CSS and next_theme button generation bugs

Fixed text for labels inside accordion to not have an empty space when no image is present for the event. Also made it retain its length towards the right side of the label.
Next_theme button is now generated properly. Before it created it for the last theme, when accordions per page was set to a higher number than the amount of currently published and displayable posts.

## Day 28

### Changed PHP/CSS, added ACF plugin to theme and added git ignore

Added category listing to editor, fixed accordion heading CSS, git ignore for node_module, PHP structure adjustments, custom meta fields now save locally and advanced custom meta fields is added to the theme.

## Day 29

### Fixed broken spots in CSS and re-wrote code structure

Added some broken CSS spots that had gone out of place in progress. Started thinking about a function to let the user select which posts to show. For example, when there are 6 total categories published and accordions per page is set to 3, then the user can choose which 3 of the 6 are shown.

## Day 30

### Tried to make Event categories sortable with a new column

Added a column to the custom taxonomy Categories. The button is not yet clickable and sorts in a weird way.
Edit: The button is now clickable and sorts in a weird way. Still need to apply it to the accordion generator.

## Day 31

### Made an archive page for all accordions

Put a pause for the Event category sorting until a solution is made. Made accordion archive page. Unfinished link for accordion archive page (CSS wise).

## Day 32

### Single page for accordion events

Need to add CSS to the anchors inside accordions and fit single-custom_event.php with proper content.

## Day 33

### Single and archive page CSS/structure

Archive page can be accessed with a link in front page, under the accordion.
Anchor tags inside accordions have anchord red coloring and can be clicked to view the event's single page. Single event page has the same meta fields as the front page to avoid having to give every single event the same text. Accordion archive page still has it's own meta fields.

Single event comparison
![Single event comparison](https://i.imgur.com/wzn5uvH.png)

## Day 34

### Archive page fixes and cover/accordion CSS adjustments

Goto accordion image and anchor will not be displayed on single event pages, because no accordions are present. 
Added hover CSS to single events inside accordions.
Added a WHILE that had nothing inside before wp_footer() inside archive-custom_event.php to help the archive page get it's proper meta fields.

## Day 35

### Created event_archive() function for archive page IDs and is_check

Multiple places used the archive page's id, so it was turned into a function. Archive page for some reason uses random post data from one of the events. To counter that, there are 2 magical lines in archive-custom_event.php, one for header and one for footer. Footer is necessary for footer meta fields, header is currently modified to already us archive page IDs. Both magic lines are to be temporary until a proper solution is found.

## Day 36

### Links to other pages in every page, CSS adjustments, admin meta field positioning

Single event and archive page now link to the front page. Single event page cover background is no longer cut at the bottom. Made the link position to left instead of right. Separated modal meta field from footer in admin panel; moved longer text fields into the block editor from the right side panel.

## Day 37

### Setup for adding accordions with AJAX

Made a button for front page that is supposed to add accordions, unfinished.

## Day 38

### Added accordions can't be clicked, adds in a random order

When initially displayed, the order of the accordions seems to be accordingly to how they are displayed in the custom post type taxonomy table. When added with ajax, the order of accordions is taken from the custom post type table.

## Day 39

### Function get_ajax_posts progress update

This function is currently work-in-progress.
Adds the remaining 2 accordions from 5, still un-openable and can be added infinitely.

## Day 40

### Function get_ajax_posts adds remaining posts

Plan was to make Event category taxonomy paged, but only posts can be made paged, currently made to only display the ones that are not displayed from all.
* Event category query re-worked to WP_Terms_Query.
* Added if statements to alot of JS files to avoid getting error spams in the console due to all sites using bundle.js, which has consts that are not available in certain sites (eg. single CPT page).
* Added event listeners and if statements to JS files: nextTheme, accordion and checkboxes.
* Next_theme button re-work after adding accordions needs to be made.

## Day 41

### Made next_theme buddon re-work on new accordion page load

Didn't have enough time to figure out how I could include accordion.js in the ajax request to run the button re-work function from that file and not have the long vanilla function in ajax jQuery file.

## Day 42

### Removed previous unused lines

* Removed unused and commented code lines.
* Accordions close when adding extra accordions to the page. Currently prints error in console if no accordions are open upon adding accordions.

## Day 43

### Last Day

My project ended in the middle of the week, because this is my last week and it's time to start working on my documents. I learned a lot during the process and even more about working on Wordpress by code and the theme process. Webpack was new to me and seemed like a nice feature that I would see myself using more of. Experienced a bit of Node.js, but need to spend more time with it. Got the chance to play with PHP, which is a weaker side of mine currently. I feel more brave when working with Javascript, but I need more practice with more difficult exercises.