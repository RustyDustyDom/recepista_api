<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($db);

  // Get ID
  $post->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get post
  $post->read_single();

  // Create array
  $post_arr = array(
    'id' => $post->id,
    'title' => $post->title,
    'short_details' => $post->short_details,
    'top' => $post->top,
    'img_url' => $post->img_url,
    'data_published' => $post->date_published,
    'toughnes' => $post->toughnes,
    'category' => $post->category,
    'description' => $post->description,
    'ingredients' => $post->ingredients,
    'video_url' => $post->video_url,
    'f_size' => $post->f_size,
    'time' => $post->time
);

  // Make JSON
  print_r(json_encode($post_arr));