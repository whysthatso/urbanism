urbanism
========

CMS and site for urban.ee



## What is this?

This is a basic CMS and website for the online magazine U (www.urban.ee).

The back-end of this site allows the basic creation of articles in a bi-lingual (Estonian/English) environment with attachments in PDF format for each individual article, and the issue as a whole.

## What's it about?

urban.ee is written in PHP using the fuel framework. 

#### Details

Image carousels can be embedded into the rich-text editor where desired through a quick-and-dirty format which is not quick, but definitely dirty. Attach the images (which much be manually sized right now) below the article, number them with the sortorder field, and then add the following text in the rich-text-editor where you want the carousel:
    
    **CAROUSEL[1-6]**

For example, this would use images 1 through 6 in a carousel. The carousel defaults to a standard size which can be overridden by specifying the resolution, for example:
    
    **CAROUSEL[340x500]**

would use ALL of the attached images at a 340x500 resolution. Likewuse:
    
    **CAROUSEL[2-7,340x500]**

will use images 2-7 in a carousel at that resolution.


### What would make it better?

* A new 1200px-wide, responsive layout
* Something like Imagemagick on the back-end to automatically resize the images
* Something to better deal with sidenotes/footnotes (currently an ugly kludge in the ckeditor)

#### Credits
[Lewis McGuffie](http://lewisdoesdesign.com/) did the visual design for this and Andra Aaloe was projet coordinator for the initial launch of the site in December 2012.
