/*-----------------------------------------------------------------------
*	Object Define Scirpt for WordPress Theme EHP2
*	Project Name:		EHP2
*	Created:			Gary Sun	2014-07-10
*	Last Edited:		Gary Sun	2014-07-28
-----------------------------------------------------------------------*/

function ehpLinkTab(icon, title){
    this.icon = icon;
    this.title = title;
}

function ehpLink(icon, title, description, link){
    this.icon = icon;
    this.title = title;
    this.description = description;
    this.link = link;
}

function ehpTopVideo(title, link, date, author){
    this.title = title;
    this.link = link;
    this.date = date;
    this.author = author;
}