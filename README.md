# fbslideshow
PHP pgwslideshow slideshow from Facebook gallery (using curl) or wansview security camera FTP uploads (using a curl call to a recursive glob json api) OOP.

-Facebook gallery takes in the album id. You must ensure you have client secret and all that good stuff already. The script will create a cache file of the generated json and save the file in the same directory with the albumid.json as the filename.

-Security camera view is set up to take the "?camera" url param as the subdirectory where the security camera jpgs are uploaded. The directory structure will be "/scriptdir/cameradir/photosandvideos/". Because the wansview security camera uses an "ARCYYYYMMDDHHMMSS.jpg", this has been coded for that. There are also .mp4s that are the same format but one second later ("ARCYYYYMMDDHHMM[SS+1].mp4"). This where the "View Video" link comes into play, after verifying the corresponding video file exists.

Also see here for wansview security camera web app: http://freshed.com/wickles
