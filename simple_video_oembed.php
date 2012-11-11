<?php

// Configuration settings
$host = "http://ei.louissimons.com";
$provider = "LMCTV Test Video Server";
$site_path = "/var/www/simple-video-oembed";
$files_path = "files/";
$player_width = 640;
$player_height = 480;

// Application constants

// Helper functions
function find_video_by_id($id) {
  global $host, $player_width, $player_height, $files_path;
  
  $video["id"] = $id;
  
  $video["title"] = $id;
  
  $video["file"] = "$id.mp4";
  $video["file_url"] = $host . "/" . $files_path . $video["file"];
  $video["file_link"] = "<a href='" . $video["file_url"] . "'>" . $video["file_url"] . "</a>";
  
  $video["image"] ="$id.png";
  $video["image_url"] = $host . "/" . $files_path . $video["image"];
  $video["image_tag"] = "<img src='" . $video["image_url"] . "' />";
  
  $video["iframe"] = "<iframe src=\"$host/player.php?video=$id\" width=\"$player_width\" height=\"$player_height\" frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen scrolling=\"no\"></iframe>";
  
  return $video;
}

?>
