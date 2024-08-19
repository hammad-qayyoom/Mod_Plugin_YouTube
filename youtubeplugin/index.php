<?php
require_once(__DIR__ . '/../../config.php');

$courseid = required_param('id', PARAM_INT); // Get the course ID from URL parameters.
$course = get_course($courseid);

$PAGE->set_url('/mod/youtubeplugin/index.php', array('id' => $courseid));
$PAGE->set_pagelayout('standard');
$PAGE->set_title('Add YouTube Video');
$PAGE->set_heading($course->fullname);

// Form submission handling.
$name = '';
$youtubeurl = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = optional_param('name', '', PARAM_TEXT);
    $youtubeurl = optional_param('youtubeurl', '', PARAM_URL);
}

echo $OUTPUT->header();
?>

<!-- Display the form -->
<form method="post" action="">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo s($name); ?>" required>
    <br><br>
    <label for="youtubeurl">YouTube URL:</label>
    <input type="url" id="youtubeurl" name="youtubeurl" value="<?php echo s($youtubeurl); ?>" required>
    <br><br>
    <input type="submit" value="Submit">
</form>

<?php
// Display the submitted data.
if (!empty($name) && !empty($youtubeurl)) {
    echo "<h3>Submitted Data:</h3>";
    echo "<p><strong>Name:</strong> " . format_string($name) . "</p>";
    
    // Extract the video ID from the YouTube URL
    parse_str(parse_url($youtubeurl, PHP_URL_QUERY), $url_params);
    $video_id = $url_params['v'] ?? '';

    if ($video_id) {
        echo "<p><strong>YouTube Video:</strong></p>";
        echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/" . s($video_id) . "' frameborder='0' allowfullscreen></iframe>";
    } else {
        echo "<p>Invalid YouTube URL provided.</p>";
    }
}

echo $OUTPUT->footer();
