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