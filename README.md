# Source code of [duncanm.dev](https://duncanm.dev)

This repo contains the source code of my personal website, running on [Laravel](https://laravel.com). 

The site's not done yet. In fact, it'll probably never be done. Although, when it's actually live I'll create a write-up of building this site.

## Roadmap

* [ ] S3 Media uploads
* [ ] Change when post is published
* [ ] add errors to crud update screens
* [ ] Fix image proxy issues for S3 through Github Markdown
* [ ] Fix script parsing issues
* [ ] Webmentions
I am sharing the steps I did and let's see if others can confirm.

Resolved S3 Media uploads
Default Test
Using default config

 'media' => [
     'disk'   => 's3',
     'folder' => 'media',
     'path'   => 'https://s3.amazonaws.com/media',
 ],
Upload a file from the backend's Media Manager

Result as expected the path is correct to the media folder - Live Link

Note: the uploaded object didn't have any permissions at all, I had to manually set Public Read

Second Test
Removed the media and added a slash to point to the root

 'media' => [
     'disk'   => 's3',
     'folder' => '/',
     'path'   => 'https://s3.amazonaws.com/',
 ],
Upload a file from the backend's Media Manager - No prob

File is uploaded to the bucket's root folder but the link is broken missing slash & the file name is in lower case it should be Koala.jpg - Live Link

test2

Third Test
Removed the slash from folder

 'media' => [
     'disk'   => 's3',
     'folder' => '',
     'path'   => 'https://s3.amazonaws.com/',
 ],
Upload a file from the backend's Media Manager - No prob

Same as test 2 - missing slash and incorrect file name - Live Link

test3

Fourth Test
Same Config as Test 3 - Create a Folder from the Backend
Folder created - No prob
test4
3. Open Folder and upload object from backend - Object is upload to that folder but the link is broken missing slash

