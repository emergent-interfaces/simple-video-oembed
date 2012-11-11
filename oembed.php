<?php

include_once("simple_video_oembed.php");

$link = $_GET["url"];
$link = parse_url($link);
$path = pathinfo($link["path"]);

if ($path["dirname"] == "/videos") {
  $video_id = $path["filename"];
  $video = find_video_by_id($video_id);
}

$r["version"] = "1.0";
$r["type"] = "video";
$r["title"] = $video["title"];
$r["provider_name"] = $provider;
$r["provider_url"] = $host;
$r["html"] = $video["iframe"];
$r["thumbnail_url"] = $video["image_url"];

header('Content-type: application/json');
$out = json_encode($r);
print $out;

?>
